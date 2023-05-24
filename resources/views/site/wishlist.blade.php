@extends('site.layouts.master')


@section('page_content')


<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg-gray">
  <div class="container">
    <h2 class="title-page"> حسابى </h2>
  </div> <!-- container //  -->
</section>
<!-- ========================= SECTION PAGETOP END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
  <div class="container">

    <div class="row">
      <aside class="col-md-3">
        <nav class="list-group">
         @include('site.user_side_bar')
       </nav>
     </aside> <!-- col.// -->
     <main class="col-md-9">

      <article class="card mb-3">
        <div class="card-body">
          
            @livewire('site.wishlist')
         
        </div> <!-- card-body .// -->
      </article> <!-- card.// -->

    </main> <!-- col.// -->
  </div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->




@endsection