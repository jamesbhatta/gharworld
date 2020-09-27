<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $guarded = [];

    public function getFontAwesomeIconAttribute()
    {
        return '<i class="' . $this->icon . '"></i>';
    }
}
