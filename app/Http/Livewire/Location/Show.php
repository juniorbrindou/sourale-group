<?php

namespace App\Http\Livewire\Location;

use App\Clients;
use App\Articles;
use App\Location;
use Carbon\Carbon;
use App\Evenements;
use Livewire\Component;
use App\Type_evenements;

class Show extends Component
{

    public $clients;
    public $client_id;

    public $articles;
    public $currentStep = 2;
    public $type_evenements;

    public $client;
    public $user;
    public $evenement;
    public $duree_evenement;
    public $ligne = [];     # contient les informations de chaque lignes
    public $tab_locations = [];      # Contient les differentes locations de l'evenement

    public function mount(Evenements $evenement)
    {
        $this->clients = Clients::all();
        $this->articles = Articles::all();
        $this->type_evenements = Type_evenements::all();



        # tableau des articles ok
        $this->tab_locations = Location::where('evenement_id', '=', $evenement->id)->get();
        # clien ok
        $this->client = $this->tab_locations[0]->client;
        # user ok
        $this->user = $this->tab_locations[0]->user;
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





    /**
     * Write code on Method
     *
     * @return response()
     */
    public function firstStepSubmit()
    {
        // dd($this->client_id);
        $this->ligne =
            [
                'nom' => $this->newNom,
                'contact1' => $this->newContact1,
                'adresse' => $this->newAdresse,
                'isNew' => true,
            ];
        $this->currentStep = 2;
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









    public function render()
    {
        return view('livewire.location.show');
    }
}
