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
        $localcontacts = LocalContact::where('active', '=', '1')->where('city_id', '=', $request->city_id)->where('profession_id', '=', $request->profession_id)->paginate(21);
        return view('theme.localcontact-search-result', compact('localcontacts'));
    }
    public function show(LocalContact $localcontact)
    {
        return view('theme.localcontact-profile', compact('localcontact'));
    }
}
