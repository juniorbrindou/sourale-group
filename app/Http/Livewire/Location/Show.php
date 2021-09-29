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

    public $articles;
    public $article_libelle;
    public $article_qte;
    public $nbr_jours;

    public $article_prix;

    public $currentStep = 3;
    public $type_evenements;
    public $type_evenement_libelle; #del

    public $evenement;
    public $evenement_libelle;
    public $evenement_nbr_personne;
    public $evenement_montant_total;
    public $evenement_reste_payer;
    public $evenement_nb_jour;
    public $evenement_lieu;
    public $evenement_description;
    public $evenement_caution;
    public $evenement_date_debut_evenement;
    public $evenement_date_fin_evenement;
    public $tab_evenement = [];
    public $totalBrute;
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
            'evenement_date_fin_evenement' => 'required|after:evenement_date_debut_evenement',
            'evenement_lieu' => 'required',
        ], [
            'evenement_libelle.*' => 'Entrez un titre d\'évenement valide',
            'evenement_nbr_personne.*' => 'Entrez un nombre valide',
            'evenement_date_debut_evenement.*' => 'Entrez une date valide',
            'type_evenement_libelle.*' => 'Selectionnez un type d\'évenement',
            'evenement_date_fin_evenement.*' => 'Entrez une date de fin valide',
            'evenement_lieu.*' => 'Entrez un lieu valide',
        ]);
        $this->tab_evenement['evenement_libelle'] = $this->evenement_libelle;
        $this->tab_evenement['evenement_caution'] = $this->evenement_caution;
        $this->tab_evenement['evenement_montant_total'] = $this->evenement_montant_total;
        $this->tab_evenement['evenement_lieu'] = $this->evenement_lieu;
        $this->tab_evenement['evenement_nbr_personne'] = $this->evenement_nbr_personne;
        $this->tab_evenement['evenement_date_debut_evenement'] = $this->evenement_date_debut_evenement;
        $this->tab_evenement['evenement_date_fin_evenement'] = $this->evenement_date_fin_evenement;
        $this->tab_evenement['type_evenement_libelle'] = $this->type_evenement_libelle;
        $this->tab_evenement['duree_evenement'] = Carbon::parse($this->evenement_date_debut_evenement)->DiffInDays($this->evenement_date_fin_evenement);
        $this->currentStep = 3;
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
        unset($this->tab_locations[$item]);
        $this->tab_locations = array_values($this->tab_locations);
        dd($this->tab_locations);
        $this->totalBrute = array_sum(array_column($this->tab_locations, 'totalUneLigne'));
        $this->caution = $this->totalBrute * 0.2;
    }




    public function mount(Evenements $evenement)
    {
        $this->clients = Clients::all();
        $this->articles = Articles::all();
        $this->type_evenements = Type_evenements::all();

        # Evenement
        $this->type_evenement_libelle = $evenement->type_evenement->libelle;
        $this->evenement_libelle = $evenement->libelle;
        $this->evenement_nbr_personne = $evenement->nbr_personne;
        $this->evenement_montant_total = $evenement->montant_total;
        $this->evenement_reste_payer = $evenement->reste_payer;
        $this->evenement_nb_jour = $evenement->nb_jour;
        $this->evenement_lieu = $evenement->lieu;
        $this->evenement_caution = $evenement->caution;
        $this->evenement_description = $evenement->description;
        $this->evenement_date_debut_evenement = \str_replace(' ', 'T', $evenement->date_debut_evenement);
        $this->evenement_date_fin_evenement = \str_replace(' ', 'T', $evenement->date_fin_evenement);

        # tableau des articles ok
        $this->tab_locations = Location::where('evenement_id', '=', $evenement->id)->get();

        $this->totalBrute = $this->tab_locations->sum('total_une_ligne');

        # clien ok
        $this->client = $this->tab_locations[0]->client;
        # user ok
        $this->user = $this->tab_locations[0]->user;

        $this->duree_evenement =  Carbon::parse($this->evenement->date_debut_evenement)->DiffForHumans($this->evenement->date_fin_evenement, true);
    }


    public function render()
    {
        return view('livewire.location.show');
    }
}
