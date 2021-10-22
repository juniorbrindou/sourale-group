<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('login', '<>', 'root')->get();
        return view('parametrage.users.index', compact('users'));
    }





    public function create()
    {
        $roles = Role::where('name', '=', 'admin')->get();
        return view('parametrage.users.create', compact('roles'));
    }






    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required|string|min:1|unique:users,login',
            'nom' => 'required|string|min:1',
            'nom' => 'nullable|min:0',
        ]);


        $data = User::create([
            'login' => $request->login,
            'nom' => $request->nom,
            'tel1' => $request->tel1,
            'password' => Hash::make($request->password),
            'genre' => $request->genre,
        ]);

        $data->assignRole($request->role);

        if (isset($request->encore)) {
            toast('Enregistrement Effectué', 'success');
            return back();
        } else {
            toast('Enregistrement Effectué', 'success');
            return redirect()->route('users.index');
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
        $user = User::whereId($id)->first();
        $roles = Role::where('name', '<>', 'super-admin')->get();
        return view('parametrage.users.profile', compact('user', 'roles'));
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
            'tel1' => 'nullable|min:10|string',
            'tel2' => 'nullable|min:10|string',
            'genre' => 'nullable|min:1|string',
            'role_id' => 'nullable|min:1|numeric',
        ], [
            'libelle.required' => 'Le libéllé est obligatoire',
            'tel1.min' => 'La numérotation est passée à 10 chiffres',
            'tel2.min' => 'La numérotation est passée à 10 chiffres',
        ]);

        $data = User::find($id);
        $data->update([
            'login' => $request->login,
            'nom' => $request->nom,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'genre' => $request->genre,
        ]);
        $data->removeRole($data->roles->first());
        $data->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'Action Effectuée!');
    }



    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'oldPassword' => 'required',
        ], [
            'password.required' => 'Le champ nouveau mot de passe est obligatoire',
            'oldPassword.required' => 'Le champ ancien mot de passe est obligatoire',
            'password.min' => 'Le mot de passe doit avoir au moins 8 caractères',
            'password.confirmed' => 'Le champ de confirmation est different du mot de passe',
        ]);

        $user = User::whereId($id)->first();

        if (!Hash::check($request->oldPassword, $user->password)) {
            Alert::error('Erreur de Mot de passe', 'Mot de passe Incorrecte');
            return redirect()->back();
        }
        $newPassword = Hash::make($request->password);
        $user->update(['password' => $newPassword]);
        return redirect()->back()->with('success', 'Le mot de passe a été modifié!');
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
        toast('Action Effectuée', 'success');
        return back();
    }
}
