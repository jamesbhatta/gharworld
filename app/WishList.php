<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $guarded=['id'];
    public function property(){
       return $this->belongsTo('App\WishList');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
