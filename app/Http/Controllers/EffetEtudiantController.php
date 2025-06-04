<?php

namespace App\Http\Controllers;

use App\Models\EffetEtudiant;
use Illuminate\Http\Request;

class EffetEtudiantController extends Controller
{
    public function index()
    {
        return EffetEtudiant::all();
    }

    public function create()
    {
        return view('effet_etudiant.create');
    }

    public function store(Request $request)
    {
        return EffetEtudiant::create($request->all());
    }

    public function show(EffetEtudiant $effetEtudiant)
    {
        return $effetEtudiant;
    }

    public function edit(EffetEtudiant $effetEtudiant)
    {
        return view('effet_etudiant.edit', compact('effetEtudiant'));
    }

    public function update(Request $request, EffetEtudiant $effetEtudiant)
    {
        $effetEtudiant->update($request->all());
        return $effetEtudiant;
    }

    public function destroy(EffetEtudiant $effetEtudiant)
    {
        $effetEtudiant->delete();
        return response()->noContent();
    }
}
