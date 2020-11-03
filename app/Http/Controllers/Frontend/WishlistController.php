<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlists=WishList::with('property')->where('user_id',Auth::user()->id)->paginate(20);
        return view('user.wishlist',compact('wishlists'));
    }
}
