<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    public function niveau()
{
    return $this->belongsTo(Niveau::class);
}

public function etudiants()
{
    return $this->hasMany(Etudiant::class);
}

}
