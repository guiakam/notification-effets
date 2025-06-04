<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EffetAcademique extends Model
{
    public function etudiants()
{
    return $this->belongsToMany(Etudiant::class, 'effet_etudiant')->withPivot('telechargements')->withTimestamps();
}

public function demandes()
{
    return $this->hasMany(DemandeDeblocage::class);
}

}
