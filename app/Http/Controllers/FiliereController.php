<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function index()
    {
        return response()->json(Filiere::with('niveau')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'niveau_id' => 'required|exists:niveaux,id',
        ]);

        $filiere = Filiere::create($request->only(['libelle', 'niveau_id']));
        return response()->json($filiere, 201);
    }

    public function show(Filiere $filiere)
    {
        return response()->json($filiere);
    }

    public function update(Request $request, Filiere $filiere)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'niveau_id' => 'required|exists:niveaux,id',
        ]);

        $filiere->update($request->only(['libelle', 'niveau_id']));
        return response()->json($filiere);
    }

    public function destroy(Filiere $filiere)
    {
        $filiere->delete();
        return response()->json(['message' => 'Supprimée avec succès']);
    }
}
