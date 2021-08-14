<?php

namespace App\Http\Livewire\Approvisionnement;

use App\Articles;
use App\Fournisseurs;
use Livewire\Component;

class Create extends Component
{
    public $fournisseurs;
    public $articles;
    public function render()
    {
        $this->articles = Articles::all();
        $this->fournisseurs = Fournisseurs::all();
        return view('livewire.approvisionnement.create');
    }
}
