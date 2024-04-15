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
{{-- <script src="{{ asset('') }}"></script> --}}
<script>
    $(document).ready(function() {
        // $('img.main_product_image').zoom();

        $('img.main_product_imag').hover(function() {
            $(this).css("cursor", "pointer");
            $(this).toggle({
              effect: "scale",
              percent: "90%"
          },200);
        }, function() {
           $(this).toggle({
             effect: "scale",
             percent: "80%"
         },200);

       });
        

        
        $('a.item-thumb').on('click', function(event) {
            event.preventDefault();
            var image_source = $(this).attr('data-small_product_image');
            $('img.main_product_image').attr('src' , image_source );
        });
    });
</script>
@endpush



