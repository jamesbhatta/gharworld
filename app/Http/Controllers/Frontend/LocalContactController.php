<?php

namespace App\Http\Controllers\Frontend;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\LocalContactRequest as FrontendLocalContactRequest;
use App\Http\Requests\LocalContactRequest;
use App\LocalContact;
use App\Profession;
use Illuminate\Http\Request;

class LocalContactController extends Controller
{
    public function search(Request $request)
    {
        $localcontacts = LocalContact::with('profession')->active();

        if ($request->has('city_id')) {
            $localcontacts = $localcontacts->whereCityId($request->city_id);
        }

        if ($request->has('profession_id')) {
            $localcontacts = $localcontacts->whereProfessionId($request->profession_id);
        }


        // $localcontacts = LocalContact::where('active', '=', '1')->where('city_id', '=', $request->city_id)->where('profession_id', '=', $request->profession_id)->paginate(21);
        $localcontacts = $localcontacts->paginate(request()->per_page ?? 21);
        return view('theme.localcontact-search-result', compact('localcontacts'));
    }
    public function show(LocalContact $localcontact)
    {
        return view('theme.localcontact-profile', compact('localcontact'));
    }
}
