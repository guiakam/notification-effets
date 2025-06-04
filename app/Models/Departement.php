<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    public function formation()
{
    return $this->belongsTo(Formation::class);
}

public function niveaux()
{
    return $this->hasMany(Niveau::class);
}

}
