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
        // a dynamiser
        $nbrNiveauCritique = $articles->where('qte_en_stock','<=',10)->count();

        $eventCloturer = Evenements::where('status', '=', 'CLOTURÉ')->get();
        $nbrEventCloturer = $eventCloturer->count();

        # Evenement avec le max d'argent
        $bestEvenement = Evenements::where('montant_total','=',Evenements::max('montant_total'))->first();

        # Les 5  derniers evenements
        $latestFiveEvents = Evenements::orderBy('id','DESC')->limit(5)->get();




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
            compact('latestFiveEvents','dataPoints', 'nbrEventEnCours', 'nbrClients','nbrNiveauCritique','nbrEventCloturer','bestEvenement')
        );
    }
}
