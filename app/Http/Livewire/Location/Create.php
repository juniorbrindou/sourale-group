<?php

namespace App\Http\Livewire\Location;

use App\Clients;
use App\Type_evenements;
use Livewire\Component;

class Create extends Component
{
    public $currentStep = 1;
    public $clients;
    public $libelle_event;
    public $nbr_personne;
    public $type_evenements;
    public $client;
    public $nom;

    /**
     * @return [type]
     */
    public function addNewClient()
    {
        dd('dsds');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function firstStepSubmit()
    {
        $this->validate([
            'client' => 'required',
        ]);

        $this->currentStep = 2;
    }


    /**
     * Write code on Method
     * @return response()
     */
    public function secondStepSubmit()
    {
        $this->validate([
            'evenementLibelle' => 'required',
            'evenementNbPersonne' => 'required',
            'evenementLieu' => 'required',
            'evenementType' => 'required',
        ]);
        $this->currentStep = 3;
    }


    protected $rules = [
        'client' => 'required',
        'type_evenements' => 'required',
    ];
    // protected $messages = [
    //     'article.numeric' => 'Selectionnez l\'article.',
    // ];
    // protected $validationAttributes = [
    //     'qte' => 'quantité'
    // ];

    public function render()
    {
        $this->type_evenements = Type_evenements::all();
        $this->clients = Clients::all();
        return view('livewire.location.create');
    }
}
