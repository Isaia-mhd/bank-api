<?php

namespace App\Http\Controllers;

use App\Models\Pret;
use Illuminate\Http\Request;

class BilanController extends Controller
{
    public function index()
    {
        $amounts = Pret::pluck("totalPayer");

        $minPayer = Pret::min('totalPayer');
        $maxPayer = Pret::max('totalPayer');
        $total = Pret::sum('totalPayer');



        return response()->json([
            "minAPayer" => $minPayer,
            "maxAPayer" => $maxPayer,
            "totalAPayer" => $total,
            "aomunt" => $amounts,

        ], 200);
    }
}
