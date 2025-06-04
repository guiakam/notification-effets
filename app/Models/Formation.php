<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    public function annee()
{
    return $this->belongsTo(AnneeScolaire::class);
}

public function departements()
{
    return $this->hasMany(Departement::class);
}

}
