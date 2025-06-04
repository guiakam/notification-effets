<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        return response()->json(Departement::with('formation')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'formation_id' => 'required|exists:formations,id',
        ]);

        $departement = Departement::create($request->only(['libelle', 'formation_id']));
        return response()->json($departement, 201);
    }

    public function show(Departement $departement)
    {
        return response()->json($departement);
    }

    public function update(Request $request, Departement $departement)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'formation_id' => 'required|exists:formations,id',
        ]);

        $departement->update($request->only(['libelle', 'formation_id']));
        return response()->json($departement);
    }

    public function destroy(Departement $departement)
    {
        $departement->delete();
        return response()->json(['message' => 'Supprimé avec succès']);
    }
}
