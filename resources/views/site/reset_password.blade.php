@extends('site.layouts.master')


@section('page_content')




<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-conten padding-y" style="min-height:84vh">


  <!-- ============================ COMPONENT LOGIN   ================================= -->
  <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
    <div class="card-body">
      @if (Session::has('error'))
      <div class="alert alert-danger mt-3">
        <p class="icontext">
         {{ Session::get('error') }}
       </p>
     </div>
     @endif
     <h4 class="card-title mb-4"> اعداه تعيين كلمه المرور </h4>
     <form action="{{ route('reset_password.store') }}" method="POST" >
      @csrf
      <div class="alert alert-success mt-3">
        <p class="icontext">
         برجاء انشاء كلمه المرور الجديده 
        </p>
      </div>
      <div class="form-group">
        <label for=""> كلمه المرور  : </label>
       <input name="password" class="form-control" placeholder="كلمه المرور" type="password">
       @error('password')
       <p class='text-danger' > {{ $message }} </p>
       @enderror
     </div> 
     <div class="form-group">
        <label for=""> تاكيد كلمه المرور  : </label>
       <input name="password_confirmation" class="form-control" placeholder="تاكيد كلمه المرور" type="password">
       @error('password_confimation')
       <p class='text-danger' > {{ $message }} </p>
       @enderror
     </div> 
     <input type="hidden" value="{{ $opreation_id }}" name='opreation_id' >
     <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block"> حفظ  </button>
    </div> <!-- form-group// -->    
  </form>
</div> <!-- card-body.// -->
</div> <!-- card .// -->


</section>



@endsection