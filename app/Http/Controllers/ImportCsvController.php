<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImportCsvController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:2048',
        ]);

        $file = $request->file('file');
        $rows = array_map('str_getcsv', file($file));
        $header = array_map('trim', array_shift($rows));

        // TODO: Traiter les données du CSV selon les entités
        // Exemple : année_scolaire, formation, département, niveau, filière, étudiant

        return response()->json([
            'message' => 'Fichier importé avec succès.',
            'colonnes' => $header,
            'apercu' => array_slice($rows, 0, 5),
        ]);
    }
}
