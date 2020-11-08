<?php

namespace App\Http\Controllers\Frontend;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Property;
use Symfony\Component\HttpFoundation\Request;

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
            return redirect()->action('Frontend\LocalContactController@search', ['city_id'=>$request->city_id, 'profession_id' => $request->profession_id]);
            //return $this->localContactController->search($request);
        }
        $properties = Property::with('city')->available();
        if ($request->has('type')) {
            if ($request->type == 'real-estate') {
                $properties = $properties->whereIn('type', ['land', 'house']);
            }
             else {
                $properties = $properties->whereType($request->type);
            }
        }

        if ($request->has('for')) {
            if ($request->for == 'all') {
                $properties = $properties->whereIn('for', ['sale', 'rent']);
            } else {
                $properties = $properties->whereFor($request->for);
            }
        }
        if ($request->has('city_id')) {
            if ($request->city_id == null) {
            } else {
                $properties = $properties->whereCityId($request->city_id);
            }
        }
        if ($request->has('overall_rating')) {
           
            $properties = $properties->where('overall_rating','>=',$request->overall_rating);
        }

        // price

        if ($request->has('location')) {
            // $properties = $properties->where('location', 'like',  "%$request->for%");
        }


        $properties = $properties->paginate($request->per_page ?? 21);

        $cities = City::orderBy('name')->get();
        return view('theme.search-result', compact('properties', 'cities'));
    }

    public function show(Property $property)
    {
        $properties = Property::with('city')->where('type', $property->type)->where('city_id', $property->city_id)->paginate(4);
        $property->load(['city', 'facilities', 'images']);
        return view('theme.property-profile', compact('property', 'properties'));
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
