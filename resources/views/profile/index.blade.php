@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="p-4">
    <x-section-title>Company Profile</x-section-title>

    <div class="row">
        {{-- Alerts --}}
        <div class="col-md-6 mx-auto">
            @include('alerts.all')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card z-depth-0">
                <div class="card-body">

                    <a href="{{$profile==null ? route('profile.create') : route('profile.edit',$profile)}}"
                        class="btn btn-info rounded-0 mb-3 mx-0">
                        <span class="mr-2"><i
                                class=" {{!$profile ? 'fa fa-plus' : 'fa fa-edit'}}"></i></span>{{!$profile ? 'New Profile' : 'Edit Profile'}}
                    </a>
                </div>
            </div>
            @isset($profile)
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-group">
                        
                        <li class="list-group-item fa fa-home"> {{$profile->name}}</li>
                        <li class="list-group-item fa fa-map-marker"> {{$profile->address}}</li>
                        <li class="list-group-item fa fa-envelope "> {{$profile->email}}s</li>
                        <li class="list-group-item fa fa-phone"> {{$profile->contact}}</li>
                        <li class="list-group-item fa fa-whatsapp"> {{$profile->whatsapp}}</li>
                        <li class="list-group-item fa fa-facebook"> {{$profile->facebook}}</li>
                        <li class="list-group-item fa fa-linkedin"> {{$profile->linkedin}}</li>
                        <li class="list-group-item fa fa-youtube"> {{$profile->linkedin}}</li>
                        
                    </ul>
                </div>
                <div class="col-md-6">
               
                    <img class=" img-fluid img-thumbnail" src="{{"../storage/".$profile->logo}}"  alt="ghar World Logo">
                </div>
            </div>
            @endisset
        </div>
    </div>
</div>
</div>
</div>
@endsection