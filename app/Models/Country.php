<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function manycitys()
    {
        return $this->hasManyThrough(City::class, State::class);
    }

    public function states()
    {
        return $this->hasMany('App\Models\State');
    }
}
