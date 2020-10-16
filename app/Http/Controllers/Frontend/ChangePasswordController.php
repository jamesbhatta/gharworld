<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index(){
        return view('theme.change-password');
    }
    public function change(ChangePasswordRequest $request){
        
        if (Hash::check($request->current, Auth::user()->password)) {
                User::where('id', Auth::user()->id)->update(['password' => Hash::make($request->new)]);
            return redirect()->back()->with('success', "Password change successfull");
        } else {
            return redirect()->back()->with('error', "Incorrect your current password");
        }

    }
}
