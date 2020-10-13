@extends('theme.client')
@section('main-content')


    <style>
        .home-hover:hover {
            background: #ff000a;
            box-shadow: -2px 5px 16px 8px rgba(0,0,0,0.75);
        }

    </style>
    <!-- Hero Section end -->
    <section class="hero-section set-bg" data-setbg="{{ asset('assets/mondy/img/hero-bg.jpg') }}">
        <div class=" row justify-content-lg-center py-3 text-center">
            <a href="{{url('properties/search?type=real-estate&for=all')}}">
                <h2 class="hero-warp py-4 my-5 mx-3 px-5 home-hover"><span class="text-white fa fa-building"> Real
                        Estate</span></h2>
            </a>
            <a href="{{ url('properties/search?type=room&for=rent') }}">
                <h2 class="hero-warp my-5 mx-3 py-4 px-5 home-hover"><span class="fa fa-home text-white">Room Rent</span>
                </h2>
            </a>
            <a href="{{ route('frontend.professions') }}">
                <h2 class="hero-warp my-5 mx-3 py-4 px-5 home-hover"><span class="fa fa-user text-white"> Local
                        Contact</span></h2>

            </a>
        </div>
        <div class="container">
            <div class="hero-warp">
                <form class="main-search-form" action="{{ route('frontend.property.search') }}" method="get">
                    <div class="search-type">
                        <div class="st-item">
                            <input type="radio" name="type" value="real-estate" id="real-estate" checked>
                            <label for="real-estate">Real Estate</label>
                        </div>
                        <div class="st-item">
                            <input type="radio" name="type" value="room" id="room">
                            <label for="room">Room Rent</label>
                        </div>

                        <div class="st-item">
                            <input type="radio" name="type" value="local-contact" id="input-local-contacts">
                            <label for="input-local-contacts">Local Contacts</label>
                        </div>
                    </div>
                    <style>
                        .search-input input {
                            max-width: 400px;
                        }

                        .search-input select {
                            height: 71px;
                            padding-left: 15px;
                            padding-right: 15px;
                            color: #3a3a3a;
                            font-style: italic;
                            border: none;
                            border-left: 1px solid #ccc;
                        }

                    </style>
                    <div class="search-input si-v-2">
                        <select type="text" name="city_id" id="city_id"
                            class="col-md-8  form-lg font-weight-bold @error('city_id') is-invalid @enderror">
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
                        <select id="select-professions" name="profession_id" style="display: none;">
                            <option value="">Select Profession</option>
                            @foreach ($professions as $profession)
                                <option value="{{ $profession->id }}" class="text-capitalize">{{ $profession->name }}
                                </option>
                            @endforeach
                        </select>
                        <button class="site-btn" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Hero Section end -->
    @include('theme.partials.pagefooter')
@endsection
@push('scripts')
    <script>
        $(".main-search-form  input[name='type']").change(function() {
            if ($(".main-search-form input[name='type']:checked").val() == 'local-contact') {
                $('#select-professions').show();
            } else {
                $('#select-professions').hide();
            }
        });

    </script>
@endpush
