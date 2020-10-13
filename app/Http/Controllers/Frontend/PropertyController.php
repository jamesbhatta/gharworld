<?php

namespace App\Http\Controllers\Frontend;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\LocalContact;
use App\Property;
use Illuminate\Support\Facades\App;

class PropertyController extends Controller
{
    private $localContactController;
    public function __construct(LocalContactController $localContactController)
    {
        $this->localContactController = $localContactController;
    }

    public function search(LocationRequest $request)
    {
        if ($request->type == "local-contact") {
            return $this->localContactController->search($request);
        }
        $properties = Property::with('city')->available();
        if ($request->has('type')) {
            if ($request->type == 'real-estate') {
                $properties = $properties->whereIn('type', ['land', 'house']);
            }
            if ($request->type == 'room') {
                $properties = $properties->whereIn('type', ['room']);
            }
        }

        if ($request->has('for')) {
            $properties = $properties->whereFor($request->for);
        }

        if ($request->has('city_id')) {
            $properties = $properties->whereCityId($request->city_id);
        }

        // price

        if ($request->has('location')) {
            // $properties = $properties->where('location', 'like',  "%$request->for%");
        }


        $properties = $properties->paginate($request->per_page ?? 21);

        $types = $request->type;
        $city_id = $request->city_id;
        $cities = City::orderBy('name')->get();
        return view('theme.search-result', compact('properties', 'types', 'city_id', 'cities'));
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
