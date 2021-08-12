<?php

namespace App\Http\Livewire;

use App\Entrers;
use App\Ligne_entrer;
use Livewire\Component;

class EntrerListe extends Component
{
    public $ligneEntrers;


    public function valider($id)
    {
        Ligne_entrer::findOrFail($id)->delete();
        return view('livewire.entrer-liste');
    }


    public function render()
    {
        $this->ligneEntrers = Ligne_entrer::all();
        return view('livewire.entrer-liste');
    }
}
