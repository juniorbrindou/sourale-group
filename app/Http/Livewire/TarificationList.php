<?php

namespace App\Http\Livewire;

use App\Tarification;
use Livewire\Component;

class TarificationList extends Component
{
    public $tarifs;

    public function render()
    {
        $this->tarifs = Tarification::all();
        return view('livewire.tarification-list');
    }
}
