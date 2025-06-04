<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandeDeblocage extends Model
{
    public function etudiant()
{
    return $this->belongsTo(Etudiant::class);
}

public function effet()
{
    return $this->belongsTo(EffetAcademique::class);
}

}
