<span wire:click="toggleWishlist" class="change-icon" style="cursor: pointer;">
    @if($hasInWishlist)
    <i class="fa fa-heart text-danger fa-lg"></i>
    @else
    <i class="fa fa-heart-o fa-lg  text-white"></i>
    @endif
</span>