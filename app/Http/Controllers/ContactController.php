<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function index(){
      $contacts=Contact::latest()->paginate(20);
      return view('contact.index',compact('contacts'));
  }
    public function store(Request $request){
        Contact::create($request->all());
        return redirect()->back()->with('success','message Sent');
    }
    public function destroy(Contact $contact){
        $contact->delete();
        return redirect()->back()->with('success','contact deleted');
    }
}
