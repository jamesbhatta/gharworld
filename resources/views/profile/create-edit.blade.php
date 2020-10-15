@extends('layouts.admin')

@section('content')
<div class="p-4">
    <x-section-title>Company Profile Form</x-section-title>

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
                    <form action="{{$profile->exists ? route('profile.update',$profile) :  route('profile.store')  }}"
                        method="POST" class="form" enctype="multipart/form-data">
                        @csrf
                        @if ($profile->exists)
                        @method('put')
                        @endif
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{old('name',$profile->name)}}" id="name" placeholder="Company Name"
                                    autofocus>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{old('address',$profile->address)}}" id="address" placeholder="address">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="logo">Logo</label>
                                <input type="file" name="logo" class="form-control" id="logo" accept="image/*">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{old('email',$profile->email)}}" id="email"
                                    placeholder="example@domain.com">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="contact">Contact No.</label>
                                <input type="tel" name="contact" class="form-control"
                                    value="{{old('contact',$profile->contact)}}" id="contact" placeholder="Contact No.">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="whatsapp">WhatsApp</label>
                                <input type="tel" name="whatsapp" class="form-control"
                                    value="{{old('whatsapp',$profile->whatsapp)}}" id="whatsapp"
                                    placeholder="WhatsApp No.">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="facebook">Facebook</label>
                                <input type="url" name="facebook" class="form-control"
                                    value="{{old('facebook',$profile->facebook)}}" id="facebook" placeholder="Facebook">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="linkedin">Linked In</label>
                                <input type="url" name="linkedin" class="form-control"
                                    value="{{old('linkedin',$profile->linkedin)}}" id="linkedin"
                                    placeholder="Linked In">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="youtube">YouTube</label>
                                <input type="url" name="youtube" class="form-control"
                                    value="{{old('youtube',$profile->youtube)}}" id="youtube" placeholder="YouTube">
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="form-control btn btn-info">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection