<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($page)
    {
        return view('theme.' . $page);
    }
    public function page(){
        return view('theme.page.privacy-policy');
    }
 
}
