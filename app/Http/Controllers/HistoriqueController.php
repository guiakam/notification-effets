<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use Illuminate\Http\Request;

class HistoriqueController extends Controller
{
    public function index()
    {
        return Historique::all();
    }

    public function create()
    {
        return view('historiques.create');
    }

    public function store(Request $request)
    {
        return Historique::create($request->all());
    }

    public function show(Historique $historique)
    {
        return $historique;
    }

    public function edit(Historique $historique)
    {
        return view('historiques.edit', compact('historique'));
    }

    public function update(Request $request, Historique $historique)
    {
        $historique->update($request->all());
        return $historique;
    }

    public function destroy(Historique $historique)
    {
        $historique->delete();
        return response()->noContent();
    }
}
