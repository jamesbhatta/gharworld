@extends('theme.client')
@section('main-content')


<style>
    .home-hover:hover {

        box-shadow: 0px 0px 3px 1px rgba(0,0,0,0.75);
    }
</style>
<!-- Hero Section end -->
{{-- <section class="hero-section set-bg" data-setbg="{{ asset('assets/mondy/img/hero-bg.jpg') }}"> --}}
<section class="set-bg bg-light spad">
    <div class=" row justify-content-lg-center py-md-5 text-center text-white">
        <div class="col-md-3">
            <a href="{{route('frontend.property.search',['type' => 'real-estate', 'for' => 'all'])}}">
                <h3 class="py-4 my-3 mx-3 px-3 home-hover rounded-0" style="background:#10304c;">
                    <span class="mr-2"><i class="fa fa-building"></i></span> Real
                    Estate
                </h3>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{route('frontend.property.search',['type' => 'room', 'for' => 'rent'])}}">
                <h3 class=" my-3 mx-3 py-4 px-3 home-hover" style="background:#10304c;">
                    <span class="mr-2"><i class="fa fa-home"></i></span> Room Rent
                </h3>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('frontend.professions') }}">
                <h3 class="my-3 mx-3 py-4 px-3 home-hover" style="background:#10304c;">
                    <span class="mr-2"><i class="fa fa-user"></i></span> Local Contact
                </h3>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="hero-warp col-md-7" style="margin: 0 auto;">
            <form class="main-search-form" action="{{ route('frontend.property.search') }}" method="get">
                <div class="search-type">
                    <div class="st-item">
                        <input type="radio" name="type" value="real-estate" id="real-estate" checked>
                        <label for="real-estate" class="c">Real Estate</label>
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

                <div class=" si-v-2">
                    <div class="row pl-3">
                        <select type="text" name="city_id" id="city_id"
                            class="col-md-7 form-group form-control font-weight-bold @error('city_id') is-invalid @enderror">
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

                        <select id="select-professions" name="profession_id" class="col-md-3 form-group form-control"
                            style="display: none;">
                            <option value="">Select Profession</option>
                            @foreach ($professions as $profession)
                            <option value="{{ $profession->id }}" class="text-capitalize">{{ $profession->name }}
                            </option>
                            @endforeach
                        </select>
                        <div class="col-md-2 form-group">
                            <button class=" form-control border btn btn-outline-light" type="submit">Search</button>
                            <div class="row">
                            </div>
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