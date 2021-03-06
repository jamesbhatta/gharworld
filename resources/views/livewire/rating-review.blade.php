<div class="bg-light pt-2 px-3 py-3">
    @if ($rates==null)
    {{-- <h5 class="h5-responsive ">Rate this</h5> --}}

    <h5>{{$value}}/5 Rating</h5>
    <h3 class="">
        @for ($i = 1; $i <= 5; $i++) <span wire:click="$set('value', {{$i}})">
            @if($value >= $i)
            <span class="fa fa-star text-warning"></span>
            @else
            <span class="fa fa-star-o "></span>
            @endif
            </span>
            @endfor
            {{-- @for ($i = 1; $i <= $value; $i++) <span wire:click="rate{{$i}}" class="fa fa-star text-warning"></span>
            @endfor
            @for ($j =++$value; $j <= 5; $j++) <span wire:click="rate{{$j}}" class="fa fa-star-o "></span>
                @endfor --}}
    </h3>
   @if ($value>0) 
    <div class="py-2">
        <textarea wire:model="review" name="review" id="" cols="" rows="4" placeholder="Describe your experience"
            style="width: 100%"></textarea>
    </div>
    
    <div class="">
        <button wire:click="submit" class="btn btn-success">Post</button>
    </div>
    @endif
    @else
    {{-- <h5 class="h5-responsive">Your Review</h5> --}}
    <div class="">
        <div>
            <div class="fa fa-user-circle-o">
                {{$rates->user->name}}
                <span class="fa fa-check-circle text-success text-capitalize"> {{$rates->status}}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <div>
                @for ($i = 1; $i <= $rates->rate; $i++)
                    <span class="fa fa-star text-warning"></span>
                    @endfor
                    @for ($j =++$rates->rate; $j <= 5; $j++) <span class="fa fa-star-o "></span>
                        @endfor
                        <span> {{$rates->updated_at==null ? $rates->created_at : $rates->updated_at}}</span>
            </div>
            <div class=""><button type="button" wire:click="delete" class="btn  btn-outline-danger fa fa-trash">
                    Delete</button></div>
        </div>
        <div class="text-secondary">{{$rates->review}}</div>
    </div>
    @endif
</div>