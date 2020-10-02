<?php

namespace App\Observers;

use App\Property;
use App\Service\PropertyService;

class PropertyObserver
{
    private $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function creating(Property $property)
    {
        $property['image'] = $this->propertyService->syncPropertyImage($property);
    }

    /**
     * Handle the property "created" event.
     *
     * @param  \App\Property  $property
     * @return void
     */
    public function created(Property $property)
    {
        //
    }

    public function updating(Property $property)
    {
        $property['image'] = $this->propertyService->syncPropertyImage($property);
    }

    /**
     * Handle the property "updated" event.
     *
     * @param  \App\Property  $property
     * @return void
     */
    public function updated(Property $property)
    {
        //
    }

    /**
     * Handle the property "deleted" event.
     *
     * @param  \App\Property  $property
     * @return void
     */
    public function deleted(Property $property)
    {
        //
    }

    /**
     * Handle the property "restored" event.
     *
     * @param  \App\Property  $property
     * @return void
     */
    public function restored(Property $property)
    {
        //
    }

    /**
     * Handle the property "force deleted" event.
     *
     * @param  \App\Property  $property
     * @return void
     */
    public function forceDeleted(Property $property)
    {
        //
    }
}
