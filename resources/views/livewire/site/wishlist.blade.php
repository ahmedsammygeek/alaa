<div class='row' >
    @foreach ($items as $item)
    <div class="col-md-6">
      <figure class="itemside mb-4">
        <div class="aside"><img src="{{ Storage::url('products/'.$item->product?->image) }}" class="border img-md"></div>
        <figcaption class="info">
            <a href="{{ $item->product?->url() }}" class="title">{{ $item->product?->name }}</a>
            <p class="price mb-2"> {{ $item->product?->price }} جنيه </p>
            <a href="#" wire:click='removeFromWishList({{ $item->product_id }})' class="btn btn-danger btn-sm" data-toggle="tooltip" title="" data-original-title="حذف من قائمه الامنيات"> <i class="fa fa-times"></i> </a>
        </figcaption>
    </figure>
</div> <!-- col.// -->
@endforeach
</div>
