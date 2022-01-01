<?php

namespace App\Http\Livewire\Stock;

use App\Articles;
use App\Location;
use Livewire\Component;

class Index extends Component
{

    public $datePrevisionStock;
    public $articles;

    /**
     * @return [type]
     */
    public function formPrevisionStock()
    {

        // '2021-12-08 23:43'
        // $this->articles =
        try {
            //"2021-12-23T12:02"
            $test = Location::whereDate('date_location',$this->datePrevisionStock)->get();

        } catch (\Throwable $th) {
            return $this->dispatchBrowserEvent('sweetAlert', [
                'title' => 'Erreur de saisie',
                'icon' => 'error',
                'text' => 'Veuillez remplir tous les champs: Jour, mois, année, heure, minutes',
            ]);
        }
    }



    /**
     * @return [type]
     */
    public function previsionStock()
    {
        try {
            //"2021-12-23T12:02"
            getDatefromTextField($this->datePrevisionStock);

        } catch (\Throwable $th) {
            return $this->dispatchBrowserEvent('sweetAlert', [
                'title' => 'Erreur de saisie',
                'icon' => 'error',
                'text' => 'Veuillez remplir tous les champs: Jour, mois, année, heure, minutes',
            ]);
        }

    }


    public function mount()
    {
        // $this->articles =  [
        //     "id" => 15,
        //     "code" => "20211124015",
        //     "libelle" => "plat en verre sur pied",
        //     "description" => null,
        //     "article_photo" => "articles/20211124015_plat en verre sur pied.png",
        //     "qte_en_stock" => 100,
        //     "qte_stocker" => 100,
        //     "prix_tarification" => "450",
        //     "user_id" => 1,
        //     "type_article_id" => 1,
        //     "remarque_id" => null,
        //     "categorie_id" => 5,
        //     "tarification_id" => null,
        //     "created_at" => "2021-11-24 22:38:32",
        //     "updated_at" => "2021-11-24 22:53:17"
        // ];

        $this->articles = Articles::all();
        // dd($this->articles);
        // $this->articles;
    }



    public function render()
    {
        return view('livewire.stock.index');
    }
}
