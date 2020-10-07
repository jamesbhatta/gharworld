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
        $types = $request->type;
        if ($request->type == "real-estate") {
            $properties = Property::where('type', '!=', 'room')->where('city_id', '=', $request->city_id)->paginate(21);

            return view('theme.search-result', compact('properties', 'types'));
        }
        if ($request->type == "room") {

            $properties = Property::where('type', '=', 'room')->where('city_id', '=', $request->city_id)->paginate(21);
            return view('theme.search-result', compact('properties', 'types'));
        }
    }
}
