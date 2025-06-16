<?php

namespace App\Http\Controllers;

use App\Models\Pret;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BilanController extends Controller
{
    public function index()
    {
        // $bilans = Pret::select(
        //         DB::raw("DATE_FORMAT(created_at, '%Y-%m') as mois"),
        //         DB::raw("SUM(totalPayer) as total"),
        //         DB::raw("MAX(totalPayer) as max"),
        //         DB::raw("MIN(totalPayer) as min")
        //     )
        //     ->groupBy('mois')
        //     ->orderBy('mois')
        //     ->get();

        $bilans =  Pret::selectRaw("DATE_FORMAT(date_de_pret, '%Y-%m') as mois")
        ->selectRaw("SUM(totalPayer) as total")
        ->selectRaw("MAX(totalPayer) as max")
        ->selectRaw("MIN(totalPayer) as min")
        ->groupBy('mois')
        ->orderBy('mois')
        ->get();


        return response()->json($bilans);
    }
}
