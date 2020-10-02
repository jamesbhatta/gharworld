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
        $properties = Property::latest()->paginate();
        return view('property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Property $property)
    {

        $cities = City::get();
        $facilities = Facility::get();
        $features = Feature::get();

        if (!$property) {
            $property = new Property();
        }

        return view('property.create', compact('cities', 'facilities', 'features', 'property'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        // if ($request->has('image')) {
        //     $baseDir = 'property/cover/' . date('Y') . '/' . date('M');
        //     $imgPath = Storage::putFile($baseDir, $request->file('image'));
        //     $property['image'] = $imgPath;
        // }

        Property::create($request->validated());
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
        return $this->create($property);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, Property $property)
    {
        $property->update($request->validated());

        return redirect()->back()->with('success', 'All Done, property have been successfully updated');
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
