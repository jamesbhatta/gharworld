<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasSlug;


    protected $guarded = [];

    public const AVAILABLE = 1;
    public const SOLD = 2;
    public const BOOKED = 3;
    public const HIDDEN = 4;


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(50)
            ->doNotGenerateSlugsOnUpdate();
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', self::AVAILABLE);
    }

    public function setFeaturesAttribute($value)
    {
        $this->attributes['features'] = implode(',', $value);
    }

    // public function setFacilitiesAttribute($value)
    // {
    //     $this->attributes['facilities'] = implode(',', $value);
    // }

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
    public function getFacilitiesIdArrayAttribute()
    {
        $facilitiesIdArray = [];
        foreach($this->facilities as $facility){
        array_push($facilitiesIdArray, $facility->id);
        }
        return $facilitiesIdArray;
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

    public function images()
    {
        return $this->hasMany('App\PropertyImage');
    }

    public function facilities()
    {
        return $this->belongsToMany('App\Facility');
    }
}
