<div>
    <div class="mb-3"> 
       @if ($product->hasDiscount())
       <var class=" h4"> سعر المنتج : {{ $product->price_after_discount }} جنيه  </var> 
       <span class="text-muted"> {{ $product->price }} جنيه</span> 
       @else
       <var class=" h4"> سعر المنتج : {{ $productPrice }} جنيه  </var> 
       @endif
   </div> 

   <dl class="row">
    <dt class="col-sm-3 "> الربح من اجمالي السعر : </dt>
    <dd class="col-sm-9 h5" style='color:#53cc05' > {{ $product->marketer_price }} جنيه </dd>   
    <dt class="col-sm-3 "> عدد نقاط الجائزه : </dt>
    <dd class="col-sm-9 h5"> {{ $product->points }} نقطه </dd>         
</dl>

<p>
    {{ $product->mini_description }}
</p>

<div class="form  mt-4">
    @if ($initialVariation)
    @livewire('site.product-dropdown' ,  ['variations' => $initialVariation ] )
    @endif
    <br>
    <div class="form-group col-md flex-grow-0">
        <div class="input-group mb-3 input-spinner">
            <div class="input-group-prepend">
                <button class="btn btn-light" wire:click='increasQuantity()' type="button" id="button-plus"> + </button>
            </div>
            <input type="text" class="form-control" value="{{ $quantity }}">
            <div class="input-group-append">
                <button class="btn btn-light" wire:click='dcreasQuantity()' type="button" id="button-minus"> &minus; </button>
            </div>
        </div>
    </div> 
    <div class="form-group col-md">

        @if ($finalVariant || !$hasVariant )
        <a wire:click='add_to_cart()' href='#' class="btn btn-primary"> 
            <i class="fas fa-shopping-cart"></i> <span class="text"> اضف الى السله </span> 
        </a>
        @endif

        @if ($isInMyWishList)
        <a href="#" wire:click='add_to_wishlist({{ $product->id }})' class="btn btn-light">
            <i class="fas fa-trash"></i> <span class="text"> حذف من قائمه الامنيات </span> 
        </a>
        @else
        <a href="#" wire:click='add_to_wishlist({{ $product->id }})' class="btn btn-light">
            <i class="fas fa-heart"></i> <span class="text"> إضف الى قائمه الامنيات </span> 
        </a>
        @endif
    </div> 
</div> 
</div>