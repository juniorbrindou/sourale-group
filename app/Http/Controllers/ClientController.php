<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Evenements;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use function compact;
use function view;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('parametrage.clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametrage.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required','string','min:1', Rule::unique('clients')],
            'contact1' => 'nullable|min:0',
            'contact2' => 'nullable|min:0',
            'adresse' => 'nullable|min:0',
        ], [
            'nom.required' => 'Le nom du client est obligatoire',
            'nom.unique' => 'Ce client existe déja',
        ]);

        $data = Clients::create(array_merge($request->all(), ['user_id' => Auth::id()]));
        // creation du code
        $data->update(['code' => date("Ymd") . '0' . $data->id]);

        if (isset($request->encore)) {
            return back()->with('success', 'Action Effectuée!');
        } else {
            return redirect()->route('clients.index')->with('success', 'Action Effectuée!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(Clients $client)
    {
        $evenements = Evenements::where('client_id', '=', $client->id)->orderBy('id', 'desc')->get();
        $max = $evenements->max('montant_total');
        $bestEvenement = $evenements->where('montant_total', '=', $max)->first();
        $gainTotal = 0;
        foreach ($evenements->pluck('montant_total') as $value) {
            $gainTotal += $value;
        }

        return view('parametrage.clients.show', compact('client', 'evenements', 'gainTotal', 'bestEvenement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $client = Clients::whereId($id)->first();
        return view('parametrage.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|min:1',
            'contact1' => 'nullable|min:0',
            'contact2' => 'nullable|min:0',
            'adresse' => 'nullable|min:0',
        ], [
            'nom.required' => 'Le nom du client est obligatoire'
        ]);
        Clients::whereId($id)->update([
            'nom' => $request->nom,
            'contact1' => $request->contact1,
            'contact2' => $request->contact2,
            'adresse' => $request->adresse,
        ]);

        return redirect()->route('clients.index')->with('success', 'Action Effectuée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Clients::destroy($id);
        return back()->with('success', 'Action Effectuée!');
    }
}
