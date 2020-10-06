@extends('theme.client')
@section('main-content')
    <div class="my-5"></div>
    <div class="container-fluid px-5">
        <!-- Search Result Section end -->
        <section class="search-result-section ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 p-0">
                        <div class="search-results">
                            <div class="row py-5">
                                @forelse ($localcontacts as $localcontact)
                                    <div class="col-md-3">
                                        <div class="card localcontact-item text-center">
                                            <div class="pi-image">
                                                <img src="{{ $localcontact->image != null ? asset('storage/' . $localcontact->image) : asset('assets/img/real-estate.jpg') }}"
                                                    alt="{{ $localcontact->name }}" class="image img-fluid"
                                                    style="height: 280px;">
                                            </div>
                                            <div class="px-3 py-2">
                                                <h3>{{ $localcontact->profession->name}}
                                                </h3>
                                                <h5 class="text-capitalize">{{ $localcontact->name}}
                                                </h5>
                                                    <div class="fa fa-map-marker"> {{ $localcontact->city->name .", ".$localcontact->address_line  }}</div>
                                                <div class=" text-warning" >
                                                    @for ($i = 0; $i < 5; $i++)
                                                    <span class="fa fa-star checked"></span>
                                                    @endfor 
                                                </div>
                                                <a href="#" class="readmore-btn">Find out more</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty

                                @endforelse
                            </div>
                            {{$localcontacts->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Search Result Section end -->
    </div>

    @include('theme.partials.pagefooter')
@endsection
