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
        // try {
            //"2021-12-23T12:02"
            $test = Location::whereDate('date_location',$this->datePrevisionStock)->get();
            $all = Location::all();
            $enCours = $all->where('status','=','Enregistré')->all();
            $today = date('Y-m-d');
            dd($all);

        // } catch (\Throwable $th) {
            // return $this->dispatchBrowserEvent('sweetAlert', [
            //     'title' => 'Erreur de saisie',
            //     'icon' => 'error',
            //     'text' => 'Veuillez remplir tous les champs: Jour, mois, année, heure, minutes',
            // ]);
        // }
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
        $this->articles = Articles::all();
    }



    public function render()
    {
        return view('livewire.stock.index');
    }
}
