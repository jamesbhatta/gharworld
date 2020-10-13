<?php

namespace App\View\Components;

use App\City;
use App\Profession;
use Illuminate\View\Component;

class LocalContactFilter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $cities = City::orderBy('name')->get(['name', 'id']);
        $professions = Profession::orderBy('name')->get(['name', 'id']);

        return view('components.local-contact-filter', compact(['cities', 'professions']));
    }
}
