<div class="bg-light mt-1 px-3">
    
        {{-- @auth
    @else
    <h5 class="h5-responsive">Review</h5>
    @endauth --}}

        @foreach ($rates as $rate)
        @auth
        @if ($rate->user_id==auth()->user()->id)
        @php
        continue;
        @endphp
        @endif
        @endauth

        <div class="py-3">
            <div>
                <div class="fa fa-user-circle-o">
                    {{$rate->user->name}}
                    <span class="fa fa-check-circle text-success text-capitalize"> {{$rate->status}}</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    @for ($i = 1; $i <= $rate->rate; $i++)
                        <span class="fa fa-star text-warning"></span>
                        @endfor
                        @for ($j =++$rate->rate; $j <= 5; $j++) <span class="fa fa-star-o "></span>
                            @endfor
                            <span> {{$rate->updated_at==null ? $rate->created_at : $rate->updated_at}}</span>
                </div>
            </div>
            <div class="text-secondary">{{$rate->review}}</div>
        </div>
        <hr>
        @endforeach
        {{$rates->links()}}
    
</div>