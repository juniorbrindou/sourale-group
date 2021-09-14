<?php

namespace App\Http\Livewire\Location;

use App\Articles;
use App\Location;
use App\Evenements;
use Illuminate\Database\Events\TransactionBeginning;
use Livewire\Component;

class Index extends Component
{
    public $evenements;
    public $statut_evenement;
    public $tab_locations;
    public $ligne;


    public function update_statut(int $id)
    {
        $this->validate(['statut_evenement' => 'required'], ['statut_evenement.*' => 'Aucun status choisis']);
        $evenement = Evenements::find($id);
        $this->tab_locations = Location::where('evenement_id', '=', $evenement->id)->get();

        foreach ($this->tab_locations as $item => $value) {
            $this->ligne[$item]['article'] = $value->article;
            $this->ligne[$item]['qte_loue'] = $value->qte_loue;
            $this->ligne[$item]['nbr_jour'] = $value->nb_jour;
        }

        if ($this->statut_evenement == "EN COURS") {
            foreach ($this->ligne as $key => $value) {
                $article = Articles::whereId($this->ligne[$key]['article']['id'])->first();
                $qte_reste = $article->qte_en_stock - $value['qte_loue'];
                $test = 0;
                if ($qte_reste >= 0) {
                    $test++;
                    $article->update(['qte_en_stock' => $qte_reste]);
                } else {
                    $test--;
                }
            }
            if ($test >= count($this->ligne)) {
                foreach ($this->ligne as $key => $value) {
                    $article = Articles::whereId($this->ligne[$key]['article']['id'])->first();
                    $qte_reste = $article->qte_en_stock - $value['qte_loue'];
                    $article->update(['qte_en_stock' => $qte_reste]);
                }
            } else {
                $this->dispatchBrowserEvent('sweetAlert', [
                    'title' => 'Article Insuffisant',
                    'timer' => 5000,
                    'icon' => 'error',
                    // 'text' => 'La ',
                ]);
            }
        }
        $evenement->update(['status' => $this->statut_evenement]);
    }

    public function mount()
    {
        $this->evenements = Evenements::all();
    }

    public function render()
    {
        return view('livewire.location.index');
    }
}
