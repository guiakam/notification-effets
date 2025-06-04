<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    public function etudiant()
{
    return $this->belongsTo(Etudiant::class);
}

}
