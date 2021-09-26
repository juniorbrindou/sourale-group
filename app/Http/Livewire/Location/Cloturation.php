<?php

namespace App\Http\Livewire\Location;

use App\Articles;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Cloturation extends Component
{
    public $qte_retour;
    public $value;

    public function save()
    {
        $this->validate(
            ['qte_retour' => 'required|min:0|numeric|max:' . $this->value->qte_loue],
            [
                'qte_retour.required' => 'Saisissez la quantité',
                'qte_retour.min' => 'Saisissez une quantité valide',
                'qte_retour.max' => 'Saisissez une quantité valide : valeur max : ' . $this->value->qte_loue,
            ]
        );
        # convertion en entier
        $this->qte_retour =(int)$this->qte_retour;

        /*Mise a jour de la qte dispo d'article*/
        # recupeartion de l'article concerné
        $articleBD = Articles::whereId($this->value->article_id)->first();
        # Ajout de la nouvelle quantité a l'ancienne quantité disponible

        if(($this->qte_retour + $articleBD->qte_retour) <= $this->value->qte_loue)
        {
             /*Update de la location */
            $oldQteRetour = $this->value->qte_retour;
            $this->value->update([
                'qte_retour' => $this->qte_retour,
                'date_retour' => date('d-m-Y'),
            ]);



            # retrait de l'ancienne qte :
            DB::table('articles')
              ->where('id', $this->value->article_id)
              ->update([
                  'qte_en_stock' => $articleBD->qte_en_stock - $oldQteRetour,
              ]);

            $qte = $this->qte_retour;
            DB::table('articles')
              ->where('id', $this->value->article_id)
              ->increment("qte_en_stock",$qte);
//            update([
//                  'qte_en_stock' => ,
//              ]);


            $this->emit('updateLineCloturation');
        }else{
            $this->dispatchBrowserEvent('sweetAlert', [
                'title' => 'Action Impossible : Quantité retournée trop grande!',
                'timer' => 5000,
                'icon' => 'error',
            ]);
        }


    }


    public function render()
    {
        return view('livewire.location.cloturation');
    }
}
