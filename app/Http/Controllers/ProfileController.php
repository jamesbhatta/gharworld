<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::first();
        return view('profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Profile $profile)
    {
        return view('profile.create-edit', compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {
        if (!Profile::count()) {
            $data = $request->validated();

            if ($request->logo != null) {
                $baseDir = 'uploads/logo/' . date('Y') . '/' . date('M');
                $imgPath = Storage::putFile($baseDir, $request->file('logo'));
                $data['logo'] = $imgPath;
            }
            Profile::create($data);
            return redirect()->route('profile.index')->with('success', 'Company Profile Created');
        }
        return redirect()->route('profile.index')->with('error', 'Company Profile already Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profile.create-edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, Profile $profile)
    {

        $data = $request->validated();
        if ($request->logo != null) {
            Storage::delete($profile->logo);
            $baseDir = 'uploads/logo/' . date('Y') . '/' . date('M');
            $imgPath = Storage::putFile($baseDir, $request->file('logo'));
            $data['logo'] = $imgPath;
        }
        $profile->update($data);
        return redirect()->route('profile.index')->with('success', 'Company Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
    }
}
