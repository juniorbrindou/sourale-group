<?php

namespace App\Http\Livewire\Location;

use App\Evenements;
use App\Location;
use Livewire\Component;

class Index extends Component
{
    public $evenements;

    public function update_statut()
    {
        dd('ok');
    }

    public function render()
    {
        $this->evenements = Evenements::all();
        return view('livewire.location.index');
    }
}
