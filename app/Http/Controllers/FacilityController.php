<?php

namespace App\Http\Controllers;

use App\Facility;
use App\Http\Requests\FacilityRequest;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Facility $facility=null)
    {
        if (!$facility) {
            $facility = new Facility();
        }

        $facilities = Facility::latest()->get();

        return view('facility.index', compact('facilities', 'facility'));

        return $this->showCityForm($facility);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacilityRequest $request)
    {
        Facility::create($request->validated());

        return redirect()->route('facility.index')->with('success', 'Facility has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        return $this->index($facility);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(FacilityRequest $request, Facility $facility)
    {
        $facility->update($request->validated());

        return redirect()->route('facility.index')->with('success', 'Facility has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        $facility->delete();

        return redirect()->route('facility.index')->with('success', 'Facility has been deleted.');
    }
}
