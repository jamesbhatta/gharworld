<?php

namespace App\Http\Controllers;

use App\LocalContact;
use App\Property;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $land=0;
        $house=0;
        $room=0;
        $propeties=Property::get();
        $localContact=LocalContact::count();
        foreach($propeties as $propety){
            if($propety->type=="land"){
                $land=$land+1;
            }
            if($propety->type=="house"){
                $house=$house+1;
            }
            if($propety->type=="room" && $propety->for="rent"){
                $room=$room+1;
            }
            
        }
        return view('dashboard',compact(['land','house','room','localContact']));
    }
}
