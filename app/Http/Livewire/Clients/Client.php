<?php

namespace App\Http\Livewire\Clients;

use App\Clients;
use Livewire\Component;

class Client extends Component
{
    public $readyToLoad = false;
    public $editId;
    public $selection = [];
    public $nb_evenements = [];

    public function startEdit(int $id)
    {
        $this->editId = $id;
    }

    public function render()
    {
        $clients = Clients::all();
        return view('livewire.clients.client', compact('clients'));
    }
}
