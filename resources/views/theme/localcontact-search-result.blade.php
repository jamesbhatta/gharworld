@extends('theme.client')
@section('main-content')
<div class="my-5"></div>
<div class="container-fluid px-5">
    <!-- Search Result Section end -->
    <section class="search-result-section ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 my-5 py-5">
                    <x-local-contact-filter />
                </div>
                <div class="col-md-10 p-0">
                    <div class="search-results">
                        <div class="row py-5">

                            @forelse ($localcontacts as $localcontact)

                            <div class="col-md-4">
                                <a href="{{route('frontend.localcontact.show',$localcontact)}}">
                                    <div class="card localcontact-item text-center hover">
                                        <div class="pi-image">
                                            <img src="{{ $localcontact->image != null ? asset('storage/' . $localcontact->image) : asset('assets/img/real-estate.jpg') }}" alt="{{ $localcontact->name }}" class="image img-fluid" style="width:100%; height:250px;">
                                        </div>
                                        <div class="px-3 py-2">
                                            <div class="font-weight-bold">{{ $localcontact->profession->name }}
                                            </div>
                                            <div class="text-capitalize font-weight-bold">{{ $localcontact->name }}
                                            </div>
                                            <div class="fa fa-map-marker">
                                                {{ $localcontact->city->name . ', ' . $localcontact->address_line }}</div>
                                            <div class=" text-warning">
                                                @for ($i = 0; $i < 5; $i++) <span class="fa fa-star checked"></span>
                                                    @endfor
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            @empty
                            <div class="col-md-12 text-danger text-center justify-content-center">* No data available in databale </div>

                            @endforelse
                        </div>
                        {{ $localcontacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Search Result Section end -->
</div>

@include('theme.partials.pagefooter')
@endsection