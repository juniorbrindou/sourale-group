<?php

namespace App\Http\Livewire\Destockage;

use App\Destockage;
use Livewire\Component;

class Index extends Component
{



    public $sorties;


    public function valider($id)
    {
        Destockage::findOrFail($id)->delete();
        return view('livewire.destockage.index');
    }






    public function render()
    {
        $this->sorties = Destockage::all();
        return view('livewire.destockage.index');
    }
}
