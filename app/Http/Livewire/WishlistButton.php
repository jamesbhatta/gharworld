<?php

namespace App\Http\Livewire;

use App\Property;
use App\WishList;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistButton extends Component
{
    public $property;
    public $hasInWishlist = false;
    public $msg = '';
    public function mount(Property $property)
    {
        $this->property = $property;
    }

    public function toggleWishlist()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $wishlist = WishList::where(['user_id' => auth()->user()->id, 'property_id' => $this->property->id])->get();
        if (!count($wishlist)) {
            Wishlist::create([
                'user_id' => auth()->user()->id,
                'property_id' => $this->property->id
            ]);
            $this->msg = 'Add to Wishlist';
            $this->hasInWishlist = true;
        } else {
            WishList::where(['user_id' => auth()->user()->id, 'property_id' => $this->property->id])->delete();
            $this->msg = 'Remove to  Wishlist';
            $this->hasInWishlist = false;
        }
    }

    public function render()
    {
        if (Auth::check()) {
            $wishlist = WishList::where(['user_id' => auth()->user()->id, 'property_id' => $this->property->id])->get();
            if (!count($wishlist)) {
                $this->msg = 'Add to  Wishlist';
                $this->hasInWishlist = false;
            } else {
                $this->hasInWishlist = true;
                $this->msg = 'Remove from Wishlist';
            }
        } else {
            $this->hasInWishlist = false;
        }
        return view('livewire.wishlist-button');
    }
}
