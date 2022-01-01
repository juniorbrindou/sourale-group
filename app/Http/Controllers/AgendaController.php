<?php

namespace App\Http\Controllers;

use App\Evenements;
use Illuminate\Http\Request;
use App\Http\Resources\EvenementResource;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return view('agenda.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function JsonIndex(Request $request)
    {
        $all = EvenementResource::collection(Evenements::all());
        $data = $all->where('start','>=', $request->start)
            ->where('end','<=', $request->end)
            ->all();
        return response()->json($all);

    }
}
