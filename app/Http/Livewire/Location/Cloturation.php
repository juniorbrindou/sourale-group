<?php

namespace App\Http\Livewire\Location;

use App\Articles;
use App\Location;
use Livewire\Component;

class Cloturation extends Component
{
    public $qte_retour;
    public $value;

    public function save()
    {
        $this->validate(
            ['qte_retour' => 'required|min:0|numeric|max:' . $this->value['qte_loue']],
            [
                'qte_retour.required' => 'Saisissez la quantité',
                'qte_retour.min' => 'Saisissez une quantité valide',
                'qte_retour.max' => 'Saisissez une quantité valide : valeur max : ' . $this->value['qte_loue'],
            ]
        );

        # recuperation de l'article à partir de son Id
        $articleLigne = Articles::whereId($this->value['article_id'])->first();

        # Ajour de la quantité rétournée à la quantité déja disponible en stock
        $articleLigne->update(['qte_en_stock' => $articleLigne->qte_en_stock + $this->qte_retour]);

        # Insertion de la quantité rétournée dans la ligne de l'article dans la location
        Location::whereId($this->value['id'])
            ->first()
            ->update(['qte_retour' => $this->qte_retour]);

        # Lancement d'un evenement pour qu'il soit observé par les composants parents pour un nouveau rendu du dom
        $this->emit('updateLineCloturation');
    }


    public function render()
    {
        return view('livewire.location.cloturation');
    }
}
