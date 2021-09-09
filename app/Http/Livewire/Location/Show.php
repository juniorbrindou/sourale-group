<?php

namespace App\Http\Livewire\Location;

use App\Clients;
use App\Articles;
use App\Location;
use Carbon\Carbon;
use App\Evenements;
use Livewire\Component;
use App\Type_evenements;
use App\Factures;
use Illuminate\Support\Facades\Auth;


class Show extends Component
{

    public $clients;
    public $client_id;

    public $articles;
    public $article_libelle;
    public $article_qte;
    public $nbr_jours;

    public $currentStep = 2;
    public $type_evenements;
    public $type_evenement_libelle;

    public $evenement;
    public $evenement_libelle;
    public $evenement_nbr_personne;
    public $evenement_montant_total;
    public $evenement_reste_payer;
    public $evenement_nb_jour;
    public $evenement_lieu;
    public $evenement_description;
    public $evenement_status;
    public $evenement_caution;
    public $evenement_date_debut_evenement;
    public $evenement_date_fin_evenement;
    public $tab_evenement = [];

    public $client;
    public $user;
    public $duree_evenement;
    public $ligne = [];     # contient les informations de chaque lignes
    public $tab_locations = [];      # Contient les differentes locations de l'evenement

    /**
     * Write code on Method
     * @return response()
     */
    public function secondStepSubmit()
    {
        $this->validate([
            'evenement_libelle' => 'required',
            'evenement_nbr_personne' => 'required',
            'evenement_date_debut_evenement' => 'required',
            'type_evenement_libelle' => 'required',
            'evenement_date_fin_evenement' => 'required',
        ]);
        $this->evenement_date_debut_evenement = $this->evenement_date_debut_evenement->format('Y-m-d\TH:i');
        $this->evenement_date_fin_evenement = $this->evenement_date_fin_evenement->format('Y-m-d\TH:i');


        $this->tab_evenement['libelle'] = $this->evenement_libelle;
        $this->tab_evenement['nbr_personne'] = $this->evenement_nbr_personne;
        $this->tab_evenement['date_debut'] = $this->evenement_date_debut_evenement;
        $this->tab_evenement['date_fin'] = $this->evenement_date_fin_evenement;
        $this->tab_evenement['type_evenement_libelle'] = $this->type_evenement_libelle;
        $this->tab_evenement['duree_evenement'] = Carbon::parse($this->evenement_date_debut_evenement)->DiffInDays($this->evenement_date_fin_evenement);
        // 2021-09-10T17:19
        // 2021-09-30T14:27

        $this->currentStep = 3;
    }






    public function addArticle()
    {
        $this->validate(
            [
                'article_libelle' => 'required|string|min:2',
                'article_qte' => 'required',
                'nbr_jours' => 'required',
            ],
            [
                'article.*' => 'Veuillez selectionner un article.',
                'qte_article.*' => 'Veuillez saisir la quantité.',
                'nb_jours.*' => 'Veuillez saisir le nombre de jour.',
            ]
        );

        // si la quantité saisie est supperieur à celle en bd de l'article
        $article = Articles::where('libelle', '=', $this->article_libelle)->first();
        // dd($this->);
        if ($article->qte_en_stock < \intval($this->article_qte)) {
            $this->dispatchBrowserEvent('sweetAlert', [
                'title' => 'La quantité saisie est suppérieure à celle disponible <br>',
                'timer' => 5000,
                'icon' => 'error',
            ]);
        } else {
            dd('non');
        }
    }



    /**
     * @return [type]
     */
    public function add()
    {
        dd($this->article);
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



    public function mount(Evenements $evenement)
    {
        $this->clients = Clients::all();
        $this->articles = Articles::all();
        $this->type_evenements = Type_evenements::all();
        $this->type_evenement_libelle = $evenement->type_evenement->libelle;
        $this->evenement_libelle = $evenement->libelle;
        $this->evenement_nbr_personne = $evenement->nbr_personne;
        $this->evenement_montant_total = $evenement->montant_toal;
        $this->evenement_reste_payer = $evenement->reste_payer;
        $this->evenement_nb_jour = $evenement->nb_jour;
        $this->evenement_lieu = $evenement->lieu;
        $this->evenement_description = $evenement->description;
        $this->evenement_date_debut_evenement = \DateTime::createFromFormat('Y-m-d H:i:s', $evenement->date_debut_evenement);
        $this->evenement_date_fin_evenement = \DateTime::createFromFormat('Y-m-d H:i:s', $evenement->date_fin_evenement);


        # tableau des articles ok
        $this->tab_locations = Location::where('evenement_id', '=', $evenement->id)->get();
        # clien ok
        $this->client = $this->tab_locations[0]->client;
        # user ok
        $this->user = $this->tab_locations[0]->user;
        foreach ($this->tab_locations as $item => $value) {
            $this->ligne[$item]['article'] = $value->article;
            $this->ligne[$item]['article_categorie'] = $value->article->categorie;
            $this->ligne[$item]['qte_loue'] = $value->qte_loue;
            $this->ligne[$item]['nbr_jour'] = $value->nb_jour;
            $this->ligne[$item]['total_une_ligne'] = $value->total_une_ligne;
        }
        $this->duree_evenement =  Carbon::parse($this->evenement->date_debut_evenement)->DiffForHumans($this->evenement->date_fin_evenement, true);

        #	Code	Article	Catégorie	Quantité	jours	Prix U	Total	Ation


        // $this->totalUneLigne = $this->nb_jour * $this->article_prix * $this->qte_article;
        // // unshift pour une entrée en commençant par le haut
        // array_unshift(
        //     $this->tabArticles,
        //     [
        //         'article' => $this->article,
        //         'categorie' => $this->article_categorie,
        //         'qte_article' => $this->qte_article,
        //         'nb_jour' => $this->nb_jour,
        //         'prix' => $this->article_prix,
        //         'totalUneLigne' => $this->totalUneLigne,
        //     ]
        // );




        // $this->location = $location;
        // $this->evenement = $location->evenement;
    }



    public function deleteLigne($item)
    {
        unset($this->ligne[$item]);
        // dd($this->ligne);
        // $this->ligne = array_values($this->ligne);
        // $this->totalBrute = array_sum(array_column($this->tabArticles, 'totalUneLigne'));
        // $this->caution = $this->totalBrute * 0.2;
    }




    /**
     * Write code on Method
     *
     * @return response()
     */
    public function firstStepSubmit()
    {
        $this->ligne =
            [
                'nom' => $this->newNom,
                'contact1' => $this->newContact1,
                'adresse' => $this->newAdresse,
                'isNew' => true,
            ];
        $this->currentStep = 2;
    }






    public function render()
    {
        return view('livewire.location.show');
    }
}
