<?php

namespace App\Http\Livewire\Location;

use App\Location;
use Carbon\Carbon;
use App\Evenements;
use Livewire\Component;

class Terminee extends Component
{
    public $client;
    public $user;
    public $evenement;
    public $duree_evenement;
    public $ligne = [];     // contient les informations de chaque lignes
    public $tab_locations = [];      // Contient les differentes locations de l'evenement

    public function mount(Evenements $evenement)
    {
        $this->tab_locations = Location::where('evenement_id', '=', $evenement->id)->get();
        $this->client = $this->tab_locations[0]->client;
        $this->user = $this->tab_locations[0]->user;

        #Gestion de la durée d'evenement
        $containDuree =  Carbon::parse($this->evenement->date_debut_evenement)->DiffForHumans($this->evenement->date_fin_evenement, true);
        if (\str_contains($containDuree, 'secon') || \str_contains($containDuree, 'heure') || (\str_contains($containDuree, 'minute'))) {
            $containDuree = '1 Jour';
        }
        $this->duree_evenement = $containDuree;
    }


    public function render()
    {
        return view('livewire.location.terminee');
    }
}
