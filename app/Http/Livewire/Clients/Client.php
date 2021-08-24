<?php

namespace App\Http\Livewire\Clients;

use App\Clients;
use Livewire\Component;

class Client extends Component
{
    public $readyToLoad = false;
    public $editId;
    public $selection = [];


    public function deleteUsers(array $ids)
    {
        dd($ids);
    }

    public function startEdit(int $id)
    {
        $this->editId = $id;
    }

    public function render()
    {
        return view(
            'livewire.clients.client',
            [
                'clients' => Clients::all()
            ]
        );
    }
}
