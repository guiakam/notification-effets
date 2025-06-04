<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    public function departement()
{
    return $this->belongsTo(Departement::class);
}

public function filieres()
{
    return $this->hasMany(Filiere::class);
}

}
