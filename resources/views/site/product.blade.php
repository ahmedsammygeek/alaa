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
      <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div href="#" class="card card-sm card-product-grid">
          <a href="#" class="img-wrap"> 
            <b class="badge badge-danger mr-1">10% خصم</b>
            <img src="{{ Storage::url('products/'.$best_selling_product->image) }}"> 
          </a>
          <figcaption class="info-wrap">
            <a href="#" class="title"> {{ $best_selling_product->name }} </a>
            <div class="price-wrap">
              <span class="price">{{ $best_selling_product->price }} جنيه </span>
              {{-- <del class="price-old">$90</del> --}}
            </div> <!-- price-wrap.// -->
          </figcaption>
        </div>
      </div> <!-- col.// -->
      @endforeach

    </div> <!-- row.// -->
  </section>
</div>

@endsection

@section('scripts')
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
<link rel="stylesheet" href="{{ Storage::url('site_assets/css/slick-theme.css') }}">
@endsection