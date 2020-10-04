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
        <div class="col-md-12 mx-auto">
            <div class="card z-depth-0 sticky-top">
                <div class="card-header">
                    <h3 class="h3-responsive">Local Contact {{ isset($localContact) ? 'Update' : 'Entry' }} Form</h3>
                </div>
                <div class="card-body">
                    <x-local-contact-form :localContact="$localContact ?? null" />
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
