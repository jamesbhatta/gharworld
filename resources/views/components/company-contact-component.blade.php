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
</div>
    
@endisset
</div>