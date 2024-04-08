<article class="gallery-wrap"> 
    <div class="img-big-wrap">
        <div> <a href="#"><img class="main_product_image" src="{{ $image }}"></a></div>
    </div> 
    <div class="thumbs-wrap">
        <a href="#" class="item-thumb " data-small_product_image="{{ Storage::url('products/'.$product->image) }}" > <img src="{{ Storage::url('products/'.$product->image) }}"></a>
        @foreach ($product->images as $product_image)
        <a href="#" class="item-thumb " data-small_product_image="{{ Storage::url('products/'.$product_image->image) }}" >  <img src="{{ Storage::url('products/'.$product_image->image) }}"></a>
        @endforeach
    </div>
</article> 

@push('scripts')
<script>
    $(document).ready(function() {
        // $('img.main_product_image').imageZoom();
        
        $('a.item-thumb').on('click', function(event) {
            event.preventDefault();
            var image_source = $(this).attr('data-small_product_image');
            $('img.main_product_image').attr('src' , image_source );
        });
    });
</script>
@endpush