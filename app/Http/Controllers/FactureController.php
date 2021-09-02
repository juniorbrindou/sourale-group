<?php

namespace App\Http\Controllers;

use App\Location;
use App\Evenements;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evenement = Evenements::whereId($id)->firstOrFail();
        $tab_locations = Location::where('evenement_id', '=', $evenement->id)->get();
        $client = $tab_locations[0]->client;

        $totalBrute = 0;


        foreach ($tab_locations as $value) {
            $totalBrute = $totalBrute + $value->total_une_ligne;
        }


        // ($tab_locations, 'total_une_ligne'));

        // $caution = $this->totalBrute * 0.2;


        return view('facture.invoice', compact('evenement', 'client', 'tab_locations', 'totalBrute'));
    }
}
