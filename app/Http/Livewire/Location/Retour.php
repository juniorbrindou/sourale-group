<?php

/** @noinspection ALL */

namespace App\Http\Livewire\Location;

use Livewire\Component;
use App\Articles;
use App\Clients;
use App\Location;
use Carbon\Carbon;
use App\Evenements;
use App\Factures;
use App\Type_evenements;
use Illuminate\Support\Facades\Auth;

class Retour extends Component
{
    public $qte_retour;
    public $clients;
    /*Evennement*/
    public $tab_location;
    public $evenement;
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
    public $tab_locations;
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
     * Insertion en bd
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addInBD()
    {
        if (!empty($this->tabArticles)) { // creation du client
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
                    'status' => 'ENREGISTRÉ',
                    'nb_jour' => Carbon::parse($this->date_debut_evenement)->DiffInDays($this->date_fin_evenement)
                ]
            );

            $facture = Factures::create(
                [
                    "date_creation" => date('d-m-Y'),
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


    protected $rules = [
        'qte_retour' => 'required',
    ];
    public function forValidation($qte_retour)
    {
        $this->validateOnly($qte_retour);
    }

    public function save()
    {
        $validatedData = $this->validate();
        sleep(1);
    }



    public function mount($evenement)
    {
        $this->tab_locations = Location::where('evenement_id', '=', $evenement->id)->get();

        $this->ligne['nom_client'] = $evenement->client->nom;
        $this->ligne['contact1_client'] = $evenement->client->contact1;
        $this->ligne['contact2_client'] = $evenement->client->contact2;
        $this->ligne['libelle_event'] = $evenement->libelle;
        $this->ligne['lieu_event'] = $evenement->lieu;
        $this->ligne['type_event_id'] = $evenement->type_evenement_id;
        $this->ligne['nbr_personne'] = $evenement->nbr_personne;
        $this->ligne['date_debut_evenement'] = $evenement->date_debut_evenement;
        $this->ligne['date_fin_evenement'] = $evenement->date_fin_evenement;
        $this->ligne['caution'] = $evenement->caution;
        $this->ligne['date_fin_evenement'] = $evenement->date_fin_evenement;
        $this->ligne['duree_evenement'] = Carbon::parse($this->date_debut_evenement)->DiffForHumans($this->date_fin_evenement, true);
        $this->ligne['montant_total'] = $evenement->montant_total;

        $this->evenement = $evenement;
        $this->type_evenements = Evenements::all();
    }

    public function render()
    {
        return view('livewire.location.retour');
    }
}
