@extends('site.layouts.master')

@section('page_content')
<section class="section-content padding-y">
  <div class="container">

   <div class="row">
    <main class="col-md-9">
      <div class="card">

        <table class="table table-borderless table-shopping-cart">
          <thead class="text-muted">
            <tr class="small text-uppercase">
              <th scope="col">صوره المنتج</th>
              <th scope="col">الاسم</th>
              <th scope="col" width="120">الكميه</th>
              <th scope="col" width="120">السعر</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($items as $item)
            <tr>
              <td>
                <figure class="itemside">
                  <div class="aside">
                    <a href="{{ $item->product?->url() }}"> <img src="{{ Storage::url('products/'.$item->product?->image) }}" class="img-sm"> </a>
                  </div>
                </figure>
              </td>
              <td>
               {{ $item->product->name }}
              </td>
              <td> 
                {{ $item->quantity }}
              </td>
              <td> 
                <div class="price-wrap"> 
                  <var class="price"> {{ $item->product?->price * $item->quantity }} جنيه</var> 
                  <small class="text-muted"> {{ $item->product?->price }} ججنيه </small> 
                </div> 
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>


      </div> <!-- card.// -->



    </main> <!-- col.// -->
    <aside class="col-md-3">

      <div class="card">
        <div class="card-body">
          <dl class="dlist-align">
            <dt> السعر الكلى </dt>
            <dd class="text-right">{{ $total }} جنيه </dd>
          </dl>
          <dl class="dlist-align">
            <dt>الخصم:</dt>
            <dd class="text-right">0 جنيه </dd>
          </dl>
          <dl class="dlist-align">
            <dt>المبلغ الكلى :</dt>
            <dd class="text-right  h5"><strong>{{ $total }} جنيه</strong></dd>
          </dl>
          <hr>
          <form action="{{ route('checkout.save') }}" method="POST" >
            @csrf
            <div class="col-md-12">
             <div class="form-row">
              <div class="form-group col-md-12">
                <label> المحافظه </label>
                <select id="inputState" name="governorate_id" class="form-control">
                  @foreach ($governorates as $governorate)
                  <option value="{{ $governorate->id }}"> {{ $governorate->name }} </option>
                  @endforeach
                </select>
                @error('governorate_id')
                <p class="text-danger" > {{ $message }} </p>
                @enderror
              </div> <!-- form-group end.// -->

              <div class="form-group col-md-12">
                <label> المدينه </label>
                <select id="inputState" name="city" class="form-control">
                  @foreach ($cities as $city)
                  <option value="{{ $city->id }}"> {{ $city->name }} </option>
                  @endforeach
                </select>
                @error('city')
                <p class="text-danger" > {{ $message }} </p>
                @enderror
              </div> <!-- form-group end.// -->
             
            </div> <!-- form-row.// -->

            <div class="form-row">
              <div class=" form-group col-md-12">
                <label> العنوان بالتفصيل </label>
                <input type="text" class="form-control" name="address" value="Vosidiy">
                 @error('address')
                <p class="text-danger" > {{ $message }} </p>
                @enderror
              </div> <!-- form-group end.// -->

            </div> <!-- form-row.// -->



            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Phone</label>
                <input type="text" class="form-control" name='phone' value="{{ Auth::user()->phone }}">
                 @error('phone')
                <p class="text-danger" > {{ $message }} </p>
                @enderror
              </div> <!-- form-group end.// -->
            </div> <!-- form-row.// -->

            <button class="btn btn-primary">اتمام الطلب</button> 

            <br><br><br><br><br><br>

          </div>
        </form>


      </div> <!-- card-body.// -->
    </div>  <!-- card .// -->
  </aside> <!-- col.// -->
</div>

</div> 
</section>
@endsection


