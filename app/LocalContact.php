<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalContact extends Model
{
    protected $guarded=['id'];
    
    public function city()
    {
        return $this->belongsTo('App\City');
    }
    public function profession(){
        return $this->belongsTo('App\Profession');
    }
}
