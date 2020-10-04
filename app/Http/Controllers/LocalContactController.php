<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\LocalConatctRequest;
use App\LocalContact;
use App\Profession;
use App\Service\LocalContactService;
use Illuminate\Http\Request;

class LocalContactController extends Controller
{
    private $localContactService;

    public function __construct(LocalContactService $localContactService)
    {
        $this->localContactService = $localContactService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::orderBy('name')->get();
        $professions = Profession::orderBy('name')->get();
        return view('localcontact.create', compact('cities', 'professions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocalConatctRequest $request)
    {
        $this->localContactService->create($request->validated());
        return redirect()->route('localcontacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LocalContact  $localContact
     * @return \Illuminate\Http\Response
     */
    public function show(LocalContact $localContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LocalContact  $localContact
     * @return \Illuminate\Http\Response
     */
    public function edit(LocalContact $localContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LocalContact  $localContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LocalContact $localContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LocalContact  $localContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocalContact $localContact)
    {
        //
    }
}
