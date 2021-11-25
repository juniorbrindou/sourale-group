<?php

namespace App\Http\Controllers;

use App\Location;
use App\Evenements;
use App\Factures;

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
        $facture = Factures::where('evenement_id', '=', $id)->firstOrFail();

        $ttc = ($evenement->montant_total - $evenement->remise) + $evenement->caution ;

        return view('facture.invoice',
        compact(
            'evenement',
            'client',
            'tab_locations',
            'facture',
            'ttc'
        ));
    }
}
