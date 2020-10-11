<?php

namespace App\Http\Controllers\Frontend;

use App\City;
use App\Facility;
use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\LocalContact;
use App\Property;
use App\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{

    public function search(LocationRequest $request)
    {
        $types = $request->type;
        $city_id = $request->city_id;
        $cities = City::orderBy('name')->get();
        if ($request->type == "real-estate") {
            $properties = Property::where('type', '!=', 'room')->where('city_id', '=', $request->city_id)->paginate(21);

            return view('theme.search-result', compact('properties', 'types', 'city_id', 'cities'));
        }
        if ($request->type == "room") {

            $properties = Property::where('type', '=', 'room')->where('city_id', '=', $request->city_id)->paginate(21);
            return view('theme.search-result', compact('properties', 'types', 'city_id', 'cities'));
        }
        if ($request->type == "local-contact") {
        $city_id=$request->city_id;
        $cities=City::orderBy('name')->get();
        $localcontacts=LocalContact::where('active','=','1')->where('city_id','=',$request->city_id)->where('profession_id','=',$request->profession_id)->paginate(21);
        return view('theme.localcontact-search-result',compact('localcontacts','city_id','cities'));
        }
    }
    public function show(Property $property)
    {
      $propertyImages=PropertyImage::where('property_id','=',"$property->id")->get();
     $facility_properties=DB::table('facility_property')->where('property_id','=',$property->id)->get();
       $facilities=Facility::get();
        return view('theme.property-profile', compact('property','propertyImages','facilities','facility_properties'));
    }
    public function realEstate(){
        $types = "real-estate";
        $city_id = 0;
        $cities = City::orderBy('name')->get();
            $properties = Property::where('type', '!=', 'room')->paginate(21);

            return view('theme.search-result', compact('properties', 'types', 'city_id', 'cities'));
    }
    public function roomRent(){
        $types = "room";
        $city_id = 0;
        $cities = City::orderBy('name')->get();
            $properties = Property::where('type', '=', 'room')->paginate(21);

            return view('theme.search-result', compact('properties', 'types', 'city_id', 'cities'));
    }
}
