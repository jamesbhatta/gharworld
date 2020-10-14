<?php

namespace App\Http\Controllers;

use App\City;
use App\Facility;
use App\Feature;
use App\Http\Requests\PropertyRequest;
use App\Property;
use App\Service\PropertyService;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class PropertyController extends Controller
{
    private $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::latest()->paginate(21);
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
        $property = Property::create($request->validated());
        $property->facilities()->sync($request->facilities);

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
        $this->validateImage();
        $property['image'] = $this->propertyService->syncPropertyImage($property);
        $property->fill($request->validated());
        $property->save();
        $property->facilities()->sync($request->facilities);

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
        $this->propertyService->unlinkImage($property);
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property has been deleted.');
    }

    private function validateImage()
    {
        return  request()->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png,gif,svg,bmp',
        ]);
    }
    public function search(Request $request){
        if($request->by=="city_id"){
            $city=City::where('name',"$request->search")->first('id');
              $request['search']="$city->id";
        }
        if($request!=null){
            $properties=Property::where("$request->by",'LIKE',"%$request->search%")->paginate($request->per_page ?? 21);
            return view('property.index', compact('properties'));
        }
        
    }
}
