@extends('theme.client')
@section('main-content')
<div class="my-2"></div>
<div class="container-fluid">
    <!-- Search Result Section end -->
    <section class="search-result-section spad ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 ">
                    <x-local-contact-filter />
                </div>
                <div class="col-md-10">
                    <div class="search-results">
                        <div class="row">

                            @forelse ($localContacts as $localContact)

                            <div class="col-md-3">
                                <a href="{{route('frontend.localcontact.show',$localContact)}}">
                                    <div class="card localcontact-item text-center hover">
                                        <div class="pi-image">
                                            <img src="{{ $localContact->image != null ? asset('storage/' . $localContact->image) : asset('assets/img/real-estate.jpg') }}" alt="{{ $localContact->name }}" class="image img-fluid" style="width:100%; height:160px;">
                                        </div>
                                        <div class="px-3 text-dark">
                                            <div class="font-weight-bold">{{ $localContact->profession->name }}
                                            </div>
                                            <div class="text-capitalize font-weight-bold">{{ $localContact->name }}
                                            </div>
                                            <div class="fa fa-map-marker">
                                                {{ $localContact->city->name . ', ' . $localContact->address_line }}</div>
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
                        {{ $localContacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Search Result Section end -->
</div>

@include('theme.partials.pagefooter')
@endsection