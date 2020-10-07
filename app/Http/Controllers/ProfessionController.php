<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessionRequest;
use App\Profession;
use App\Service\ProfessionService;

class ProfessionController extends Controller
{
    private $profesionService;

    public function __construct(ProfessionService $profesionService)
    {
        $this->profesionService = $profesionService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Profession $profession = null)
    {
        if (!$profession) {
            $profession = new Profession();
        }

        $professions = Profession::latest()->get();
        return view('profession.index', compact(['professions', 'profession']));
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
    public function store(ProfessionRequest $request)
    {
        $this->profesionService->create($request->validated());;
        return redirect()->route('professions.index')->with('success', 'Profession has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profession $profession)
    {
        return $this->index($profession);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessionRequest $request, Profession $profession)
    {
        $this->profesionService->update($profession, $request->validated());

        return redirect()->route('professions.index')->with('success', 'Profession has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profession $profession)
    {
        $profession->delete();

        return redirect()->route('professions.index')->with('success', 'Profession has been deleted');
    }
}
