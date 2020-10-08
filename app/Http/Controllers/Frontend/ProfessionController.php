<?php

namespace App\Http\Controllers\Frontend;

use App\City;
use App\Http\Controllers\Controller;
use App\LocalContact;
use App\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    public function index()
    {
        $professions = Profession::orderBy('name')->paginate(21);
        return view('theme.profession', compact('professions'));
    }
    public function show(Profession $profession)
    {
        $city_id=0;
        $cities=City::orderBy('name')->get();
        $localcontacts = LocalContact::where('active', '=', '1')->where('profession_id', '=', $profession->id)->paginate(21);
        return view('theme.localcontact-search-result',compact('localcontacts','city_id','cities'));
    }
}
