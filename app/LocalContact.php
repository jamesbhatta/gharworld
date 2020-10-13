<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalContact extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function scopeActive($query, $status = true)
    {
        return $query->where('active', $status);
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
    public function profession()
    {
        return $this->belongsTo('App\Profession');
    }
}
