<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    public function universite()
{
    return $this->belongsTo(Universite::class);
}

}
