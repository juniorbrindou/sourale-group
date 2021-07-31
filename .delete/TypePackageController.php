<?php

namespace App\Http\Controllers;

use App\Type_packages;
use Illuminate\Http\Request;

class TypePackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typePackages = Type_packages::all();
        return view('parametrage.typePackages.index', compact('typePackages'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parametrage.typePackages.create');
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
            'libelle' => 'required|string|min:1',
            'description' => 'nullable|min:0',
        ],[
            'libelle.required' =>'Le libéllé est obligatoire'
        ]);
        $data = Type_packages::create($request->all());

        // creation du code
        $data->update(['code' => date("Ymd").'0'.$data->id]);

        if (isset($request->encore)) {
            return back()->with('success', 'Action Effectuée!');
        }else{
            return redirect()->route('typePackages.index')->with('success', 'Action Effectuée!');
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
        $typePackage = Type_packages::whereId($id)->first(); 
        return view('parametrage.typePackages.edit',compact('typePackage'));
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
            'libelle' => 'required|string|min:1',
            'description' => 'nullable|min:0',
        ],[
            'libelle.required' =>'Le libéllé est obligatoire'
        ]);
        Type_packages::whereId($id)->update([
            'libelle'=> $request->libelle,
            'description'=> $request->description,
        ]);

        return redirect()->route('typePackages.index')->with('success', 'Action Effectuée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Type_packages::destroy($id);
        return back()->with('success', 'Action Effectuée!');
    }
}

