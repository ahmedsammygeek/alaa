 @php
 $lang = LaravelLocalization::getCurrentLocale() ;
 @endphp


 <header class="section-header">
     <nav class="navbar d-none d-md-flex p-md-0 navbar-expand-sm navbar-light border-bottom">
        <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTop4">
            <ul class="navbar-nav mr-auto">
                <li><a href="#" class="nav-link"> المساعده </a></li>
                <li><a href="#" class="nav-link"> المساعده </a></li>
            </ul>
            <ul class="navbar-nav">
                <li>
                    الشحن الى مصر

{{--                     @foreach ($data['countries'] as $country)
                        <a href="#" class="nav-link"> 
                            <img src="{{ Storage::url('countries/'.$country->image) }}" height="16"> {{ $country->name }}   الشحن الى 
                        </a>
                        @endforeach --}}
                    </li>
                </ul> <!-- list-inline //  -->
            </div> <!-- navbar-collapse .// -->
        </div> <!-- container //  -->
    </nav>

    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-3 col-md-12">
                    <a href="{{ url('/') }}" class="brand-wrap">
                        <img style='max-height: 57px; !important' class="logo" src="{{ Storage::url('site_assets/images/souq-01-final.svg') }}">
                    </a> 
                </div>
                <div class="col-xl-6 col-lg-5 col-md-6">
                    <form action="{{ route('search') }}" class="search-header">
                        <div class="input-group w-100">
                            <select class="custom-select border-right"  name="category_name">
                                <option value="all"> جميع التصنيفات </option>
                                @foreach ($data['categories'] as $category)
                                <option value="{{ $category->id }}">  {{ $category->name }}  </option>
                                @endforeach
                            </select>
                            <input type="text" name='search' class="form-control" placeholder="ابحث الان عن المنتجات داخل الموقع" >

                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i> @lang('site.search')
                                </button>
                            </div>
                        </div>
                    </form> <!-- search-wrap .end// -->
                </div> <!-- col.// -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="widgets-wrap float-md-right">

                        @if (!Auth::check())
                        <div class="widget-header mr-3">
                            <a href="{{ route('login') }}" class="widget-view">
                                <div class="icon-area">
                                    <i class="fa fa-user"></i>

                                </div>
                                <small class="text"> تسجيل الدخول </small>
                            </a>
                        </div>
                        <div class="widget-header mr-3">
                            <a href="{{ route('register') }}" class="widget-view">
                                <div class="icon-area">
                                    <i class="fa fa-user"></i>
                                </div>
                                <small class="text"> عضو جديد ؟ </small>
                            </a>
                        </div>
                        @endif

                        @if (Auth::check())
                        <div class="widget-header mr-3">
                            <a href="{{ route('site.account') }}" class="widget-view">
                                <div class="icon-area">
                                    <i class="fa fa-user"></i>
                                   
                                </div>
                                <small class="text"> @lang('site.account') </small>
                            </a>
                        </div>
                        @endif

                        <div class="widget-header">
                            <a href="{{ route('cart') }}" class="widget-view">
                                <div class="icon-area">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <small class="text"> @lang('site.cart') </small>
                            </a>
                        </div>


                        @if (Auth::check())
                        <div class="widget-header">
                            <a href="{{ route('user.logout') }}" class="widget-view">
                                <div class="icon-area">
                                 <i class="fa fa-sign-out-alt"></i>
                             </div>
                             <small class="text"> @lang('site.logout') </small>
                         </a>
                     </div>
                     @endif 

                 </div> <!-- widgets-wrap.// -->
             </div> <!-- col.// -->
         </div> <!-- row.// -->
     </div> <!-- container.// -->
 </section> <!-- header-main .// -->



 <nav class="navbar navbar-main navbar-expand-lg border-bottom">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                @foreach ($data['categories'] as $category)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{ route('category.products' , $category ) }}"> {{ $category->name }} </a>
                    <div class="dropdown-menu dropdown-large" style="width: 900px;" >
                        <nav class="row">
                            @foreach ($category->children as $child)
                            <div class="col-3">
                                <h5> <a  href="{{ route('category.products' , $child ) }}"> {{ $child->name }} </a> </h5>
                               @foreach ($child->children as $sub_child)
                                   <a style='font-size:16px;font-weight: normal!important;' href="{{ route('category.products' , $sub_child ) }}">{{ $sub_child->name }}</a>
                               @endforeach
                            </div>
                            @endforeach
                        </nav> <!--  row end .// -->
                    </div> <!--  dropdown-menu dropdown-large end.// -->
                </li>
                @endforeach
               
            </ul>
            <ul class="navbar-nav ml-md-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('complains') }}"> الشكاوى  و الاقتراحات </a>
                </li>
                @if ($lang == 'ar' )
                {{-- <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('en') }}"> English </a> --}}
                @else
                <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('ar') }}"> اللغه العربيه </a>
                @endif
            </ul>
        </div> <!-- collapse .// -->
    </div> <!-- container .// -->
</nav>

</header> <!-- section-header.// -->
