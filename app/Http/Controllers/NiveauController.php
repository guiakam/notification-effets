<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    public function index()
    {
        return response()->json(Niveau::with('departement')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id',
        ]);

        $niveau = Niveau::create($request->only(['libelle', 'departement_id']));
        return response()->json($niveau, 201);
    }

    public function show(Niveau $niveau)
    {
        return response()->json($niveau);
    }

    public function update(Request $request, Niveau $niveau)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id',
        ]);

        $niveau->update($request->only(['libelle', 'departement_id']));
        return response()->json($niveau);
    }

    public function destroy(Niveau $niveau)
    {
        $niveau->delete();
        return response()->json(['message' => 'Supprimé avec succès']);
    }
}
