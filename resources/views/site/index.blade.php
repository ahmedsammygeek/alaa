@extends('site.layouts.master')
@section('page_content')

<section class="section-intro padding-y">
    <div class="container">
        @php
        $r = 0;
        @endphp
        <div id="carousel1_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($slides as $slide)
                <li data-target="#carousel1_indicator" data-slide-to="{{ $r }}" class="{{ $r == 0 ? 'active' : '' }}">
                </li>
                @php
                $r++;
                @endphp
                @endforeach
            </ol>
            <div class="carousel-inner">
                @php
                $i = 1;
                @endphp

                @foreach ($slides as $slide)
                <div class="carousel-item {{ $i ==1 ? 'active' : '' }}">
                    <a href="{{ $slide->link }}">
                        <img src="{{ Storage::url('slides/'.$slide->image) }}" alt="First slide"> 
                    </a>
                </div>
                @php
                $i++;
                @endphp
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">السابق</span>
            </a>
            <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only"> التاىل </span>
            </a>
        </div> 
    </div> 
</section>
<section class="products" dir='ltr' >
    <div class="container">
        <div class="owl-carousel">
            @foreach ($slider_categories as $slider_category)
            <div class="pro-box">
                <a href="{{ route('category.products' , $slider_category ) }}">
                    <img src="{{ Storage::url('categories/'.$slider_category->image) }}" alt="p1">
                </a>
            </div>
            @endforeach


        </div>  
    </div>
</section>


<div class="container">
    <!-- =============== SECTION 1 =============== -->
    <section class="padding-bottom">
        <header class="section-heading mb-4">
            <h4 class="title-section"> 
                @lang('site.latest_products') 
                <a href="" class="btn btn-outline-primary float-right "> <i class="fa fa-cart"></i> شاهد الكل </a>
            </h4>
        </header>

        <div class="">
            <div class="multiple-items row">
                @foreach ($latest_products as $product)
                <div class="col-lg-12">
                    <div class="item-box">
                        <div class="item-img">
                            <div id="carouselExampleIndicators{{ $product->id }}" class="carousel slide"data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach ($product->images as $product_image)
                                    <li data-target="#carouselExampleIndicators{{ $product->id }}" data-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active' : '' }}"></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="" style='height: 225px !important;' src="{{ Storage::url('products/'.$product->image) }}" alt="First slide">
                                    </div>
                                    @foreach ($product->images as $product_image)
                                    <div class="carousel-item">
                                        <img class="" style='height: 225px !important;' src="{{ Storage::url('products/'.$product_image->image) }}" alt="Second slide">
                                    </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="item-text">
                            <h4 class='text-center' > {{ $product->name }} </h4>
                            <li>
                                <div class="list-right">
                                    <span>أقل سعر للبيع</span>
                                    <h4 class='text-center' style='color:#6B14BE !important' >{{ $product->price }} ج.م </h4>
                                </div>
                                <div class="list-left">
                                    <span>أقل ربح لك</span>
                                    <h4 class='text-center' style='font-size: 23px !important;color:#6B14BE !important;'> {{ $product->marketer_price }} ج.م</h4>
                                </div>
                            </li>
                            <div class="item-footer">
                                <a href='{{ route('site.products.show' , $product ) }}' class='btn btn-primary btn-block' > شاهد تفاصيل المنتج  </a>
                            </div>
                        </div>
                    </div>
                </div> 
                @endforeach
            </div>
        </div> 
    </section>



    <!-- =============== SECTION 2 =============== -->
    <section class="padding-bottom">

        <header class="section-heading mb-4">
            <h4 class="title-section"> 
                @lang('site.best_selling') 
                <a href="" class="btn btn-outline-primary float-right "> <i class="fa fa-back"></i> شاهد الكل </a>
            </h4>
        </header>

        <div class="">

            <div class="multiple-items row">
                @foreach ($best_selling_products as $product)
                <div class="col-lg-12">
                    <div class="item-box">
                        <div class="item-img">
                            <div id="carouselExampleIndicators{{ $product->id }}" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach ($product->images as $product_image)
                                    <li data-target="#carouselExampleIndicators{{ $product->id }}" data-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active' : '' }}"></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100 h-100 "  style='height: 225px !important;' src="{{ Storage::url('products/'.$product->image) }}" alt="First slide">
                                    </div>
                                    @foreach ($product->images as $product_image)
                                    <div class="carousel-item">
                                        <img class="d-block w-100 " style='height: 225px !important;' src="{{ Storage::url('products/'.$product_image->image) }}" alt="Second slide">
                                    </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="item-text">
                            <h4 class="text-center"> {{ $product->name }} </h4>
                            <li>
                                <div class="list-right">
                                    <span>أقل سعر للبيع</span>
                                    <h6 class="text-center">{{ $product->price }} م.ج</h6>
                                </div>
                                <div class="list-left">
                                    <span>أقل ربح لك</span>
                                    <h6 class="text-center"> {{ $product->marketer_price }} ج.م</h6>
                                </div>
                            </li>
                            <div class="item-footer">
                                <a href='{{ route('site.products.show' , $product ) }}' class='btn btn-primary btn-block' > شاهد تفاصيل المنتج  </a>
                            </div>
                        </div>
                    </div>
                </div> 
                @endforeach
            </div>

        </div> <!-- row.// -->
    </section>
    <!-- =============== SECTION 2 END =============== -->

    @foreach ($home_categories as $home_category)
    <section class="padding-bottom">

        <header class="section-heading mb-4">
            <h4 class="title-section"> 
                {{ $home_category->name }} 
                <a href="{{ route('category.products' , $home_category ) }}" class="btn btn-outline-primary float-right "> <i class="fa fa-back"></i> شاهد الكل </a>
            </h4>


        </header>

        <div class="">

            <div class="multiple-items">
                @foreach ($home_category->products()->latest()->limit(10)->get() as $category_product)
                <div class="col-lg-12">
                    <div class="item-box">
                        <div class="item-img">
                            <div id="carouselExampleIndicators{{ $category_product->id }}" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach ($category_product->images as $product_image)
                                    <li data-target="#carouselExampleIndicators{{ $category_product->id }}" data-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active' : '' }}"></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100 h-100 " style='height: 225px !important;' src="{{ Storage::url('products/'.$category_product->image) }}" alt="First slide">
                                    </div>
                                    @foreach ($category_product->images as $product_image)
                                    <div class="carousel-item">
                                        <img class="d-block w-100 " style='height: 225px !important;' src="{{ Storage::url('products/'.$product_image->image) }}" alt="Second slide">
                                    </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="item-text">
                            <h4 class='text-center' > {{ $category_product->name }} </h4>
                            <li>
                                <div class="list-right">
                                    <span>أقل سعر للبيع</span>
                                    <h6 class='text-center' >{{ $category_product->price }} م.ج</h6>
                                </div>
                                <div class="list-left">
                                    <span>أقل ربح لك</span>
                                    <h6 class='text-center' > {{ $category_product->marketer_price }} ج.م</h6>
                                </div>
                            </li>
                            <div class="item-footer">
                                <a href='{{ route('site.products.show' , $category_product ) }}' class='btn btn-primary btn-block' > شاهد تفاصيل المنتج  </a>
                            </div>
                        </div>
                    </div>
                </div> 
                @endforeach
            </div>

        </div> <!-- row.// -->
    </section>
    @endforeach

