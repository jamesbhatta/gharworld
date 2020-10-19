@extends('theme.client')
@section('main-content')
    <div class="my-1"></div>
    <div class="container-fluid spad">
        <!-- Search Result Section end -->
        <section class="search-result-section">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    {{-- <div class="row justify-content-center"
                    style="background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);"> --}}
                    <div class="card shadow" style="width: 70rem;">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{$localContact->image!=null ? asset('storage/' . $localContact->image) : asset('assets/img/person-avatar.png')}}" class="img-thumbnail"
                                    alt="{{ $localContact->name }}" style="width:100%; height:auto">
                            </div>
                            <div class="col-md-6 text-center font-weight-bold py-5 text-black">
                                <h2>{{ $localContact->name }}</h2>
                                <h4 class="text-capitalize py-3">{{ $localContact->profession->name}} </h4>
                                <h5><i class="fa fa-map-marker py-2"> </i> {{ $localContact->city->name.", ".$localContact->address_line }} </h5>
                                <h5><i class="fa fa-phone py-2" > </i><a href="tel:{{ $localContact->contact}}" class=" text-dark"> {{ $localContact->contact}}</a>  </h5>
                                <h5><i class="fa fa-envelope-o py-2 "> </i><a href="mailto:{{ $localContact->email}}" class="text-dark"> {{ $localContact->email}}</a></h5>
                                <h5><i class="fa fa-graduation-cap py-2"> </i>{{ $localContact->qualification}}</a></h5>
                                <div class=" pl-md-2 text-left mr-4" style="height:180px; solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
                                    {!! $localContact->about !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Search Result Section end -->
    </div>

    @include('theme.partials.pagefooter')
@endsection
