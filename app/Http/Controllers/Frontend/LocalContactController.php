<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\LocalContact;

use Illuminate\Http\Request;

class LocalContactController extends Controller
{
    public function search(Request $request)
    {
        $localContacts = localContact::with('profession')->active();

        if ($request->has('city_id')) {
            $localContacts = $localContacts->whereCityId($request->city_id);
        }

        if ($request->has('profession_id')) {
            $localContacts = $localContacts->whereProfessionId($request->profession_id);
        }


        // $localContacts = localContact::where('active', '=', '1')->where('city_id', '=', $request->city_id)->where('profession_id', '=', $request->profession_id)->paginate(21);
        $localContacts = $localContacts->paginate(request()->per_page ?? 21);
        return view('theme.localcontact-search-result', compact('localContacts'));
    }
    public function show(localContact $localContact)
    {
        return view('theme.localcontact-profile', compact('localContact'));
    }
}