</div>  
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ Storage::url('site_assets/css/slick.css') }}"/>
@endsection


@section('scripts')
<script type="text/javascript" src="{{ Storage::url('site_assets/js/slick.min.js') }}"></script>
<script>
    $(function() {
        $('.multiple-items').slick({

           prevArrow: '<svg width="40" class="prevArrow" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M20 40C8.9543 40 -2.7141e-06 31.0457 -1.74846e-06 20C-7.8281e-07 8.9543 8.95431 -2.7141e-06 20 -1.74846e-06C31.0457 -7.8281e-07 40 8.9543 40 20C40 31.0457 31.0457 40 20 40ZM16.1206 13.5198C15.7554 13.1055 15.1632 13.1055 14.798 13.5198L9.58704 19.4308C9.22182 19.8451 9.22182 20.5168 9.58704 20.931L14.798 26.8421C15.1632 27.2563 15.7554 27.2563 16.1206 26.8421C16.4858 26.4278 16.4858 25.7561 16.1206 25.3418L12.4912 21.2248L29.6865 21.2248C30.2388 21.2248 30.6865 20.7771 30.6865 20.2248C30.6865 19.6725 30.2388 19.2248 29.6865 19.2248L12.4138 19.2248L16.1206 15.02C16.4858 14.6057 16.4858 13.934 16.1206 13.5198Z" fill="#7C8B9C"/></svg>',
           nextArrow: '<svg width="40" height="40" class="nextArrow" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M20 3.49691e-06C31.0457 5.4282e-06 40 8.95431 40 20C40 31.0457 31.0457 40 20 40C8.9543 40 1.56562e-06 31.0457 3.49691e-06 20C5.4282e-06 8.95431 8.95431 1.56562e-06 20 3.49691e-06ZM23.8794 26.4802C24.2446 26.8945 24.8368 26.8945 25.202 26.4802L30.413 20.5692C30.7782 20.1549 30.7782 19.4833 30.413 19.069L25.202 13.1579C24.8368 12.7437 24.2446 12.7437 23.8794 13.1579C23.5142 13.5722 23.5142 14.2439 23.8794 14.6582L27.5088 18.7752L10.3135 18.7752C9.7612 18.7752 9.31348 19.2229 9.31348 19.7752C9.31348 20.3275 9.76119 20.7752 10.3135 20.7752L27.5862 20.7752L23.8794 24.98C23.5142 25.3943 23.5142 26.066 23.8794 26.4802Z" fill="#7C8B9C"/></svg>',
           dots: false,
           lazyLoad : 'ondemand' , 
           accessibility: true , 
           autoplay: true ,
           rtl : true , 
           infinite: true,
           arrows : true , 
           speed: 300,
           slidesToShow: 6,
           slidesToScroll: 2,
           responsive: [
           {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
        }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
    }
}

]
       });
    });
</script>
@endsection