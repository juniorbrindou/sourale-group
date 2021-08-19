<?php

namespace App\Http\Livewire\Location;

use App\Location;
use Livewire\Component;

class Index extends Component
{
    public $locations;

    public function render()
    {
        $this->locations = Location::all();
        return view('livewire.location.index');
    }
}
