@extends('site.layouts.master')
@section('page_content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
  <div class="card mx-auto" style="max-width:520px; margin-top:40px;">
      <article class="card-body">
    <header class="mb-4"><h4 class="card-title"> حساب جديد </h4></header>
    <form  method="POST"  action='{{ route('site.register') }}' >
      @csrf
        <div class="form-row">
          <div class="col form-group">
            <label> الاسم  </label>
              <input type="text" class="form-control" name='name' placeholder="">
              @error('name')
              <p class='text-danger'> {{ $message }} </p>
              @enderror
          </div> <!-- form-group end.// -->
        </div> <!-- form-row end.// -->
        <div class="form-group">
          <label> رقم الموبيل </label>
          <input type="text" name="phone" class="form-control" placeholder="">
          
          @error('phone')
              <p class='text-danger'> {{ $message }} </p>
              @enderror
        </div> <!-- form-group end.// -->

        <div class="form-group">
          <label> البريد الاكتورنى </label>
          <input type="email" name='email' class="form-control" placeholder="">
          @error('email')
              <p class='text-danger'> {{ $message }} </p>
              @enderror
        </div> <!-- form-group end.// -->
      

        <div class="form-row">
          <div class="form-group col-md-6">
            <label>كلمه المرور</label>
              <input class="form-control" name='password' type="password">
              @error('password')
              <p class='text-danger'> {{ $message }} </p>
              @enderror
          </div> <!-- form-group end.// --> 
          <div class="form-group col-md-6">
            <label>تاكيد كلمة المرور</label>
              <input class="form-control" name="password_confirmation" type="password">
              @error('password_confirmation')
              <p class='text-danger'> {{ $message }} </p>
              @enderror
          </div> <!-- form-group end.// -->  
        </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"> انشىء حسابك  </button>
          </div> <!-- form-group// -->      
          <div class="form-group"> 
                <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label"> اوافق على جميع <a href="#">الشروط و الاحكام</a>  </div> </label>
            </div> 
            <a href="#" class="btn btn-facebook btn-block mb-2"> <i class="fab fa-facebook-f"></i> &nbsp حساب فيس بوك </a>
          <a href="{{ route('google') }}" class="btn btn-google btn-block mb-4"> <i class="fab fa-google"></i> &nbsp  حساب جوجل </a>        
      </form>
    </article><!-- card-body.// -->
    </div> <!-- card .// -->
    <p class="text-center mt-4">تمتلك حساب بالفعل ؟ <a href="{{ route('login') }}">تسجيل الدخول</a></p>
    <br><br>
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


@endsection