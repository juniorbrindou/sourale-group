<?php

namespace App\Http\Livewire\Location;

use App\Articles;
use App\Clients;
use App\Location;
use Carbon\Carbon;
use App\Evenements;
use App\Factures;
use Livewire\Component;
use App\Type_evenements;
use Illuminate\Support\Facades\Auth;

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
    public $articles;
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
    public $totalBrute = 0;
    public $totalUneLigne;




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
        if ($article->qte_en_stock < \intval($this->qte_article)) {
            $this->dispatchBrowserEvent('sweetAlert', [
                'title' => 'La quantité saisie est suppérieure à celle disponible <br>' . $article->libelle . ' = ' . $article->qte_en_stock,
                'timer' => 5000,
                'icon' => 'error',
            ]);
        } else {
            // si la quantité saisie est inférieur ou égale à celle en bd

            // si le tableau est vide l'onclic sur ajouter
            // ajout dans la liste frontend
            $this->add();
            // calcul totalBrute et caution
            $this->totalBrute = array_sum(array_column($this->tabArticles, 'totalUneLigne'));
            $this->caution = $this->totalBrute * 0.2;
        }
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
            $this->type_evenement_id = Type_evenements::where('libelle', '=', $this->ligne['type_evenement_id'])->first()->id;
            // creation de l'évenement
            $evenement = Evenements::create(
                [
                    'libelle' => $this->ligne['libelle_event'],
                    'lieu' => $this->ligne['lieuEvenement'],
                    'caution' => $this->caution,
                    'date_debut_evenement' => $this->ligne['date_debut_evenement'],
                    'date_fin_evenement' => $this->ligne['date_fin_evenement'],
                    'nbr_personne' => $this->ligne['nbr_personne'],
                    'client_id' => $client->id,
                    'type_evenement_id' => $this->type_evenement_id,
                    'montant_total' => $this->totalBrute,
                    'status' => 'Enregistré',
                    'nb_jour' => Carbon::parse($this->date_debut_evenement)->DiffInDays($this->date_fin_evenement)
                ]
            );

            $facture = Factures::create(
                [
                    "date_creation" => date('d-m-Y'),
                    "caution" => $this->caution,
                    "user_id" => Auth::user()->id,
                    "evenement_id" => $evenement->id,
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
                    ]
                );
            }
            $this->resetLigne();
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
        $this->caution = $this->totalBrute * 0.2;
    }


    /**
     * Rénitialise le tableau
     * @return void
     */
    public function resetLigne()
    {
        $this->tabArticles = [];
        $this->totalBrute = array_sum(array_column($this->tabArticles, 'totalUneLigne'));
        $this->caution = $this->totalBrute * 0.2;
    }


    /**
     * Suppprime une ligne (par les boutons supprimer de chaque ligne)
     */
    public function addDeleteLigne($item)
    {
        unset($this->tabArticles[$item]);
        $this->tabArticles = array_values($this->tabArticles);
        $this->totalBrute = array_sum(array_column($this->tabArticles, 'totalUneLigne'));
        $this->caution = $this->totalBrute * 0.2;
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
            'libelle_event' => 'required',
            'nbr_personne' => 'required',
            'date_debut_evenement' => 'required',
            'type_evenement_id' => 'required',
            'date_fin_evenement' => 'required|after:date_debut_evenement',
        ]);
        $this->ligne['libelle_event'] = $this->libelle_event;
        $this->ligne['lieuEvenement'] = $this->lieuEvenement;
        $this->ligne['type_evenement_id'] = $this->type_evenement_id;
        $this->ligne['nbr_personne'] = $this->nbr_personne;
        $this->ligne['date_debut_evenement'] = $this->date_debut_evenement;
        $this->ligne['date_fin_evenement'] = $this->date_fin_evenement;
        $this->ligne['duree_evenement'] = Carbon::parse($this->date_debut_evenement)->DiffForHumans($this->date_fin_evenement, true);

        $this->currentStep = 3;
    }

    protected $rules = [
        'oldClient' => 'required',
        'type_evenements' => 'required',
    ];

    public function mount()
    {
        $this->type_evenements = Type_evenements::all();
        $this->clients = Clients::all();
        $this->articles = Articles::all();
    }

    public function hydrate()
    {
        // pour reduire de la liste l'elemen selectionné
        // for ($i = 0; $i < count($this->tabArticles); $i++) {
        //     if ($this->tabArticles[$i]['article'] === $this->article) {
        //         dd($this->article);
        //     }
        // }
    }


    public function render()
    {
        return view('livewire.location.create');
    }
}
