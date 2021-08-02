<?php

namespace App\Http\Controllers;

use App\Entrers;
use App\Articles;
use App\Fournisseurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entrers = Entrers::all();
        return view('entrers.index', compact('entrers'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = Articles::all();
        $fournisseurs = Fournisseurs::all();
        return view('entrers.create', \compact('fournisseurs', 'articles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'qte_recu' => 'required|numeric|min:1',
            'prix_achat_unitaire' => 'nullable|numeric|min:1',
            'fournisseur_id' => 'nullable|numeric|min:1',
            'date_reception' => 'nullable|date',
        ], [
            'qte_recu.required' => 'La quantité est obligatoire',
            'prix_achat_unitaire.numeric' => 'Le prix d\'achat doit être un montant',
            'date_reception.date' => 'Le type de date n\'est pas correcte',
        ]);

        if ($request->date_reception == null) {
            $data = Entrers::create(array_merge($request->all(), ['user_id' => Auth::id(), 'date_reception' => date("Y-m-d H:i:s")]));
        } else {
            $data = Entrers::create(array_merge($request->all(), ['user_id' => Auth::id()]));
        }

        $data->update(['code' => date("Ymd") . '0' . $data->id]);


        if (isset($request->encore)) {
            return back()->with('success', 'Action Effectuée!');
        } else {
            return redirect()->route('approvisionnement.index')->with('success', 'Action Effectuée!');
        }
    }
}
