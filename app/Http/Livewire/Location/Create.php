<?php

namespace App\Http\Livewire\Location;

use App\Articles;
use App\Clients;
use App\Evenements;
use App\Factures;
use App\Location;
use App\Type_evenements;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
{
    public $currentStep = 1;
    public $clients;
    /*Evennement*/
    public $libelle_event;
    public $nbr_personne;
    public $type_evenements;
    public $type_evenement_id;
    public $lieuEvenement;
    public $date_debut_evenement;
    public $date_fin_evenement;
    public $duree_evenement;

    /* Ancien clien*/
    public $oldClient;
    /* nouveau client*/
    public $newAdresse;
    public $newNom;
    public $newContact1;
    /*--------------*/
    /* les articles*/
    public $articles = [];
    public $article;
    public $article_prix;
    public $qte_article;
    public $article_categorie;
    public $nb_jour;
    public $article_code;
    /* Location */
    public $code = 150;
    public $ligne = [];
    public $tabArticles = [];
    public $totalNet;
    public $caution = 0;
    public $percentage_caution;
    public $totalBrute = 0;
    public $totalUneLigne;

    #corbeille de liste d'article
    public $trashed = [];

    # Booleen pour caution Modifiable
    public $reductible = false;

     # Nouveau champ remise
     public $remise=0;












    /**
     * Rendre la caution modifiable
     * @return [bolean]
     */
    public function activeReductionField()
    {
        if ($this->reductible == true) {
            if ($this->remise == '' || $this->remise == null) {
                $this->remise = 0;
            }
            $this->caution = ($this->totalBrute - $this->remise) * $this->ligne['percentage_caution'] / 100;
            $this->ligne['ttc'] = $this->ttcCalcul($this->totalBrute,$this->remise,$this->caution);

            return $this->reductible = false;

        }else {

            return $this->reductible = true;
        }
    }







     /**
     * Fonctions de calculs
     * @param $ht
     * @param $remise
     * @param $caution
     * @return float
     */
    public function ttcCalcul($ht, $remise, $caution)
    {
        return  ($ht - $remise +$caution);
    }















    public function addArticle()
    {
        $this->validate(
            [
                'article' => 'required|string|min:2',
                'qte_article' => 'required',
                'nb_jour' => 'required',
            ],
            [
                'article.*' => 'Veuillez selectionner un article.',
                'qte_article.*' => 'Veuillez saisir la quantité.',
                'nb_jour.*' => 'Veuillez saisir le nombre de jour.',
            ]
        );

        // si la quantité saisie est supperieur à celle en bd de l'article
        $article = Articles::where('libelle', '=', $this->article)->first();
        if ($article->qte_stocker < \intval($this->qte_article)) {
            $this->dispatchBrowserEvent('sweetAlert', [
                'title' => 'La quantité saisie est suppérieure à celle enregistrée <br>Nous avons '.$article->qte_stocker.' '.$article->libelle.' enregistré(e)s et vous en demandez '.$this->qte_article,
                'icon' => 'error',
            ]);
        } else {
            // si la quantité saisie est inférieur ou égale à celle en bd

            // si le tableau est vide l'on clic sur ajouter
            // ajout dans la liste frontend
            $this->add();
            // calcul totalBrute et caution
            $this->totalBrute = array_sum(array_column($this->tabArticles, 'totalUneLigne'));
            $this->caution = $this->totalBrute * ($this->ligne['percentage_caution'] /100);
            $this->ligne['ttc'] = $this->ttcCalcul($this->totalBrute,$this->remise,$this->caution);


            #code pour retirer l'article sélectionné de la liste des articles
            foreach ($this->articles as $key => $value) {
                if ($value === $this->article) {
                    $this->trashed[$key] = $value;
                    unset($this->articles[$key]);
                    $key = +1;
                }
            }
        }
        $this->makeEmptyFields();
    }



























    /**
     * @return [type]
     */
    public function add()
    {
        // renvoie dans this→article le model article
        $article = Articles::where('libelle', '=', $this->article)->first();
        // recupération des informations l'article en bd
        $this->article_prix = $article->prix_tarification;
        $this->article = $article->libelle;
        $this->article_categorie = $article->categorie->libelle;
        $this->totalUneLigne = $this->nb_jour * $this->article_prix * $this->qte_article;
        // unshift pour une entrée en commençant par le haut
        array_unshift(
            $this->tabArticles,
            [
                'code' => $article->code,
                'article' => $this->article,
                'categorie' => $this->article_categorie,
                'qte_article' => $this->qte_article,
                'nb_jour' => $this->nb_jour,
                'prix' => $this->article_prix,
                'totalUneLigne' => $this->totalUneLigne,
            ]
        );
    }




























    /**
     * vide les champs de formulaire
     * @return void
     */
    private function makeEmptyFields()
    {
        $this->article = '';
    }

























    /**
     * Insertion en bd
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addInBD()
    {
        if (!empty($this->tabArticles)) { // creation du client
            if ($this->ligne['isNew']) {
                $client = Clients::create(
                    [
                        'nom' => $this->newNom,
                        'contact1' => $this->newContact1,
                        'adresse' => $this->newAdresse,
                        'user_id' => Auth::user()->id,
                    ]
                );
            } else {
                $client = Clients::whereId($this->oldClient)->first();
            }

            if ($this->type_evenement_id) {
                $this->type_evenement_id = Type_evenements::where('libelle', '=', $this->ligne['type_evenement_id'])->first()->id;
            }
            // creation de l'évenement
            $evenement = Evenements::create(
                [
                    'libelle' => $this->ligne['libelle_event'],
                    'lieu' => $this->ligne['lieuEvenement'],
                    'caution' => $this->caution,
                    'percentage_caution' => $this->percentage_caution,
                    'date_debut_evenement' => $this->ligne['date_debut_evenement'],
                    'date_fin_evenement' => $this->ligne['date_fin_evenement'],
                    'nbr_personne' => $this->ligne['nbr_personne'],
                    'client_id' => $client->id,
                    'type_evenement_id' => $this->type_evenement_id,
                    'montant_total' => $this->totalBrute,
                    'status' => 'DEVIS',
                    'nb_jour' => Carbon::parse($this->date_debut_evenement)->DiffInDays($this->date_fin_evenement),
                    'remise' => $this->remise,
                ]
            );

            $facture = Factures::create(
                [
                    "date_creation" => date('Y-m-d'),
                    "caution" => $this->caution,
                    "user_id" => Auth::user()->id,
                    "evenement_id" => $evenement->id,
                    "libelle" => 'Facture-' . $evenement->libelle,
                ]
            );

            $facture->update(['code' => 'FA' . date('ym') . '-' . $facture->id]);
            foreach ($this->tabArticles as $value) {
                $article = Articles::whereLibelle($value['article'])->first();
                $article_id = $article->id;

                Location::create(
                    [
                        'qte_loue' => $value['qte_article'],
                        'qte_retour' => 0,
                        'prix_unitaire' => $this->article_prix,
                        'user_id' => Auth::user()->id,
                        'evenement_id' => $evenement->id,
                        'article_id' => $article_id,
                        'client_id' => $client->id,
                        'nb_jour' => $value['nb_jour'],
                        'total_une_ligne' => $value['totalUneLigne'],
                        'date_location' =>  $this->ligne['date_debut_evenement'],
                    ]
                );
            }
            $this->resetLigne();
            Alert::success('Evenement Créé', '');
            return redirect()->route('locations.index');
        } else {
            $this->dispatchBrowserEvent('sweetAlert', [
                'title' => 'Aucun article choisi',
                'timer' => 5000,
                'icon' => 'error',
            ]);
        }
    }


































    /**
     * Remonte les information de la liste vers le formulaire pour le update
     */
    public function updateLigne($item)
    {
        $data = $this->tabArticles[$item];
        $this->article = $data['article'];
        $this->qte_article = $data['qte_article'];
        $this->nb_jour = $data['nb_jour'];
        $this->addDeleteLigne($item);
        $this->totalBrute = array_sum(array_column($this->tabArticles, 'totalUneLigne'));
        $this->caution = $this->totalBrute * ($this->ligne['percentage_caution'] /100);
    }

























    /**
     * Rénitialise le tableau
     * @return void
     */
    public function resetLigne()
    {
        # Faire remonter l'article dans la liste des articles
        foreach ($this->tabArticles as $value) {
            \array_push( $this->articles, $value['article']);
        }
        $this->tabArticles = [];


        $this->totalBrute = array_sum(array_column($this->tabArticles, 'totalUneLigne'));
        $this->caution = $this->totalBrute * $this->ligne['percentage_caution'] /100;
    }



























    /**
     * Suppprime une ligne (par les boutons supprimer de chaque ligne)
     */
    public function addDeleteLigne($item)
    {
        # Faire remonter l'article dans la liste des articles
        foreach ($this->trashed as $value) {
            if ($value === $this->tabArticles[$item]['article']) {
                \array_unshift($this->articles, $this->tabArticles[$item]['article']);
            }
        }

        unset($this->tabArticles[$item]);
        $this->tabArticles = array_values($this->tabArticles);
        $this->totalBrute = array_sum(array_column($this->tabArticles, 'totalUneLigne'));
        $this->caution = $this->totalBrute * $this->ligne['percentage_caution'] /100;
        $this->ligne['ttc'] = $this->ttcCalcul($this->totalBrute,$this->remise,$this->caution);

        $this->makeEmptyFields();
    }



















    /**
     * Write code on Method
     *
     * @return response()
     */
    public function firstStepSubmit()
    {
        if ($this->newNom && $this->oldClient) {
            $this->currentStep = 1;
            $this->dispatchBrowserEvent('sweetAlert', [
                'title' => 'Erreur de saisie',
                'timer' => 5000,
                'icon' => 'error',
                'text' => 'Vous ne pouvez pas créer un nouveau client et Choisir un client existant simultanément!',
            ]);
        } elseif ($this->newNom != null && $this->oldClient == null) {
            $this->ligne =
                [
                'nom' => $this->newNom,
                'contact1' => $this->newContact1,
                'adresse' => $this->newAdresse,
                'isNew' => true,
            ];
            $this->currentStep = 2;
        } elseif ($this->newNom == null && $this->oldClient != null) {
            $oldClient = Clients::whereId($this->oldClient)->first();
            $this->ligne =
                [
                'nom' => $oldClient->nom,
                'contact1' => $oldClient->contact1,
                'adresse' => $oldClient->adresse,
                'isNew' => false,
            ];
            $this->currentStep = 2;
        } else {
            $this->dispatchBrowserEvent('sweetAlert', [
                'title' => 'Erreur de saisie',
                'timer' => 3000,
                'icon' => 'error',
                'text' => 'Réferencez le client avant de continuer!',
            ]);
            $this->currentStep = 1;
        }
    }

    /**
     * @return [type]
     */
    public function gotToBeforeStepSubmit()
    {
        $this->currentStep = 1;
    }

    /**
     * Write code on Method
     * @return response()
     */
    public function secondStepSubmit()
    {
        $this->validate([
            'libelle_event' => 'required|unique:evenements,libelle',
            'nbr_personne' => 'nullable|numeric|min:0',
            'date_debut_evenement' => 'required',
            'type_evenement_id' => 'nullable',
            'percentage_caution' => 'required|min:0|max:100|numeric',
            'date_fin_evenement' => 'required|after:date_debut_evenement',
        ], [
            'libelle_event.unique' => 'Cet evenement existe déja',
            'libelle_event.*' => 'Veuillez remplir ce champs',
            'nbr_personne.*' => 'Ce champs doit comporter un nombre',
            'type_evenement_id.*' => 'Veuillez choisir un type',
            'date_debut_evenement.required' => 'Veuillez choisir une date',
            'date_fin_evenement.required' => 'Veuillez choisir une date',
            'date_fin_evenement.after' => 'La date de fin doit être superieure à la date de début',
        ]);


        $this->ligne['libelle_event'] = $this->libelle_event;
        $this->ligne['percentage_caution'] = $this->percentage_caution;
        $this->ligne['lieuEvenement'] = $this->lieuEvenement;
        $this->ligne['type_evenement_id'] = $this->type_evenement_id;
        $this->ligne['nbr_personne'] = $this->nbr_personne;
        $this->ligne['date_debut_evenement'] = $this->date_debut_evenement;
        $this->ligne['date_fin_evenement'] = $this->date_fin_evenement;

        # Traitement de la durée: si elle contient heure ou minutes convertir affecter 1 jour à la place
        $containDuree = Carbon::parse($this->date_debut_evenement)->DiffForHumans($this->date_fin_evenement, true);
        if (\str_contains($containDuree,' heure') || (\str_contains($containDuree,' minute'))){
            $containDuree = '1 Jour';
        }

        $this->ligne['duree_evenement'] = $containDuree;
        $this->currentStep = 3;
    }

    protected $rules = [
        'oldClient' => 'required',
        'type_evenements' => 'required',
    ];

    public function mount()
    {
        $this->type_evenements = Type_evenements::orderBy('libelle', 'ASC')->get();
        $this->clients = Clients::orderBy('nom', 'ASC')->get();
        # liste des articles from database type collection
        $articles = Articles::orderBy('libelle', 'ASC')->get();

        # list des articles transformés en array pour le select
        foreach ($articles as $key => $value) {
            $this->articles[$key] = $value->libelle;
        }
    }

    public function render()
    {
        return view('livewire.location.create');
    }
}
