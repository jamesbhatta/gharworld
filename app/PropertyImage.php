<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    protected $guarded = ['id'];

    public function getUrl()
    {
        return asset('storage/' . $this->link);
    }

    public function property()
    {
        return $this->belongsTo('App\Property');
    }
}
