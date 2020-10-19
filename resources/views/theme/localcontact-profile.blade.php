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
                <div class="card shadow mt-3" style="width: 50rem;">
                    <div class="row p-3">
                        <div class="col-md-4 text-center">
                            <img src="{{$localContact->image!=null ? asset('storage/' . $localContact->image) : asset('assets/img/person-avatar.png')}}"
                                class="img-thumbnail rounded-circle img-fluid" alt="{{ $localContact->name }}"
                                style="width:35rem; height:auto">
                            <h4 class="m-2">{{ $localContact->name }}</h4>
                            <h6 class="text-capitalize text-warning">{{ $localContact->profession->name}} </h6>
                        </div>
                        <div class="col-md-7 mt-2 ml-3 pt-5 font-weight-bold text-black">
                            <h4 class="py-3">Contact Details</h4>
                            <h5 class="bg-light p-3">
                                <div><i class="fa fa-map-marker py-2"> </i>
                                    {{ $localContact->city->name.", ".$localContact->address_line }}
                                </div>
                                <div>
                                    <i class="fa fa-phone p-2 bg-warning rounded-pill text-white"><a href="tel:{{ $localContact->contact}}"> {{ $localContact->contact}}</a>
                                    </i>
                                </div>
                                <div>
                                    <i class="fa fa-envelope-o py-2 "> </i><a href="mailto:{{ $localContact->email}}"
                                        class="text-dark"> {{ $localContact->email}}</a>
                                </div>
                                <div>
                                    <i class="fa fa-graduation-cap py-2"> </i>{{ $localContact->qualification}}</a>
                                </div>
                                <div>
                            </h5>
                        </div>
                    </div>
                    
                    @isset($localContact->about)
                    <hr>
                    <div class="row p-3">
                        <div class="col-md-12">
                            <h4 class="pb-3">Discription</h4>
                            <div class="p-3 text-left bg-light"
                            style="height:180px; solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
                            {!! $localContact->about !!}
                        </div>
                        </div>
                    </div>
                    @endisset
                </div>

            </div>
        </div>
    </section>
    <!-- Search Result Section end -->
</div>

@include('theme.partials.pagefooter')
@endsection