<?php

namespace App\Http\Controllers;

use App\Evenements;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function encours($id){
        $evenement = Evenements::whereId($id)->firstOrFail();
        return view('location.terminee', compact('evenement'));
    }
}
