@extends('theme.client')
@section('main-content')
    <!-- Hero Section end -->
    <section class="hero-section set-bg" data-setbg="{{ asset('assets/mondy/img/hero-bg.jpg') }}">
        <div class="container">
            <div class="hero-warp">

                <form action="{{ route('frontend.location.search') }}" method="POST" class="main-search-form">
				  @csrf
					<div class="search-type">
                        <div class="st-item">
                            <input type="radio" name="type" value="real-estate" id="real-estate" checked>
                            <label for="real-estate">Real Estate</label>
                        </div>
                        <div class="st-item">
                            <input type="radio" name="type" value="room" id="room-rent">
                            <label for="room-rent">Room Rent</label>
                        </div>
                        <div class="st-item">
                            <input type="radio" name="type" value="loca-contact" id="local-contact">
                            <label for="local-contact">Local Contacts</label>
                        </div>
                    </div>
                    <div class="search-input si-v-2">
                        <select type="text" name="city_id" class="col-md-10  form-lg font-weight-bold" required>
                            <option value="">Select Location</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" class="text-capitalize">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        <button class="site-btn" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Hero Section end -->
@endsection
