<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = [];
    
    public const AVAILABLE = 1;
    public const SOLD = 2;
    public const BOOKED = 3;
    public const HIDDEN = 4;
    
    /**
     * Get features as array
     *
     * @return void
     */
    public function getFeaturesArray()
    {
        return explode(',', $this->features);
    }
    
    /**
     * Get facilities as array
     *
     * @return void
     */
    public function getFacilitiesArray()
    {
        return explode(',', $this->facilities);
    }
    
    /**
     * Setup relationship with city
     *
     * @return relationship
     */
    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
