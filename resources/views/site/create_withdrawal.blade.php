@extends('site.layouts.master')


@section('page_content')


<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg-gray">
  <div class="container">
    <h2 class="title-page"> تقديم طلب سحب ارباح </h2>
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

      <div class="card">
       <form action="{{ route('site.withdrawals.store') }}" method='POST' >
        @csrf

        <div class="col-md-12">
          <div class="form-group">
            <label for=""> المبلغ </label>
            <input type="number" class='form-control' name="amount" value="{{ $total_incomes_not_withdrawald }}" >
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for=""> رقم الموبيل </label>
            <input type="text" class='form-control' name="phone" value="{{ Auth::user()->phone }}" >
          </div>
        </div>

        <div class="card-footer">
          <button class="btn btn-primary"> تقديم الطلب </button> 
        </div>
      </form>
    </div>
  </main> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->




@endsection