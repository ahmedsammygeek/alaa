@extends('site.layouts.master')

@section('page_content')
<section class="section-content padding-y">
  <div class="container">
    <div class="card mb-3">
      <div class="card-body">
        
        <hr>
        <div class="row">
          <div class="col-md-2"> قم بالحث داخل المنتجات عبر </div> <!-- col.// -->
          <div class="col-md-10"> 
            <ul class="list-inline">
              <li class="list-inline-item mr-3 dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> الماركه </a>
                <div class="dropdown-menu p-3" style="max-width:400px;">  
                <label class="form-check">
                   <input type="radio" name="myfilter" class="form-check-input"> ماركه 1
                 </label>
                 <label class="form-check">
                   <input type="radio" name="myfilter" class="form-check-input"> ماركه 2
                 </label>
                 <label class="form-check">
                   <input type="radio" name="myfilter" class="form-check-input"> ماركه 3
                 </label>
                 
               </div> <!-- dropdown-menu.// -->
             </li>
             <li class="list-inline-item mr-3 dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">  التصنيف </a>
              <div class="dropdown-menu p-3"> 
                <label class="form-check">   <input type="checkbox" class="form-check-input"> تصنيف 1    </label>
                <label class="form-check">   <input type="checkbox" class="form-check-input"> تصنيف 3    </label>
                <label class="form-check">   <input type="checkbox" class="form-check-input"> تصنيف 3    </label>
                <label class="form-check">   <input type="checkbox" class="form-check-input"> تصنيف 4    </label>
         
              </div> <!-- dropdown-menu.// -->
            </li>
            
            <li class="list-inline-item mr-3"><a href="#">اللون</a></li>
            <li class="list-inline-item mr-3"><a href="#">الحجم</a></li>
            <li class="list-inline-item mr-3">
              <div class="form-inline">
                <label class="mr-2"> السعر </label>
                <input class="form-control form-control-sm" placeholder="الحد الادنى" type="number">
                <span class="px-2"> - </span>
                <input class="form-control form-control-sm" placeholder="الحد الاقصى" type="number">
                <button type="submit" class="btn btn-sm btn-light ml-2">  </button>
              </div>
            </li>
           
          </ul>
        </div> <!-- col.// -->
      </div> <!-- row.// -->
    </div> <!-- card-body .// -->
  </div> <!-- card.// -->
  <!-- ============================ FILTER TOP END.// ================================= -->

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

    @for ($i = 0; $i < 12 ; $i++)
    <div class="col-md-3">
      <figure class="card card-product-grid">
        <div class="img-wrap"> 
          <span class="badge badge-danger"> جديد </span>
          <img src="{{ Storage::url('site_assets/images/items/1.jpg') }}">
        </div> <!-- img-wrap.// -->
        <figcaption class="info-wrap">
          <a href="#" class="title mb-2"> هنا يتم وضع اسم املنتج </a>
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
            <span class="price">250 جنيه</span> 
          </div>        
          <p class="text-muted "> هنا يتم وضع تفصيل بسيط للمنتج </p>
          <hr>

          <a href="#" class="btn  btn-primary"> 
            <i class="fas fa-shopping-cart"></i> <span class="text"> اضف الى السله </span> 
          </a>

          <a href="#" class="btn btn-primary"><i class="fa fa-heart"></i>  </a>

        </figcaption>
      </figure>
    </div> <!-- col.// -->
    @endfor

  </div>


  <nav class="mb-4" aria-label="Page navigation sample">
    <ul class="pagination">
      <li class="page-item disabled"><a class="page-link" href="#">السابق</a></li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">4</a></li>
      <li class="page-item"><a class="page-link" href="#">5</a></li>
      <li class="page-item"><a class="page-link" href="#">التالى</a></li>
    </ul>
  </nav>


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->





@endsection