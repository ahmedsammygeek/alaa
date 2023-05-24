<div class="row">
  <main class="col-md-9">
    <div class="card">

      <table class="table table-borderless table-shopping-cart">
        <thead class="text-muted">
          <tr class="small text-uppercase">
            <th scope="col">المنتج</th>
            <th scope="col" width="120">الكميه</th>
            <th scope="col" width="120">السعر</th>
            <th scope="col" class="text-right" width="200"> </th>
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
            <select class="form-control"  >
                @for ($i = 1; $i < 10 ; $i++)
                    <option wire:click='editQuantity({{ $item->product_id }} , {{ $i }} )' value='{{ $i }}' {{ $item->quantity == $i ? 'selected="selected"' : '' }} >{{ $i }}</option>
                @endfor
            </select> 
        </td>
        <td> 
            <div class="price-wrap"> 
                <var class="price"> {{ $item->product?->price * $item->quantity }} جنيه</var> 
                <small class="text-muted"> {{ $item->product?->price }} ججنيه </small> 
            </div> 
        </td>
        <td class="text-right"> 
          
          <a href="#" wire:click='removeItem({{ $item->product_id }})' class="btn btn-light"> <i class="fa fa-trash"></i> الغاء </a>
      </td>
  </tr>
  @endforeach
</tbody>
</table>

<div class="card-body border-top">
    <a href="{{ route('checkout.index') }}" class="btn btn-primary float-md-right"> اتمام الطلب <i class="fa fa-chevron-right"></i> </a>
    <a href="{{ url('/') }}" class="btn btn-light"> <i class="fa fa-chevron-left"></i> اكمل التسوق </a>
</div>  
</div> <!-- card.// -->

<div class="alert alert-success mt-3">
  <p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 weeks</p>
</div>

</main> <!-- col.// -->
<aside class="col-md-3">
    <div class="card mb-3">
      <div class="card-body">
        <form>
          <div class="form-group">
            <label> هل تمتلك كود خصم </label>
            <div class="input-group">
              <input type="text" class="form-control" wire:model='coupon' placeholder="كود الخصم">
              <span class="input-group-append"> 
                <button class="btn btn-primary" wire:click='chackCoupon()' > تفعيل </button>
            </span>
        </div>
    </div>
</form>
</div> <!-- card-body.// -->
</div>  <!-- card .// -->
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
 

</div> <!-- card-body.// -->
</div>  <!-- card .// -->
</aside> <!-- col.// -->
</div>