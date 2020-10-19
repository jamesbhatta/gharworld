<?php

namespace App\View\Components;

use App\Profile;
use Illuminate\View\Component;

class CompanyContactComponent extends Component
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
        $profile=Profile::first();
        return view('components.company-contact-component',compact('profile'));
    }
}
