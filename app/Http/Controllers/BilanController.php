<?php

namespace App\Http\Controllers;

use App\Models\Pret;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BilanController extends Controller
{
    public function index()
    {
        // Bilans mensuels groupés par mois
        $bilanMensuel = Pret::selectRaw(
            '
        DATE_FORMAT(date_de_pret, "%Y-%m") as mois,
        SUM(totalPayer) as total,
        MAX(totalPayer) as max,
        MIN(totalPayer) as min
    ',
        )
            ->groupBy('mois')
            ->orderBy('mois')
            ->get();

        // Valeurs globales sur toute la table
        $totalGlobal = Pret::sum('totalPayer');
        $maxGlobal = Pret::max('totalPayer');
        $minGlobal = Pret::min('totalPayer');

        return response()->json([
            'bilan_mensuel' => $bilanMensuel,
            'global' => [
                'total' => $totalGlobal,
                'max' => $maxGlobal,
                'min' => $minGlobal,
            ],
        ]);
    }
}
