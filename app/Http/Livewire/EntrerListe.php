<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EntrerListe extends Component
{
    public $entrers;

    public function render()
    {
        $this->entrers = Entrers::all();
        return view('livewire.entrer-liste');
    }
}
