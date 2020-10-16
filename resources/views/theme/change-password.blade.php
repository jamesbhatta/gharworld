@extends('theme.client')
@section('main-content')
<div class="my-5"></div>
<div class="container-fluid">
    <!-- Search Result Section end -->
    <section class="search-result-section">
        <div class="container-fluid py-5">
            <div class="row my-3 py-5 justify-content-center">
                <div class="card shadow" style="width: 30rem;">
                    @if (Session::has('success'))
                    <div class="bg-success text-white p-2">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    @if (Session::has('error'))
                    <div class=" bg-danger text-white p-2">
                        {{ Session::get('error') }}
                    </div>
                    @endif

                    <h3 class="py-3 text-center">User Password Change</h3>
                    <form action="{{route('frontend.change-password.change')}}" class="form px-5 py-4" method="POST">
                        @csrf
                        <input type="password" name="current"
                            class="form-control form-group @error('current') is-invalid @enderror" id="current"
                            placeholder="Current Password" required autofocus>
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
                        <input type="submit" class=" form-control btn btn-success col-md-3" value="Change">
                    </form>

                </div>

            </div>
        </div>
    </section>
    <!-- Search Result Section end -->
</div>

@include('theme.partials.pagefooter')
@endsection