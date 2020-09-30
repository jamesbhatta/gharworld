<?php

namespace App\Http\Controllers;

use App\City;
use App\Facility;
use App\Feature;
use App\Http\Requests\PropertyRequest;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties=Property::latest()->paginate();
        return view('property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::get();
        $facilities = Facility::get();
        $features = Feature::get();

        return view('property.create', compact('cities', 'facilities', 'features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        $property = $request->validated();
        $baseDir = 'property/cover/' . date('Y') . '/' . date('M');
        $imgPath = Storage::putFile($baseDir, $request->file('image'));
        $property['image'] = $imgPath;
        $property['features'] = implode(',', $request->features);
        $property['facilities'] = implode(',', $request->facilities);
        Property::create($property);
        return redirect()->route('properties.index')->with('success', 'Property has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property has been deleted.');
    }
}
