<?php

namespace App\Http\Controllers;

use App\Models\Universite;
use Illuminate\Http\Request;

class UniversiteController extends Controller
{
    public function index()
    {
        return Universite::all();
    }

    public function create()
    {
        return view('universites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        return Universite::create($request->all());
    }

    public function show(Universite $universite)
    {
        return $universite;
    }

    public function edit(Universite $universite)
    {
        return view('universites.edit', compact('universite'));
    }

    public function update(Request $request, Universite $universite)
    {
        $universite->update($request->all());
        return $universite;
    }

    public function destroy(Universite $universite)
    {
        $universite->delete();
        return response()->noContent();
    }
}
