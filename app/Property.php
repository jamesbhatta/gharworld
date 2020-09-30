<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Const_;

class Property extends Model
{
    protected $guarded=[];
    public const AVAILABLE = 1;
    public const SOLD = 2;
    public const BOOKED = 3;
    public const HIDDEN = 4;

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
