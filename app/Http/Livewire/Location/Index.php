<?php

namespace App\Http\Livewire\Location;

use App\Evenements;
use Livewire\Component;

class Index extends Component
{
    public $evenements;
    public $statut_evenement;
    public $tab_locations;
    public $ligne = [];
    public $evenement_id;
    public $test2;

    public function mount()
    {
        $this->evenements = Evenements::all();
    }

    public function render()
    {
        $this->test2 = 'bonjour';
        return view('livewire.location.index');
    }
}
