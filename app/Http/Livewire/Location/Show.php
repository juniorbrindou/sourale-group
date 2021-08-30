<?php

namespace App\Http\Livewire\Location;

use Carbon\Carbon;
use Livewire\Component;

class Show extends Component
{
    public $client;
    public $evenement;
    public $location;
    public $duree_evenement;


    public function mount($location)
    {
        $this->location = $location;
        $this->client = $location->client;
        $this->evenement = $location->evenement;
        $this->duree_evenement =  Carbon::parse($this->evenement->date_debut_evenement)->DiffForHumans($this->evenement->date_fin_evenement, true);
    }



    public function render()
    {
        return view('livewire.location.show');
    }
}
