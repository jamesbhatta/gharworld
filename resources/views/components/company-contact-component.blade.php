<div>
@isset($profile)
<div>
    <h6>
        <div><img src="{{asset('storage/'.$profile->logo) }}" alt="GharWorld Logo" style="height:70px;"></div>
        <div class="py-1">{{$profile->name}}</div>
        <div class="py-1 fa fa-map-marker"> {{$profile->address}}</div>
        <div class="py-1 fa fa-phone"><a href="tel:{{$profile->contact}}"> {{$profile->contact}}</a> </div>
        <div class="py-1 fa fa-envelope"><a href="mailto:{{$profile->email}}"> {{$profile->email}}</a> </div>
    </h6>
    <div class="py-2 text-info">
        <span class="text-center" {{$profile->facebook ==null ? 'hidden' : '' }}><a href="{{$profile->facebook}}"> <i class="fa fa-facebook btn btn-primary"></i></a> </span>
        <span class="text-center" {{$profile->whatsapp ==null ? 'hidden' : ''}}><a href="tel:{{$profile->whatsapp}}"> <i class="fa fa-whatsapp btn text-white" style="background-color: green"></i></a> </span>
        <span class="py-2 " {{$profile->twitter ==null ? 'hidden' : '' }}><a href="{{$profile->twitter}}"><i class="fa fa-twitter btn btn-primary"></i></a> </span>
        <span class="py-2 " {{$profile->instagram ==null ? 'hidden' : '' }}><a href="{{$profile->instagram}}"><i class="fa fa-instagram btn btn-danger"></i></a> </span>
        <span class="text-center " {{$profile->linkedin==null ? 'hidden' : ''}}><a href="{{$profile->linkedin}}"> <i class="fa fa-linkedin btn btn-primary"></i></a> </span>
        <span class="py-2" {{$profile->youtube==null ? 'hidden' :'' }}><a href="{{$profile->youtube}}"><i class="fa fa fa-youtube btn btn-danger"></i></a> </span>
    </div>
</div>
    
@endisset
</div>