<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\LocalContact;

use Illuminate\Http\Request;

class LocalContactController extends Controller
{
    public function search(Request $request)
    {
        $localContacts = localContact::with(['profession','city'])->active();

        if ($request->has('city_id')) {
            if ($request->city_id == null) {
            }else{
                $localContacts = $localContacts->whereCityId($request->city_id);
            }
        }

        if ($request->has('profession_id')) {
            $localContacts = $localContacts->whereProfessionId($request->profession_id);
        }
        if ($request->has('overall_rating')) {
           
            $localContacts = $localContacts->where('overall_rating','>=',$request->overall_rating);
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
