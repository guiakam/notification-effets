<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        return response()->json(Etudiant::with('filiere')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'required|string|max:50|unique:etudiants',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:etudiants',
            'telephone' => 'required|string|max:20',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        $etudiant = Etudiant::create($request->only([
            'matricule',
            'nom',
            'email',
            'telephone',
            'filiere_id',
        ]));

        return response()->json($etudiant, 201);
    }

    public function show(Etudiant $etudiant)
    {
        return response()->json($etudiant->load('filiere'));
    }

    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'matricule' => 'required|string|max:50|unique:etudiants,matricule,' . $etudiant->id,
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:etudiants,email,' . $etudiant->id,
            'telephone' => 'required|string|max:20',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        $etudiant->update($request->only([
            'matricule',
            'nom',
            'email',
            'telephone',
            'filiere_id',
        ]));

        return response()->json($etudiant);
    }

    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return response()->json(['message' => 'Étudiant supprimé avec succès']);
    }
}
