<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(){
        $properties=Property::paginate(20);
        return view('theme.search-result',compact('properties'));
    }
    public function searchResult(){
        
       
    }
}
