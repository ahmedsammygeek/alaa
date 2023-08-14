<tr>
  <td>
    <figure class="itemside">
      <div class="aside">
        <img src="{{ Storage::url('products/'.$item->variation?->product?->image) }}" class="img-sm">
      </div>
      <figcaption class="info">
        <a href="#" class="title text-dark">{{ $item->variation?->product?->name }}</a>
        @if ($item->variation->type != 'default' )
        <p class="text-muted small"> @lang('site.'.$item->variation->type): {{ $item->variation->title }} , 
          @if ($item->variation?->parent_id)
          @lang('site.'.$item->variation?->parent?->type) : {{ $item->variation?->parent?->title }}
          @endif
          <br>
        </p>
        @endif
      </figcaption>
    </figure>
  </td>
  <td>
    {{ $item->variation?->product?->price }} <span class="text-muted"> جنيه </span>
  </td>
  <td> 
    <div class="price-wrap"> 
      <input type="text" class='form-control' value='{{ $item->price }}' wire:model='price'  >
    </div> 
  </td>
  <td> 
    <select class="form-control" wire:model='quantity'>
      @for ($i = 1; $i < 20 ; $i++)
      <option  value='{{ $i }}' {{ $item->quantity == $i ? 'selected="selected"' : '' }} >{{ $i }}</option>
      @endfor
    </select> 
  </td>

  <td> 
    <div class="price-wrap"> 
     {{ ($item->variation?->product->marketer_price + ($item->price - $item->variation?->product->price)) * $item->quantity }}
    </div> 
  </td>
  <td class="text-right"> 
    <a data-original-title="Save to Wishlist" title="" href="#" class="btn btn-primary" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> 
    <a href="#" wire:click='removeItem({{ $item->id }})' class="btn btn-danger"> <i class="fa fa-trash"></i> حذف </a>
  </td>
</tr>