<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class LocalContact extends Model
{
    use HasSlug;
    protected $guarded = ['id'];

    protected $casts = [
        'active' => 'boolean'
    ];

     /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
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
