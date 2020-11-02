<div>
    {{-- <style>
        .change-icon>.fa+.fa,
        .change-icon:hover>.fa {
            display: none;
        }

        .change-icon:hover>.fa+.fa {
            display: inherit;
        }
    </style> --}}
    
    <h2 class=" text-right">
    <span wire:click="toggleWishlist" class="change-icon text-warning" data-toggle="tooltip" title="{{$msg}}">
     
        @if($hasInWishlist)
        <i class="fa fa-heart"></i>
        @else
        <i class="fa fa-heart-o"></i>
        @endif
      
    </span>  
    </h2>

</div>