<?php

namespace App\Http\Livewire\Location;

use App\Evenements;
use Livewire\Component;

class Incourse extends Component
{
    public $evenements;
    public $statut_evenement;
    public $tab_locations;
    public $ligne = [];
    public $evenement_id;

    public function mount()
    {
        $this->evenements = Evenements::whereStatus('EN COURS')->get();
    }

    public function render()
    {
        return view('livewire.location.incourse');
    }
}
