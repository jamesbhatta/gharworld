@extends('theme.client')
@section('main-content')
    <!-- Hero Section end -->
    <section class="hero-section set-bg" data-setbg="{{ asset('assets/mondy/img/hero-bg.jpg') }}">
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
							<input type="radio" name="type" value="local-contact" id="agents">
							<label for="agents">Local Contacts</label>
						</div>
					</div>
					<div class="search-input si-v-2">
                        <input type="text" name="city_id" id="city_id" list="suggestions"
                        class="col-md-10  form-lg font-weight-bold @error('city_id') is-invalid @enderror" placeholder="Select Location">
                        @error('city_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <datalist id="suggestions">
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }} {{ $city->name }}" class="text-capitalize"></option>
                        @endforeach
                        </datalist>
                    </select>
						<button class="site-btn" type="submit">Search</button>
					</div>
				</form>

            </div>
        </div>
    </section>
    <!-- Hero Section end -->
@endsection
