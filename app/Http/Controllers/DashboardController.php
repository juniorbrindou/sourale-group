<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Clients;
use App\Evenements;

class DashboardController extends Controller
{
    public function dashboard()
    {
        /* les cards*/
        $eventEnCours = Evenements::where('status', '=', 'EN COURS')->get();
        $nbrEventEnCours = $eventEnCours->count();

        $clients = Clients::all();
        $nbrClients = $clients->count();

        $articles = Articles::all();
        $nbrNiveauCritique = $articles->where('qte_en_stock','<=',10)->count();

        $eventCloturer = Evenements::where('status', '=', 'CLOTURÉ')->get();
        $nbrEventCloturer = $eventCloturer->count();




        $dataPoints =
            [
                ['x' => 10, 'y' => 10],
                ['x' => 20, 'y' => 15],
                ['x' => 30, 'y' => 25],
                ['x' => 40, 'y' => 30],
                ['x' => 50, 'y' => 28]
            ];
        // $data = json_encode($dataPoints);
        return view(
            'dashboard',
            compact('dataPoints', 'nbrEventEnCours', 'nbrClients','nbrNiveauCritique','nbrEventCloturer')
        );
    }
}
