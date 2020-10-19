<div>
@isset($profile)
<div>
    <h6>
        <div><img src="{{asset('storage/'.$profile->logo) }}" alt="GharWorld Logo" style="height:70px;"></div>
        <div class="py-1">{{$profile->name}}</div>
        <div class="py-1 fa fa-map-marker"> {{$profile->address}}</div>
        <div class="py-1 fa fa-phone"> {{$profile->contact}}</div>
        <div class="py-1 fa fa-envelope"> {{$profile->email}}</div>
    </h6>
</div>
    
@endisset
</div>