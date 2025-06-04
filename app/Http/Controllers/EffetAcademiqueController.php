<?php

namespace App\Http\Controllers;

use App\Models\EffetAcademique;
use Illuminate\Http\Request;

class EffetAcademiqueController extends Controller
{
    public function index()
    {
        return EffetAcademique::all();
    }

    public function create()
    {
        return view('effets.create');
    }

    public function store(Request $request)
    {
        return EffetAcademique::create($request->all());
    }

    public function show(EffetAcademique $effetAcademique)
    {
        return $effetAcademique;
    }

    public function edit(EffetAcademique $effetAcademique)
    {
        return view('effets.edit', compact('effetAcademique'));
    }

    public function update(Request $request, EffetAcademique $effetAcademique)
    {
        $effetAcademique->update($request->all());
        return $effetAcademique;
    }

    public function destroy(EffetAcademique $effetAcademique)
    {
        $effetAcademique->delete();
        return response()->noContent();
    }
}
