<?php

namespace App\Http\Controllers;

use App\Models\Pret;
use Illuminate\Http\Request;

class BilanController extends Controller
{
    public function index()
    {
        $minPayer = Pret::min('totalPayer');
        $maxPayer = Pret::max('totalPayer');
        $total = Pret::sum('totalPayer');


        return response()->json(
            ["bilans" => [
                "minAPayer" => $minPayer,
                "maxAPayer" => $maxPayer,
                "totalAPayer" => $total,
                ]
            ], 200);
    }
}
