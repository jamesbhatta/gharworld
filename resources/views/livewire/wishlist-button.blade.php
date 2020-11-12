<span wire:click="toggleWishlist" class="change-icon text-danger">
    @if($hasInWishlist)
    <i class="fa fa-heart fa-lg"></i>
    @else
    <i class="fa fa-heart-o fa-lg"></i>
    @endif
</span>