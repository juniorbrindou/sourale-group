<?php

namespace App\Http\Livewire\Approvisionnement;

use App\Articles;
use App\Entrers;
use Livewire\Component;
use Illuminate\Http\Request;


class Show extends Component
{
    public $articles;
    public $entrees;

    public function render()
    {
        $this->articles = Articles::all();
        return view('livewire.approvisionnement.show');
    }
}
