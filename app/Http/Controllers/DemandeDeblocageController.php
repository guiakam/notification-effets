<?php

namespace App\Http\Controllers;

use App\Models\DemandeDeblocage;
use Illuminate\Http\Request;

class DemandeDeblocageController extends Controller
{
    public function index()
    {
        return DemandeDeblocage::all();
    }

    public function create()
    {
        return view('demandes.create');
    }

    public function store(Request $request)
    {
        return DemandeDeblocage::create($request->all());
    }

    public function show(DemandeDeblocage $demandeDeblocage)
    {
        return $demandeDeblocage;
    }

    public function edit(DemandeDeblocage $demandeDeblocage)
    {
        return view('demandes.edit', compact('demandeDeblocage'));
    }

    public function update(Request $request, DemandeDeblocage $demandeDeblocage)
    {
        $demandeDeblocage->update($request->all());
        return $demandeDeblocage;
    }

    public function destroy(DemandeDeblocage $demandeDeblocage)
    {
        $demandeDeblocage->delete();
        return response()->noContent();
    }
}
