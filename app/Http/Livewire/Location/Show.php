<?php

namespace App\Http\Livewire\Location;

use App\Articles;
use App\Location;
use Carbon\Carbon;
use App\Evenements;
use App\Type_evenements;

use function _\each;
use Livewire\Component;

class Show extends Component
{
    #stepper
    public $currentStep = 2;

    #models init
    public $type_evenements;
    public $client;
    public $user;
    public $articles;
    #liste des locations init
    public $tab_locations = [];

    public $type_evenement_libelle; #del
    public $evenement;
    public $evenement_libelle;
    public $evenement_nbr_personne;
    public $evenement_montant_total;
    public $evenement_lieu;
    public $evenement_caution;
    public $evenement_date_debut_evenement;
    public $evenement_date_fin_evenement;
    public $tab_evenement = [];
    public $duree_evenement;

    public function mount(Evenements $evenement)
    {
        $this->client = $evenement->client;
        $this->type_evenements = Type_evenements::orderBy('libelle','ASC')->get();
        $this->articles = Articles::orderBy('libelle','ASC')->get();;
        #execution de foreach
        $this->tab_locations = each((object) Location::where('evenement_id', '=', $evenement->id)->get(), function ($value, $key) { echo $value; });
        $this->user = $this->tab_locations[0]->user;

        #pour les champs de stepper evenement :
        $this->evenement_lieu = $evenement->lieu;
        $this->evenement_caution = $evenement->caution;
        $this->evenement_libelle = $evenement->libelle;
        $this->evenement_nbr_personne = $evenement->nbr_personne;
        $this->evenement_montant_total = $evenement->montant_total;
        $this->evenement_date_debut_evenement = \str_replace(' ', 'T', $evenement->date_debut_evenement);
        $this->evenement_date_fin_evenement = \str_replace(' ', 'T', $evenement->date_fin_evenement);
        $this->duree_evenement =  Carbon::parse($this->evenement->date_debut_evenement)->DiffForHumans($this->evenement->date_fin_evenement, true);
    }

    /**
     * Write code on Method
     * @return response()
     */
    public function secondStepSubmit()
    {
        dd('dsds');
    }

    public function addArticle()
    {
        return;
    }




     /**
     * Suppprime une ligne (par les boutons supprimer de chaque ligne)
     */
    public function deleteLigne($item)
    {

    }






    public function render()
    {
        return view('livewire.location.show');
    }
}
