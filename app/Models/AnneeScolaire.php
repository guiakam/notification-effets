<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnneeScolaire extends Model
{
    public function formations()
{
    return $this->hasMany(Formation::class);
}

}
