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
        $cities = City::get();
      
        $property = new Property();
       
        $properties = Property::latest()->paginate(21);
        return view('property.index', compact('properties','cities','property'));
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
        $properties=Property::AVAILABLE();
        if ($request->has('name')) {
            if ($request->name != null)
                $properties = $properties->where('name', 'LIKE', ["$request->name%"]);
        }
        if ($request->has('title')) {
            if ($request->title != null)
                $properties = $properties->where('title', 'LIKE', ["$request->title%"]);
        }
        if ($request->has('contact')) {
            if ($request->contact != null)
                $properties = $properties->whereContact($request->contact);
        }
        if ($request->has('address_line')) {
            if ($request->address_line != null)
                $properties = $properties->where('address_line', 'Like', ["$request->address_line%"]);
        }
        if ($request->has('city_id')) {
            if ($request->city_id != null)
                $properties = $properties->whereCityId($request->city_id);
        }
        if ($request->has('type')) {
            if ($request->type != null)
                $properties = $properties->whereType($request->type);
        }
        if ($request->has('for')) {
            if ($request->for != null)
                $properties = $properties->whereFor($request->for);
        }
        if ($request->has('expiry')) {
            if ($request->expiry != null && $request->day != null) {
                $date = now();
                date_modify($date, "$request->day days");
                $properties = $properties->where('expiry', "$request->expiry", [date_format($date, "Y-m-d")]);
            }
        }
        if ($request->has('status')) {
            if ($request->status != null)
                $properties = $properties->whereStatus($request->status);
        }
        $properties=$properties->paginate(request()->per_page ?? 21);
        $cities = City::get();
        $property = new Property();
        return view('property.index', compact('properties','cities','property'));
   
            // $properties=Property::where("$request->by",'LIKE',"%$request->search%")->paginate($request->per_page ?? 21);
        
    }
}
