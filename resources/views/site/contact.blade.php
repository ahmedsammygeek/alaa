@extends('site.layouts.master')

@section('content')
    <div class="ps-page--single" id="contact-us">
      <div class="ps-breadcrumb">
        <div class="container">
          <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"> @lang('site.home') </a></li>
            <li> @lang('site.contact_us') </li>
          </ul>
        </div>
      </div>
      <div class="ps-contact-map">
        
        <div id='map' style="width: 100%; height: 500px;"  >
          
        </div>
      </div>
      <div class="ps-contact-info">
        <div class="container">
          <div class="ps-section__header">
            <h3> @lang('site.Contact Us For Any Questions') </h3>
          </div>
          <div class="ps-section__content">
            <div class="row">
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                <div class="ps-block--contact-info">
                  <h4> @lang('site.email') </h4>
                  <p><a href="#">{{ $data['settings']->email }}</a></p>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                <div class="ps-block--contact-info">
                  <h4> @lang('site.address') </h4>
                  <p><span> {{ $data['settings']->address }} </span></p>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                <div class="ps-block--contact-info">
                  <h4> @lang('site.phone') </h4>
                  <p><span>{{ $data['settings']->phone }}</span></p>
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
      <div class="ps-contact-form">

        <div class="container">
          @include('dashboard.layouts.messages')
          
          <form class="ps-form--contact-us" action="{{ route('contact.store') }}" method="POST">
            @csrf
            <h3> @lang('site.Get_In_Touch') </h3>
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                <div class="form-group">
                  <input name="name" value='{{ old('name') }}' class="form-control @error('name') is-invalid   @enderror" type="text" placeholder=" @lang('site.name') *">
                  @error('name') 
                  <p  class='text-danger' > {{ $message }} </p>
                  @enderror
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                <div class="form-group">
                  <input name="email" value='{{ old('email') }}' class="form-control @error('email') is-invalid   @enderror" type="email" placeholder="@lang('site.email') *">
                  @error('email') 
                  <p  class='text-danger' > {{ $message }} </p>
                  @enderror
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="form-group">
                  <input  name="phone" value='{{ old('phone') }}' class="form-control @error('phone') is-invalid   @enderror" type="text" placeholder=" @lang('site.phone') *">
                  @error('phone') 
                  <p  class='text-danger' > {{ $message }} </p>
                  @enderror
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="form-group">
                  <textarea class="form-control @error('message') is-invalid   @enderror" name='message' rows="5" placeholder=" @lang('site.message') "></textarea>
                  @error('message') 
                  <p  class='text-danger' > {{ $message }} </p>
                  @enderror
                </div>
              </div>
            </div>
            <div class="form-group submit">
              <button class="ps-btn"> @lang('site.Send') </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="ps-newsletter">
      <div class="container">
        <form class="ps-form--newsletter" action="do_action" method="post">
          <div class="row">
            <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <div class="ps-form__left">
                <h3>Newsletter</h3>
                <p>Subcribe to get information about products and coupons</p>
              </div>
            </div>
            <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <div class="ps-form__right">
                <div class="form-group--nest">
                  <input class="form-control" type="email" placeholder="Email address">
                  <button class="ps-btn">Subscribe</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
@endsection


@section('scripts')

<script src="https://maps.google.com/maps/api/js?key=AIzaSyBuQymvDTcNgdRWQN0RhT2YxsJeyh8Bys4&amp;libraries=places">
</script>
<script>
  $(document).ready(function() {
  
    var latlng = new google.maps.LatLng({{ $data['settings']->lat }}, {{ $data['settings']->long }} );
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 8,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var marker = new google.maps.Marker({
      position: latlng,
      map: map,
      title: '{{ $data['settings']->address }}',
    });

    google.maps.event.addListener(marker, 'dragend', function (event) {
      document.getElementById("latitude").value = this.getPosition().lat();
      document.getElementById("longitude").value = this.getPosition().lng();
    });


  });

  
</script>
@endsection