@extends('theme.client')
@section('main-content')


<style>
    /* body {
        background-image: url('{{ asset('assets/mondy/img/hero-bg.jpg')}}');
    } */

    .home-hover:hover {

        box-shadow: 0px 0px 3px 1px rgba(0, 0, 0, 0.75);
    }

    .search-text {
        font-size: 15px;
    }

    @media only screen and (max-width: 600px) {
        .search-text {
            font-size: 13px;
        }
    }
</style>
<!-- Hero Section end -->
<section class="hero-section set-bg" data-setbg="{{ asset('assets/mondy/img/hero-bg.jpg') }}" style="height: 100%">
{{-- <section class="spad"> --}}
    <div class="container-fluid d-flex flex-column-reverse  flex-lg-column mt-lg-5 pt-lg-5">
        <div class="row justify-content-lg-center  pb-lg-4 mt-lg-5 pt-lg-5 text-center text-white txt">
            <div class="col-md-3">
                <a href="{{route('frontend.property.search',['type' => 'real-estate', 'for' => 'all'])}}">
                    <h5 class="py-4 h5-responsive my-2 mx-3 px-3 home-hover rounded-0" style="background:#10304c; opacity:0.9;">
                        <span class="mr-2"><i class="fa fa-building"></i></span> Real
                        Estate
                    </h5>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{route('frontend.property.search',['type' => 'room', 'for' => 'rent'])}}">
                    <h5 class="h5-responsive my-2 mx-3 py-4 px-3 home-hover" style="background:#10304c; opacity:0.9;">
                        <span class="mr-2"><i class="fa fa-home"></i></span> Room Rent
                    </h5>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('frontend.professions') }}">
                    <h5 class="my-2 mx-3 h5-responsive py-4 px-3 home-hover" style="background:#10304c; opacity:0.9;">
                        <span class="mr-2"><i class="fa fa-users"></i></span> Local Contact
                    </h5>
                </a>
            </div>
        </div>
        {{-- <div class="hero-warp col-md-5 pb-3 px-3 mt-lg-5 " style="margin: 0 auto; background: rgba(0, 0, 0, 0.7);"">
            <form class="main-search-form" action="{{ route('frontend.property.search') }}" method="get">
                <div class="search-type search-text">
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

                    .btn {
                        background-color: #4CAF50;
                        border: none;
                        color: white;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 11px;
                        cursor: pointer;
                    }
                </style>

                <div class="si-v-2 d-flex">
                    <select type="text" name="city_id" id="city_id"
                        class="form-control js-example-theme-single  @error('city_id') is-invalid @enderror">

                        <option value="">Select Location</option>
                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}" class="text-capitalize">{{ $city->name }}</option>
                        @endforeach

                        @error('city_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </select>
                    <div id="select-professions" style="display: none;">
                        <select name="profession_id" class="js-example-theme-single">
                            <option value="">Select Profession</option>
                            @foreach ($professions as $profession)
                            <option value="{{ $profession->id }}" class="text-capitalize">
                                {{ $profession->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="ml-auto">
                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div> --}}
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
<script>
    $(".js-example-theme-single").select2({
  theme: "classic"
});
</script>
@endpush