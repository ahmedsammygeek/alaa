@extends('site.layouts.master')


@section('page_content')




<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-conten padding-y" style="min-height:84vh">

<!-- ============================ COMPONENT LOGIN   ================================= -->
    <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
      <div class="card-body">
      <h4 class="card-title mb-4"> التحقق من رقم الموبيل </h4>
      <form action="{{ route('forget_password.send_code') }}" method="POST" >
        @csrf
         
          <div class="form-group">
             <input name="mobile" class="form-control" placeholder="رقم الموبيل" type="text">
             @error('mobile')
             <p class='text-danger' > {{ $message }} </p>
             @enderror
          </div> <!-- form-group// -->
         
          
          
          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"> ارسال كود التحقق  </button>
          </div> <!-- form-group// -->    
      </form>
      </div> <!-- card-body.// -->
    </div> <!-- card .// -->

    
     <br><br>
<!-- ============================ COMPONENT LOGIN  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->




@endsection