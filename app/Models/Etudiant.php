<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    public function filiere()
{
    return $this->belongsTo(Filiere::class);
}

public function effets()
{
    return $this->belongsToMany(EffetAcademique::class, 'effet_etudiant')->withPivot('telechargements')->withTimestamps();
}

public function demandes()
{
    return $this->hasMany(DemandeDeblocage::class);
}

public function notifications()
{
    return $this->hasMany(Notification::class);
}

public function historiques()
{
    return $this->hasMany(Historique::class);
}

}
