<div>
    @foreach ($orders as $order)
    <article class="card mb-4">
        <header class="card-header">
            @switch($order->shipping_statues_id)
            @case(1)
            @case(2)
            @case(3)
            @case(4)
            <a href='#' wire:click="cancelOrder({{ $order->id }})" class="btn btn-outline-danger float-right"> <i class="fa fa-trash"></i> الغاء الطلب </a>
            @break
            @case(5)
            <a href='{{ route('site.orders.returns.create' , $order ) }}'  class="btn btn-outline-danger float-right"> <i class="fa fa-back"></i> ارجاع الطلب </a>
            @break
            @endswitch
            <strong class="d-inline-block mr-3"> رقم الطلب : {{ $order->number }} </strong>
            <span>تاريخ الطلب : {{ $order->created_at->toDateString() }} </span> <br>
            <span class='d-inline-block mr-3 text-success'> {{ $order->status?->name }} </span>
        </header>
        <div class="card-body">
            <div class="row"> 
                <div class="col-md-8">
                    <h6 class="text-muted"> التوصيل الى  </h6>
                    <p> {{ $order->governorate?->name }} <br>  
                        رقم الموبيل : {{ $order->order_phone }} <br>
                        {{ $order->address }}
                    </p>
                </div>
                <div class="col-md-4">
                    <h6 class="text-muted">طريقه الدفع</h6>
                    <span class="text-success">
                        كاش عند الاستلام
                    </span>
                    <p>
                        المبلغ : {{ $order->total }} جنيه<br>
                        قيمه الشحن:  {{ $order->shipping_cost }} جنيه<br> 
                        <span class="b"> المبلغ الكلى :  {{ $order->total + $order->shipping_cost }} جنيه</span> <br>
                        <span class="b text-danger"> ارباحى من الطلب :  {{ $order->marketer_price() }} جنيه</span>
                    </p>
                </div>
            </div> <!-- row.// -->
        </div> <!-- card-body .// -->
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>
                    @foreach ($order->items as $item)
                    <tr>
                        <td>
                            <img src="{{ Storage::url('products/'.$item->product?->image) }}" class="img-xs border">
                        </td>
                        <td> 
                            <p class="title mb-0">{{ $item->product?->name }}</p>
                            <var class="price text-muted">جنيه  {{ $item->price }}</var>
                        </td>
                        <td> {{ $item->quantity }} قطعه </td>
                       {{--  <td> <a href="#" class="btn btn-outline-primary">Track order</a> 
                            <div class="dropdown d-inline-block">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle btn btn-outline-secondary">More</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item">Return</a>
                                    <a href="#"  class="dropdown-item">Cancel order</a>
                                </div>
                            </div> <!-- dropdown.// -->
                        </td> --}}
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div> <!-- table-responsive .end// -->
    </article> <!-- card order-item .// -->
    @endforeach
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> طلب ارجاع  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">سبب الارجاع:</label>
            <select wire:model='return_reason' class='form-control' id="">
                <option value="المنتج به عيوب">المنتج به عيوب</option>
                <option value="المنتج تالف">المنتج تالف</option>
                <option value="المنتج غير مطابق للمواصفات">المنتج غير مطابق للمواصفات</option>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label"> تعليق إضافى :</label>
            <textarea class="form-control"  wire:model='description' id="message-text"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> اغلاق </button>
        <button type="button" class="btn btn-primary" wire:click='saveReturnOrder({{ $order->id }})' > تقديم الطلب </button>
      </div>
    </div>
  </div>
</div>

@section('scripts')

<script>
    jQuery(document).ready(function($) {
        Livewire.on('showReturnOrderModal', order_id => {
            $('#exampleModal').modal('show');
        })
    });
</script>
@endsection