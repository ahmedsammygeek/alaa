@extends('site.layouts.master')

@section('page_content')
<section class="section-content padding-y">
  <div class="container">

    <header class="mb-3">
      <div class="form-inline">
        <strong class="mr-md-auto"> تم العثور على 900 منتج  </strong>
        <select class="mr-2 form-control">
          <option> الترتيب حسب </option>
          <option>الاكثير مبيعا</option>
          <option>الاكثير تقييما</option>
          <option>الاحدث</option>
          <option>الاقدم</option>
          <option>الاقل سعرا</option>
          <option>الاعلى سعرا</option>
        </select>

      </div>
    </header><!-- sect-heading -->

    <div class="row">

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

           

          </figcaption>
        </figure>
      </div> <!-- col.// -->
      @endforeach

    </div>


    <nav class="mb-4" aria-label="Page navigation sample">
      {{ $products->links() }}
    </nav>


  </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->





@endsection