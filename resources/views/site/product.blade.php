@extends('site.layouts.master')

@section('page_content')
<section class="py-3 " style='background-color: #FAF55FF !important;' >
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسيه</a></li>
      <li class="breadcrumb-item"><a href="#">{{ $product->category?->name }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
    </ol>
  </div>
</section>

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg-white padding-y">
  <div class="container">

    <!-- ============================ ITEM DETAIL ======================== -->
    <div class="row">
      <aside class="col-md-6">
        <div class="card">
          @livewire('site.product-gallery' , ['product' => $product ] )
          <a href='{{ route('product.images.download' , $product ) }}' class='btn btn-primary' > <i class="fa fa-download"></i> تحميل جميع صور المنتج على جهازك </a>
        </div> <!-- card.// -->
      </aside>
      <main class="col-md-6">
        <article class="product-info-aside">

          <h2 class="title mt-3" style='color: #6B14BE' > {{ $product->name }} </h2>

          <div class="rating-wrap my-3">
           <ul class="rating-stars">
            <li style="width:80%" class="stars-active"> 
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
         <small class="label-rating text-muted">132 تقييم</small>
         <small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 154 تم شرائه </small>
       </div> <!-- rating-wrap.// -->
       @livewire('site.product-selector' , ['product' => $product ] )
     </article> <!-- product-info-aside .// -->
   </main> <!-- col.// -->
 </div> <!-- row.// -->

 <!-- ================ ITEM DETAIL END .// ================= -->


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name padding-y bg">
  <div class="container">

    <div class="row">
     <div class="col-md-8">
      <h5 class="title-description"> تفاصيل المنتج </h5>
      <p>
        {!! $product->description !!}
      </p>


    </div> <!-- col.// -->

    <aside class="col-md-4">

      <div class="box">

        <h5 class="title-description"> @lang('site.similar_products') </h5>
        @foreach ($similar_products as $similar_product)
        <div class="col-lg-12">
          <figure class="itemside mb-4">
            <a href="{{ $similar_product->url() }}" class="aside">
              <img src="{{ Storage::url('products/'.$similar_product->image) }}" class="img-sm img-thumbnail">
            </a>
            <figcaption class="info">
              <a href="{{ $similar_product->url() }}" class="title">{{ $similar_product->name }}</a>
              <span class="text-muted">{{ $similar_product->price }} جنيه</span>
              <div class="rating-wrap">
                <ul class="rating-stars">
                  <li class="stars-active" style="width:80%;">
                    <img src="{{ Storage::url('site_assets/images/misc/stars-active.svg') }}" alt="">
                  </li>
                  <li>
                    <img src="{{ Storage::url('site_assets/images/misc/starts-disable.svg') }}" alt="">
                  </li>
                </ul>
                <span class="label-rating text-warning">4.5</span>
              </div> <!-- rating-wrap.// -->
            </figcaption>
          </figure>
        </div>

        @endforeach 


      </div> <!-- box.// -->
    </aside> <!-- col.// -->
  </div> <!-- row.// -->

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<div class="container">
  <section class="padding-bottom">

    <header class="section-heading mb-4">
      <h3 class="title-section"> @lang('site.best_selling') </h3>
    </header>

    <div class="row row-sm">

      @foreach ($best_selling_products as $best_selling_product)
      <div class="col-lg-2">
        <div class="item-box">
          <div class="item-img">
            <div id="carouselExampleIndicators{{ $best_selling_product->id }}" class="carousel slide"data-ride="carousel">
              <ol class="carousel-indicators">
                @foreach ($best_selling_product->images as $product_image)
                <li data-target="#carouselExampleIndicators{{ $best_selling_product->id }}" data-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active' : '' }}"></li>
                @endforeach
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="" style='height: 225px !important;' src="{{ Storage::url('products/'.$best_selling_product->image) }}" alt="First slide">
                </div>
                @foreach ($best_selling_product->images as $product_image)
                <div class="carousel-item">
                  <img class="" style='height: 225px !important;' src="{{ Storage::url('products/'.$product_image->image) }}" alt="Second slide">
                </div>

                @endforeach
              </div>
            </div>
          </div>
          <div class="item-text">
            <h4 class='text-center' > {{ $best_selling_product->name }} </h4>
            <li>
              <div class="list-right">
                <span>أقل سعر للبيع</span>
                <h4 class='text-center' style='color:#6B14BE !important' >{{ $best_selling_product->price }} ج.م </h4>
              </div>
              <div class="list-left">
                <span>أقل ربح لك</span>
                <h4 class='text-center' style='font-size: 23px !important;color:#6B14BE !important;'> {{ $best_selling_product->marketer_price }} ج.م</h4>
              </div>
            </li>
            <div class="item-footer">
              <a href='{{ route('site.products.show' , $best_selling_product ) }}' class='btn btn-primary btn-block' > شاهد تفاصيل المنتج  </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div> <!-- row.// -->
  </section>
</div>

@endsection

@section('scripts')
<script src="{{ asset('image-zoom/js/image-zoom.js') }}"></script>
<script type="text/javascript">
  $(function() {



    $(".center").slick({
      dots: true,
      infinite: true,
      centerMode: true,
      slidesToShow: 5,
      slidesToScroll: 3
    });
  });
</script>
@endsection
@section('styles')
<link rel="icon" href="{{ asset('image-zoom/css/image-zoom.css') }}">
<link rel="stylesheet" href="{{ Storage::url('site_assets/css/slick-theme.css') }}">
@endsection