<?php

namespace App\View\Components;

use App\Property;
use Illuminate\View\Component;

class PropertyDropzone extends Component
{
    public $property;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.property-dropzone');
    }
}
