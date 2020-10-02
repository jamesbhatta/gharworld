@extends('layouts.admin')

@section('content')
<div class="p-4">
    <div class="row">
        {{-- Alerts --}}
        <div class="col-md-6 mx-auto">
            @include('alerts.all')
        </div>
    </div>

    <div class="row">
        {{-- Add & Edit Form --}}
        <div class="col-md-12 mx-auto">
            <div class="card z-depth-0 sticky-top">
                <div class="card-body">
         
                </div>
            </div>
        </div>
    
    </div>
</div>
@endsection
