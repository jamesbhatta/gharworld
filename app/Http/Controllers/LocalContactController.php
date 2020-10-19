<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\LocalContactRequest;
use App\LocalContact;
use App\Profession;
use App\Service\LocalContactService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function index(LocalContact $localContact = null)
    {
        $localContacts = LocalContact::latest()->paginate(20);
        $cities = City::get();
        $professions = Profession::get();
        return view('local-contact.index', compact('localContacts', 'cities', 'professions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('local-contact.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocalContactRequest $request)
    {
        $this->localContactService->create($request->validated());
        return redirect()->route('local-contacts.index');
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
        return view('local-contact.create-edit', compact('localContact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LocalContact  $localContact
     * @return \Illuminate\Http\Response
     */
    public function update(LocalContactRequest $request, LocalContact $localContact)
    {
        $this->localContactService->update($localContact, $request->validated());

        return redirect()->back()->with('success', 'Alright, the information got updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LocalContact  $localContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocalContact $localContact)
    {
        Storage::delete($localContact->image);
        $localContact->delete();
        return redirect()->back()->with('success', 'Local Contact Data deleted');
    }
    public function search(Request $request)
    {

        $localContacts = new LocalContact;

        if ($request->has('name')) {
            if ($request->name != null)
                $localContacts = $localContacts->where('name', 'LIKE', ["$request->name%"]);
        }
        if ($request->has('contact')) {
            if ($request->contact != null)
                $localContacts = $localContacts->whereContact($request->contact);
        }
        if ($request->has('address_line')) {
            if ($request->address_line != null)
                $localContacts = $localContacts->where('address_line', 'Like', ["$request->address_line%"]);
        }
        if ($request->has('city_id')) {
            if ($request->city_id != null)
                $localContacts = $localContacts->whereCityId($request->city_id);
        }
        if ($request->has('profession_id')) {
            if ($request->profession_id != null)
                $localContacts = $localContacts->whereProfessionId($request->profession_id);
        }
        if ($request->has('expiry')) {
            if ($request->expiry != null && $request->day != null) {
                $date = now();
                date_modify($date, "$request->day days");
                $localContacts = $localContacts->where('expiry', "$request->expiry", [date_format($date, "Y-m-d")]);
            }
        }
        if ($request->has('active')) {
            if ($request->active != null)
                $localContacts = $localContacts->whereActive($request->active);
        }
        $localContacts = $localContacts->paginate(request()->per_page ?? 21);

        $cities = City::get();
        $professions = Profession::get();
        return view('local-contact.index', compact('localContacts', 'cities', 'professions'));
    }
}
