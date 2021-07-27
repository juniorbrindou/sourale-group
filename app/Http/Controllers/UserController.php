<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('login', '<>', 'root')->get();
        return view('parametrage.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parametrage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::whereId($id)->first();
        return view('parametrage.users.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'login' => 'required|string|min:1',
            'nom' => 'nullable|min:1|string',
            'prenoms' => 'nullable|min:0|string',
            'tel1' => 'nullable|min:10|string',
            'tel2' => 'nullable|min:10|string',
            'genre' => 'nullable|min:1|string',
            'role_id' => 'nullable|min:1|numeric',
        ], [
            'libelle.required' => 'Le libéllé est obligatoire',
            'tel1.min' => 'La numérotation est passée à 10 chiffres',
            'tel2.min' => 'La numérotation est passée à 10 chiffres',
        ]);
        User::whereId($id)->update([
            'login' => $request->login,
            'nom' => $request->nom,
            'prenoms' => $request->prenoms,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'genre' => $request->genre,
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('users.index')->with('success', 'Action Effectuée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return back()->with('success', 'Action Effectuée!');
    }
}
