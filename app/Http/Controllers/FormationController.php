<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index()
    {
        return response()->json(Formation::with('anneeScolaire')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'annee_id' => 'required|exists:annees_scolaires,id',
        ]);

        $formation = Formation::create($request->only(['libelle', 'annee_id']));
        return response()->json($formation, 201);
    }

    public function show(Formation $formation)
    {
        return response()->json($formation);
    }

    public function update(Request $request, Formation $formation)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'annee_id' => 'required|exists:annees_scolaires,id',
        ]);

        $formation->update($request->only(['libelle', 'annee_id']));
        return response()->json($formation);
    }

    public function destroy(Formation $formation)
    {
        $formation->delete();
        return response()->json(['message' => 'Supprimée avec succès']);
    }
}
