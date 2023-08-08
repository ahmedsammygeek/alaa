@extends('site.layouts.master')


@section('page_content')




<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-conten padding-y" style="min-height:84vh">

<!-- ============================ COMPONENT LOGIN   ================================= -->
    <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
      <div class="card-body">
      <h4 class="card-title mb-4"> تسجيل الدخول عبر </h4>
      <form action="{{ route('login_system') }}" method="POST" >
        @csrf
          <a href="#" class="btn btn-facebook btn-block mb-2"> <i class="fab fa-facebook-f"></i> &nbsp حساب فيس بوك </a>
          <a href="{{ route('google') }}" class="btn btn-google btn-block mb-4"> <i class="fab fa-google"></i> &nbsp  حساب جوجل </a>
          <div class="form-group">
             <input name="mobile" class="form-control" placeholder="رقم الموبيل" type="text">
             @error('mobile')
             <p class='text-danger' > {{ $message }} </p>
             @enderror
          </div> <!-- form-group// -->
          <div class="form-group">
            <input name="password" class="form-control" placeholder="كلمه المرور" type="password">
            @error('password')
             <p class='text-danger' > {{ $message }} </p>
             @enderror
          </div> <!-- form-group// -->
          
          <div class="form-group">
            <a href="#" class="float-right"> هل نسيت كلمه المرور ? </a> 
            <label class="float-left custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label"> تذكرنى </div> </label>
          </div> <!-- form-group form-check .// -->
          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"> دخول  </button>
          </div> <!-- form-group// -->    
      </form>
      </div> <!-- card-body.// -->
    </div> <!-- card .// -->

     <p class="text-center mt-4"> لا تمتلك حساب بعد ؟ <a href="{{ route('register') }}"> حساب جديد </a></p>
     <br><br>
<!-- ============================ COMPONENT LOGIN  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->




@endsection