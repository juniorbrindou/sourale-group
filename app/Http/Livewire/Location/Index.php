<?php

namespace App\Http\Livewire\Location;

use App\Articles;
use App\Evenements;
use App\Location;
use Livewire\Component;

class Index extends Component
{
    public $evenements;
    public $statut_evenement;
    public $tab_locations;
    public $ligne = [];
    public $evenement_id;
    public $test2;

    public function update_statut()
    {



        //        $this->tab_locations = Location::where('evenement_id', '=', $evenement->id)->get();
        //
        //        foreach ($this->tab_locations as $item => $value) {
        //            $this->ligne[$item]['article'] = $value->article;
        //            $this->ligne[$item]['qte_loue'] = $value->qte_loue;
        //            $this->ligne[$item]['nbr_jour'] = $value->nb_jour;
        //        }
        //        if ($this->statut_evenement == "EN COURS") {
        //
        //            /*verifiaction de la possibilité de l'action :
        //             *  ici on verifie si les quantités sont disponibles en bd
        //            */
        //            foreach ($this->ligne as $key => $value) {
        //                $article = Articles::whereId($this->ligne[$key]['article']['id'])->first();
        //
        //                /*on fait un calcul dont le resultat est stocker dans  $qte_reste( la qte en stock - la qte louée)*/
        //                $qte_reste = $article->qte_en_stock - $value['qte_loue'];
        //                $test = 0;
        //                if ($qte_reste >= 0) {
        //                    $test++;
        //                    $article->update(['qte_en_stock' => $qte_reste]);
        //                } else {
        //                    $test--;
        //                }
        //            }
        //            if ($test >= count($this->ligne)) {
        //                foreach ($this->ligne as $key => $value) {
        //                    $qte_reste = $article->qte_en_stock - $value['qte_loue'];
        //                    $article->update(['qte_en_stock' => $qte_reste]);
        //                }
        //            } else {
        //                $this->dispatchBrowserEvent('sweetAlert', [
        //                    'title' => 'Article Insuffisant',
        //                    'timer' => 5000,
        //                    'icon' => 'error',
        //                ]);
        //            }
        //        }
        //        $evenement->update(['status' => $this->statut_evenement]);
    }


    public function getQueryString()
    {
        return [];
    }


    public function mount()
    {
        $this->evenements = Evenements::all();
    }

    public function render()
    {
        $this->test2 = 'bonjour';
        return view('livewire.location.index');
    }
}
