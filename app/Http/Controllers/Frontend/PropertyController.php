<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\LocalContact;
use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    
    public function search(LocationRequest $request)
    {
        $types=$request->type;
       if($request->type=="real-estate"){
        $properties=Property::where('type','!=','room')->where('city_id','=',$request->city_id)->paginate(21);

        return view('theme.search-result',compact('properties','types'));
       }
    elseif($request->type=="room"){
        
        $properties=Property::where('type','=','room')->where('city_id','=',$request->city_id)->paginate(21);
        return view('theme.search-result',compact('properties','types'));
    }else{
        $localcontacts=LocalContact::where('active','=','1')->where('city_id','=',$request->city_id)->where('profession_id','=',$request->profession_id)->paginate(21);
        return view('theme.localcontact-search-result',compact('localcontacts','types'));
    }
    
}
}