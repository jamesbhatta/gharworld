<?php

namespace App\Http\Controllers\Frontend;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('theme.contact');
    }
    public function store(ContactRequest $request){
        Contact::create($request->validated());
        return redirect()->back()->with('success','message Sent');
    }
}
