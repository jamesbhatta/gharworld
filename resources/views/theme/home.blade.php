@extends('theme.client')
@section('main-content')
    <!-- Hero Section end -->
    <section class="hero-section set-bg" data-setbg="{{ asset('assets/mondy/img/hero-bg.jpg') }}">
        <div class="container">
            <div class="hero-warp">
                <ul class="nav nav-tabs  text-white" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#real-estate" role="tab"
                            aria-controls="home" aria-selected="true">
                            Real Estate
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#room" role="tab"
                            aria-controls="profile" aria-selected="false">Room Rent</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                            aria-controls="contact" aria-selected="false">Local Contact</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="real-estate" role="tabpanel" aria-labelledby="home-tab">
                        <form action="{{ route('frontend.property.search') }}" method="get" class="main-search-form">

                            <input type="text" name="type" value="real-estate" id="real-estate" hidden>
                            <div class="search-input si-v-2">
                                <select type="text" name="city_id" id="city_id"
                                    class="col-md-10  form-lg font-weight-bold @error('city_id') is-invalid @enderror">
                                    @error('city_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <option value="">Select Location</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" class="text-capitalize">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <button class="site-btn" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="room" role="tabpanel" aria-labelledby="profile-tab">Food truck fixie
                        <form action="{{ route('frontend.property.search') }}" method="get" class="main-search-form">

                            <input type="text" name="type" value="room" hidden>
                            <div class="search-input si-v-2">
                                <select type="text" name="city_id" id="city_id"
                                    class="col-md-10  form-lg font-weight-bold @error('city_id') is-invalid @enderror">
                                    @error('city_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <option value="">Select Location</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" class="text-capitalize">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <button class="site-btn" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Etsy mixtape
                        <form action="{{ route('frontend.local-contacts.search') }}" method="get" class="main-search-form">
                            <input type="text" name="type" value="local-contact" hidden>
                            <div class="search-input si-v-2">
                                <select type="text" name="city_id" id="city_id"
                                    class="col-md-5 form-lg font-weight-bold @error('city_id') is-invalid @enderror">
                                    @error('city_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <option value="">Select Location</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" class="text-capitalize">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                             
                                <select type="text" name="profession_id" id="professon_id"
                                    class="ml-3 col-md-5  form-lg font-weight-bold @error('profession_id') is-invalid @enderror" required>
                                    @error('profession_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <option value="">Select Profession</option>
                                    @foreach ($professions as $profession)
                                        <option value="{{ $profession->id }}" class="text-capitalize">{{ $profession->name }}</option>
                                    @endforeach
                                </select>
                                <button class="site-btn" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section end -->
@endsection
