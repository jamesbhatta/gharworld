@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="p-4">
    <x-section-title>User Password Change</x-section-title>

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
                    <form action="{{route('users.change-password',$user)}}" class="form px-5 py-4" method="POST">
                        @csrf
                        <input type="password" name="current"
                            class="form-control form-group @error('current') is-invalid @enderror" id="current"
                            placeholder="Your Current Password" required autofocus>
                        @error('current')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="password" name="new"
                            class="form-control form-group @error('new') is-invalid @enderror" id="new"
                            placeholder="New Password" required>
                        @error('new')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="password" name="confirm"
                            class="form-control form-group @error('confirm') is-invalid @enderror" id="confirm"
                            placeholder="Confirm Password" required>
                        @error('confirm')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="submit" class=" form-control btn btn-success" value="Change">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection