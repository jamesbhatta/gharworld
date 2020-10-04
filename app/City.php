<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    public function property()
    {
        return $this->hasMany('App\Property');
    }
    public function localcontact(){
        return $this->hasMany('App\LocalContact');
    }
}
