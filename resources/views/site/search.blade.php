@extends('site.layouts.master')

@section('page_content')
<section class="section-content padding-y">
  <div class="container">

   

    <div class="row">

      @if (count($products))
        @foreach ($products as $product)
      <div class="col-md-3">
        <figure class="card card-product-grid">
          <div class="img-wrap"> 
            <span class="badge badge-danger"> جديد </span>
            <a href="{{ $product->url() }}">
              <img src="{{ Storage::url('products/'.$product->image) }}">
            </a>
          </div> <!-- img-wrap.// -->
          <figcaption class="info-wrap">
            <a href="{{ $product->url() }}" class="title mb-2"> {{ $product->name }}</a>
            <div class="rating-wrap mb-2">
              <ul class="rating-stars">
                <li style="width:100%" class="stars-active"> 
                  <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                  <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                  <i class="fa fa-star"></i> 
                </li>
                <li>
                  <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                  <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                  <i class="fa fa-star"></i> 
                </li>
              </ul>
              <div class="label-rating">4.5</div>
            </div>
            <div class="price-wrap">
              <span class="price">{{ $product->price }} جنيه</span> 
            </div>        
            <p class="text-muted "> {{ $product->mini_description }} </p>
            <hr>

            <a href="#" class="btn  btn-primary"> 
              <i class="fas fa-shopping-cart"></i> <span class="text"> @lang('site.add_to_cart') </span> 
            </a>

          </figcaption>
        </figure>
      </div> <!-- col.// -->
      @endforeach
      @else
      لم يتم العثور على ام منتجات تحتوى على كلمات البحث
      @endif
    </div>




  </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->





@endsection