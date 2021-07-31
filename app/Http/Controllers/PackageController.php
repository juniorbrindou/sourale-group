<?php

namespace App\Http\Controllers;

use App\Packages;
use App\Type_packages;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Packages::all();
        return view('parametrage.packages.index', compact('packages'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_packages = Type_packages::all();
        return view('parametrage.packages.create', compact('type_packages'));
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
        ], [
            'libelle.required' => 'Le libéllé est obligatoire'
        ]);
        $data = Packages::create($request->all());

        // creation du code
        $data->update(['code' => date("Ymd") . '0' . $data->id]);

        if (isset($request->encore)) {
            return back()->with('success', 'Action Effectuée!');
        } else {
            return redirect()->route('packages.index')->with('success', 'Action Effectuée!');
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
        $typePackage = Packages::whereId($id)->first();
        return view('parametrage.packages.edit', compact('typePackage'));
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
        ], [
            'libelle.required' => 'Le libéllé est obligatoire'
        ]);
        Packages::whereId($id)->update([
            'libelle' => $request->libelle,
            'description' => $request->description,
        ]);

        return redirect()->route('packages.index')->with('success', 'Action Effectuée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Packages::destroy($id);
        return back()->with('success', 'Action Effectuée!');
    }
}
