<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $guarded=[];
    public function getFontAwesomeIconAttribute()
    {
        return '<i class="' . $this->icon . '"></i>';
    }
}
