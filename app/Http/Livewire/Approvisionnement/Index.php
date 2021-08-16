<?php

namespace App\Http\Livewire\Approvisionnement;

use App\Entrers;
use Livewire\Component;

class Index extends Component
{


    public $entrees;


    public function valider($id)
    {
        Entrers::findOrFail($id)->delete();
        return view('livewire.approvisionnement.index');
    }

    public function render()
    {
        $this->entrees = Entrers::all();
        return view('livewire.approvisionnement.index');
    }
}
