<?php

namespace App\Http\Controllers;

use App\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::all();
        return view('parametrage.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parametrage.clients.create');
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
            'nom' => 'required|string|min:1',
            'prenoms' => 'nullable|min:0',
            'contact1' => 'nullable|min:0',
            'contact2' => 'nullable|min:0',
            'addresse' => 'nullable|min:0',
        ],[
            'nom.required' => 'Le nom du client est obligatoire'
        ]);
        Clients::create(array_merge($request->all(),['user_id' => Auth::id()]));

        if (isset($request->encore)) {
            return back()->with('success', 'Action Effectuée!');
        }else{
            return redirect()->route('clients.index')->with('success', 'Action Effectuée!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Clients::whereId($id)->find(); 
        return view('parametrage.clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|min:1',
            'prenoms' => 'nullable|min:0',
            'contact1' => 'nullable|min:0',
            'contact2' => 'nullable|min:0',
            'addresse' => 'nullable|min:0',
        ],[
            'nom.required' => 'Le nom du client est obligatoire'
        ]);
        Clients::whereId($id)->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Action Effectuée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clients::destroy($id);
        return back()->with('success', 'Action Effectuée!');
    }
}
