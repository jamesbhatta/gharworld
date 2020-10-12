<?php

namespace App\Http\Controllers\Frontend;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\LocalContact;
use App\Property;
use Illuminate\Pipeline\Pipeline;

class PropertyController extends Controller
{

    public function search(LocationRequest $request)
    {
        $properties = Property::active()->latest();
        if($request->has('type')){
            $properties = $properties->whereType($request->type);
        }
        $properties->paginate();

        $types = $request->type;
        $city_id = $request->city_id;
        $cities = City::orderBy('name')->get();
        if ($request->type == "real-estate") {
            $properties = Property::where('status', '=', '1')->where('type', '!=', 'room')->where('city_id', '=', $request->city_id)->paginate(21);
            return view('theme.search-result', compact('properties', 'types', 'city_id', 'cities'));
        }
        if ($request->type == "room") {

            $properties = Property::where('status', '=', '1')->where('for', '=', 'rent')->where('type', '=', 'room')->where('city_id', '=', $request->city_id)->paginate(21);
            return view('theme.search-result', compact('properties', 'types', 'city_id', 'cities'));
        }
        if ($request->type == "local-contact") {
            $city_id = $request->city_id;
            $cities = City::orderBy('name')->get();
            $localcontacts = LocalContact::where('active', '=', '1')->where('city_id', '=', $request->city_id)->where('profession_id', '=', $request->profession_id)->paginate(21);
            return view('theme.localcontact-search-result', compact('localcontacts', 'city_id', 'cities'));
        }
    }

    public function show(Property $property)
    {
        $property->load(['city', 'facilities', 'images']);
        return view('theme.property-profile', compact('property'));
    }

    public function realEstate()
    {
        $types = "real-estate";
        $city_id = 0;
        $cities = City::orderBy('name')->get();
        $properties = Property::where('status', '=', '1')->where('type', '!=', 'room')->paginate(21);

        return view('theme.search-result', compact('properties', 'types', 'city_id', 'cities'));
    }
    public function roomRent()
    {
        $types = "room";
        $city_id = 0;
        $cities = City::orderBy('name')->get();
        $properties = Property::where('status', '=', '1')->where('for', '=', 'rent')->where('type', '=', 'room')->paginate(21);

        return view('theme.search-result', compact('properties', 'types', 'city_id', 'cities'));
    }
}
