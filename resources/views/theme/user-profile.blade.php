@extends('theme.client')
<div class="container spad my-4">
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('user.profile') }}" class="text-dark ">
                <div class="side-nav {{ (request()->is('profile*')) ? 'side-nav-active' : '' }} mb-1 p-2">
                    About
                </div>
            </a>
            <a href="{{route('frontend.wishlist-index')}}" class="text-dark">
                <div class="side-nav p-2 {{ (request()->is('wishlist*')) ? 'side-nav-active' : '' }}">
                    Wishlists
                </div>
            </a>
        </div>
        <div class="col-md-10">
            @yield('user-content')
        </div>
    </div>
</div>
@include('theme.partials.pagefooter')