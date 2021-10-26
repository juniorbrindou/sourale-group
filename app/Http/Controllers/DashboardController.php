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

        #Somme de toutes les location
        $allEvents = Evenements::all();

        # Les 5  derniers evenements
        $latestFiveEvents = Evenements::orderBy('id','DESC')->limit(5)->get();

        $t = 0;

        $totalEvenements = Evenements::where('status','=','CLOTURÉ')->get();

        $sommeTotalEvenements = $totalEvenements->sum('montant_total');





        #Total DEVIS
        $totalEvenementsDevis = Evenements::where('status','=','DEVIS')->get();

        #Total en cours
        $totalEvenementsEnCours = Evenements::where('status','=','EN COURS')->get();

        #Total en annulé
        $totalEvenementsAnnuler = Evenements::where('status','=','ANNULÉ')->get();

         #Total en Terminé
         $totalEvenementsTerminer = Evenements::where('status','=','TERMINÉ')->get();

        if ($allEvents->count() <= 0) {
            $pcTotalEvenements = 0;
            $pcTotalEvenementsDevis = 0;
            $pcTotalEvenementsEnCours = 0;
            $pcTotalEvenementsAnnuler = 0;
            $pcTotalEvenementsTerminer = 0;

        }else{
            $pcTotalEvenements = $totalEvenements->count() * 100 / $allEvents->count();
            $pcTotalEvenementsDevis = $totalEvenementsDevis->count() *  100 / $allEvents->count();
            $pcTotalEvenementsEnCours = $totalEvenementsEnCours->count() * 100 / $allEvents->count();
            $pcTotalEvenementsAnnuler = $totalEvenementsAnnuler->count() * 100 / $allEvents->count();
            $pcTotalEvenementsTerminer = $totalEvenementsTerminer->count() * 100 / $allEvents->count();

        }


        # Les 5  derniers nom cloturés
        $derniersEvenentsNonCloturer = Evenements::where('status','=','TERMINÉ')->orderBy('id','DESC')->limit(5)->get();

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
            compact(
            'totalEvenements',
            'pcTotalEvenements',
            'totalEvenementsTerminer',
            'pcTotalEvenementsTerminer',
            'totalEvenementsDevis',
            'pcTotalEvenementsDevis',
            'totalEvenementsEnCours',
            'pcTotalEvenementsEnCours',
            'totalEvenementsAnnuler',
            'pcTotalEvenementsAnnuler',
            'allEvents',
            'derniersEvenentsNonCloturer',
            'sommeTotalEvenements',
            'latestFiveEvents',
            'dataPoints',
            'nbrEventEnCours',
            'nbrClients',
            'nbrNiveauCritique',
            'nbrEventCloturer',
            'bestEvenement'
            ));
    }
}
