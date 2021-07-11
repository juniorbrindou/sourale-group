<?php

namespace App\Http\Controllers;

use App\Fournisseurs;
use Illuminate\Http\Request;

class FournisseursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = Fournisseurs::all();
        return view('parametrage.fournisseurs.index', compact('fournisseurs'));
    }
}
