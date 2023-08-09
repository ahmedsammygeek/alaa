@extends('site.layouts.master')


@section('page_content')


<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg-gray">
  <div class="container">
    <h2 class="title-page"> طلباتى </h2>
  </div> 
</section>

<section class="section-content padding-y">
  <div class="container">

    <div class="row">
      <aside class="col-md-3">
        <nav class="list-group">
         @include('site.user_side_bar')
       </nav>
     </aside> 
     <main class="col-md-9">

      @livewire('site.orders')

    </main> 
  </div>

</div> 
</section>
@endsection