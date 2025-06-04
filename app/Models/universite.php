<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class universite extends Model
{
    public function abonnements()
{
    return $this->hasMany(Abonnement::class);
}

public function admins()
{
    return $this->hasMany(Admin::class);
}

}
