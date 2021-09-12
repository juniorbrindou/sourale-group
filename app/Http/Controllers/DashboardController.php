<?php

namespace App\Http\Controllers;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $dataPoints =
            [
                ['x' => 10, 'y' => 10],
                ['x' => 20, 'y' => 15],
                ['x' => 30, 'y' => 25],
                ['x' => 40, 'y' => 30],
                ['x' => 50, 'y' => 28]
            ];
        // $data = json_encode($dataPoints);
        return view('dashboard', compact('dataPoints'));
    }
}
