<?php

namespace App\Http\Livewire\Location;

use App\Evenements;
use Livewire\Component;

class Index extends Component
{
    public $evenements;
    public $statut_evenement;

    public function update_statut(int $id)
    {
        $this->validate(['statut_evenement' => 'required'], ['statut_evenement.*' => 'Aucun status choisis']);
        $evenement = Evenements::find($id);
        $evenement->update(['status' => $this->statut_evenement]);
    }

    public function render()
    {
        $this->evenements = Evenements::all();
        return view('livewire.location.index');
    }
}
