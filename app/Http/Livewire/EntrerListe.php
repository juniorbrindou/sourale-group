<?php

namespace App\Http\Livewire;

use App\Entrers;
use App\Ligne_entrer;
use Livewire\Component;

class EntrerListe extends Component
{
    public $entrees;


    public function valider($id)
    {
        Entrers::findOrFail($id)->delete();
        return view('livewire.entrer-liste');
    }


    public function render()
    {
        $this->entrees = Entrers::all();
        return view('livewire.entrer-liste');
    }
}
