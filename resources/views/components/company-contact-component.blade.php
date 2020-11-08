<div>
    @isset($profile)
    <div class="d-md-flex">
        <div class="">
            <img src="{{asset('storage/'.$profile->logo) }}" alt="GharWorld Logo" style="width:100px;">
        </div>
        <div class="ml-auto">
                <div class="">{{$profile->name}}</div>
                <div class="fa fa-map-marker"> {{$profile->address}}</div>
                <div><i class="class="fa fa-phone""></i> {{$profile->contact}}</div>
                <div class="fa fa-envelope"><a href="mailto:{{$profile->email}}"> {{$profile->email}}</a> </div>
           
            <div class="py-2 text-info">
                <span class="" {{$profile->facebook ==null ? 'hidden' : '' }}><a
                        href="{{$profile->facebook}}"> <i class="fa fa-facebook btn btn-primary"></i></a> </span>
                <span  {{$profile->whatsapp ==null ? 'hidden' : ''}}><a
                        href="tel:{{$profile->whatsapp}}"> <i class="fa fa-whatsapp btn text-white"
                            style="background-color: green"></i></a> </span>
                <span class="py-2 " {{$profile->twitter ==null ? 'hidden' : '' }}><a href="{{$profile->twitter}}"><i
                            class="fa fa-twitter btn btn-primary"></i></a> </span>
                <span class="py-2 " {{$profile->instagram ==null ? 'hidden' : '' }}><a href="{{$profile->instagram}}"><i
                            class="fa fa-instagram btn btn-danger"></i></a> </span>
                <span {{$profile->linkedin==null ? 'hidden' : ''}}><a
                        href="{{$profile->linkedin}}"> <i class="fa fa-linkedin btn btn-primary"></i></a> </span>
                <span class="py-2" {{$profile->youtube==null ? 'hidden' :'' }}><a href="{{$profile->youtube}}"><i
                            class="fa fa fa-youtube btn btn-danger"></i></a> </span>
            </div>
        </div>
    </div>

    @endisset
</div>