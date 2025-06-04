<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    public function index()
    {
        return Abonnement::all();
    }

    public function create()
    {
        return view('abonnements.create');
    }

    public function store(Request $request)
    {
        return Abonnement::create($request->all());
    }

    public function show(Abonnement $abonnement)
    {
        return $abonnement;
    }

    public function edit(Abonnement $abonnement)
    {
        return view('abonnements.edit', compact('abonnement'));
    }

    public function update(Request $request, Abonnement $abonnement)
    {
        $abonnement->update($request->all());
        return $abonnement;
    }

    public function destroy(Abonnement $abonnement)
    {
        $abonnement->delete();
        return response()->noContent();
    }
}
