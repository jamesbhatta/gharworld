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
                    <form action="/file-upload" class="dropzone">
                        <div class="fallback">
                          <input name="images" id="images" type="file"  multiple/>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    
    </div>
</div>
@endsection
