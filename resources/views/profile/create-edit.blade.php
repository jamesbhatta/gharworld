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
                                <label for="name" class="required">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{old('name',$profile->name)}}" id="name" placeholder="Company Name"
                                    autofocus>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="address" class="required">Address</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{old('address',$profile->address)}}" id="address" placeholder="address">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="logo">Logo</label>
                                <input type="file" name="logo" class="form-control" id="logo" accept="image/*">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="email" class="required">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{old('email',$profile->email)}}" id="email"
                                    placeholder="example@domain.com">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="contact" class="required">Contact No.</label>
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
                                <label for="viber">Viber</label>
                                <input type="tel" name="viber" class="form-control"
                                    value="{{old('viber',$profile->viber)}}" id="viber"
                                    placeholder="Viber No.">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="facebook">Facebook</label>
                                <input type="url" name="facebook" class="form-control"
                                    value="{{old('facebook',$profile->facebook)}}" id="facebook" placeholder="Facebook Link">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="twitter">Twitter</label>
                                <input type="url" name="twitter" class="form-control"
                                    value="{{old('twitter',$profile->twitter)}}" id="twitter" placeholder="Twitter Link">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="instagram">Instagram</label>
                                <input type="url" name="Instagram" class="form-control"
                                    value="{{old('instagram',$profile->instagram)}}" id="instagram" placeholder="Instagram Link">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="linkedin">Linked In</label>
                                <input type="url" name="linkedin" class="form-control"
                                    value="{{old('linkedin',$profile->linkedin)}}" id="linkedin"
                                    placeholder="Linked In link">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="youtube">YouTube</label>
                                <input type="url" name="youtube" class="form-control"
                                    value="{{old('youtube',$profile->youtube)}}" id="youtube" placeholder="YouTube Link">
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