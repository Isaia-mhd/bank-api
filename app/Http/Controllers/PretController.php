<?php

namespace App\Http\Controllers;

use App\Models\Pret;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PretController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prets = DB::table('prets')->orderBy('created_at', 'DESC')->get();
        return response()->json([
            "prets" => $prets
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "numeroCompte" => "required|string",
            "nomClient" => "required|string|max:40",
            "nomBanque" => "required",
            "montant" => "required|numeric",
            "taux_de_pret" => "required|numeric",
            "date_de_pret" => "required|date",
        ]);

        $validated["totalPayer"] = $validated["montant"] + (($validated["montant"] * $validated["taux_de_pret"]) /100);


        $pret = Pret::create($validated);

        return response()->json([
            "message" => "Prêt ajouté avec success",
            "pret" => $pret
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Pret $pret)
    {
        return response()->json([
            "pret" => $pret
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pret $pret)
    {
        $validated = $request->validate([
            "numeroCompte" => "required|string",
            "nomClient" => "required|string|max:40",
            "nomBanque" => "required",
            "montant" => "required|numeric",
            "taux_de_pret" => "required|numeric",
            "date_de_pret" => "required|date",
        ]);

        $pret->update($request->all());

        return response()->json([
            "message" => "Prêt mis à jour avec succès.",
            "pret" => $pret
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pret $pret)
    {
        $pret->delete();

        return response()->json([
            "message" => "Prêt supprimé avec succès."
        ]);
    }
}
