<?php

namespace App\Http\Controllers;

use App\Models\AnneeScolaire;
use Illuminate\Http\Request;

class AnneeScolaireController extends Controller
{
    public function index()
    {
        return response()->json(AnneeScolaire::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255|unique:annees_scolaires,libelle',
        ]);

        $annee = AnneeScolaire::create([
            'libelle' => $request->libelle,
        ]);

        return response()->json($annee, 201);
    }

    public function show($id)
    {
        return response()->json(AnneeScolaire::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $annee = AnneeScolaire::findOrFail($id);

        $request->validate([
            'libelle' => 'required|string|max:255|unique:annees_scolaires,libelle,' . $id,
        ]);

        $annee->update([
            'libelle' => $request->libelle,
        ]);

        return response()->json($annee);
    }

    public function destroy($id)
    {
        $annee = AnneeScolaire::findOrFail($id);
        $annee->delete();

        return response()->json(['message' => 'Supprimée avec succès.']);
    }
}
