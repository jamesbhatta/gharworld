<div>
    <h5 class="h5-responsive my-3">Rating</h5>
    @if ($rates==null)
    <h5>{{$msg}}/5 Rating</h5>
    <h3 class="py-2">
        @for ($i = 1; $i <= $msg; $i++) <span wire:click="rate{{$i}}" class="fa fa-star text-warning"></span>
            @endfor
            @for ($j =++$msg; $j <= 5; $j++) <span wire:click="rate{{$j}}" class="fa fa-star-o "></span>
                @endfor
    </h3>
    {{$rate}}
    <div class="py-2">
        <textarea wire:model="review" name="review" id="" cols="" rows="4" placeholder="Review"
            style="width: 100%"></textarea>
    </div>
    <div class="ml-auto">
        <button wire:click="submit" class="btn btn-success">Post</button>
    </div>
    @else
    <div class="p-md-2 my-3">
        <div>
            <div class="fa fa-user-circle-o">
                {{$rates->user->name}}
                <span class="fa fa-check-circle text-success text-capitalize"> {{$rates->status}}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between">
        <div >
            @for ($i = 1; $i <= $rates->rate; $i++)
                <span class="fa fa-star text-warning"></span>
                @endfor
                @for ($j =++$rates->rate; $j <= 5; $j++) <span class="fa fa-star-o "></span>
                @endfor
                <span>  {{$rates->updated_at==null ? $rates->created_at : $rates->updated_at}}</span>
            </div>
            <div class=""><button type="button" wire:click="delete" class="btn  btn-outline-danger fa fa-trash"> Delete</button></div>
        </div>
            <div class="text-secondary">{{$rates->review}}</div>
        </div>
    @endif
</div>