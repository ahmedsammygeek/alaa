@extends('dashboard.layouts.master')

@section('page_title')
{{ trans('products.show_product_details') }}
@endsection

@section('page_header')
<a href="{{ route('dashboard.products.index') }}" class="breadcrumb-item"><i class="icon-ampersand  mr-2"></i> @lang('products.products')</a>
<span class="breadcrumb-item active"> @lang('products.show_product_details') </span>

@endsection
@section('page_content')
<div class="row">
	<div class="col-lg-12">
		<ul class="nav nav-tabs nav-tabs-solid nav-tabs-solid-custom bg-primary nav-justified">
			<li class="nav-item"><a href="#colored-justified-tab1" class="nav-link active" data-toggle="tab"> تفاصيل المنتج </a></li>
			<li class="nav-item"><a href="#colored-justified-tab2" class="nav-link" data-toggle="tab"> المتغيرات </a></li>
			<li class="nav-item"><a href="#colored-justified-tab3" class="nav-link" data-toggle="tab"> صور المنتج </a></li>
			<li class="nav-item"><a href="#colored-justified-tab4" class="nav-link" data-toggle="tab"> احصائيات </a></li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane fade show active" id="colored-justified-tab1">
				<div class="card">
					<table class="table table-condensed  table-bordered table-hover">
						<tbody>
							<tr>
								<th> @lang('products.created') </th>
								<td> {{ $product->created_at->toDateTimeString() }} <span class='text-muted' >{{ $product->created_at->diffForHumans() }} </span> </td>
							</tr>
							<tr>
								<th> @lang('products.added_by') </th>
								<td> <a href="{{ route('dashboard.admins.show' , ['admin' => $product->user_id]) }}"> {{ optional($product->user)->name }} </a> </td>
							</tr>
							<tr>
								<th> @lang('products.status') </th>
								<td>
									@switch($product->active)
									@case(1)
									<span  class='badge badge-success'> @lang('products.active') </span>
									@break
									@case(0)
									<span  class='badge badge-danger'> @lang('products.inactive') </span>
									@break
									@endswitch
								</td>
							</tr>
							<tr>
								<th> @lang('products.name_ar') </th>
								<td> {{ $product->getTranslation('name' , 'ar') }} </td>
							</tr>
							<tr>
								<th> @lang('products.name_en') </th>
								<td> {{ $product->getTranslation('name' , 'en') }} </td>
							</tr>
							<tr>
								<th> @lang('products.category') </th>
								<td> {{ $product->category?->name }} </td>
							</tr>
							<tr>
								<th> @lang('products.brand') </th>
								<td> {{ $product->brand?->name }} </td>
							</tr>
							<tr>
								<th> @lang('products.mini_description_ar') </th>
								<td> {!! $product->getTranslation('mini_description' , 'ar') !!} </td>
							</tr>
							<tr>
								<th> @lang('products.mini_description_en') </th>
								<td> {!! $product->getTranslation('mini_description' , 'en') !!} </td>
							</tr>
							<tr>
								<th> @lang('products.description_ar') </th>
								<td> {!! $product->getTranslation('description' , 'ar') !!} </td>
							</tr>
							<tr>
								<th> @lang('products.description_en') </th>
								<td> {!! $product->getTranslation('description' , 'en') !!} </td>
							</tr>
							<tr>
								<th> سعر المنتج </th>
								<td> {{ $product->price }} <span class='text-muted' > جنيه </span> </td>
							</tr>
							<tr>
								<th>السعر بعد الخصم </th>
								<td> {{  $product->price_after_discount }} <span class='text-muted' > جنيه </span> </td>
							</tr>
							<tr>
								<th> نسبه الخصم </th>
								<td> {{ $product->discount_percentage }} <span class='text-muted' > جنيه </span> </td>
							</tr>
							<tr>
								<th> عدد النقاط </th>
								<td> {{  $product->points }} <span class='text-muted' > نقطه </span> </td>
							</tr>
							<tr>
								<th> الحد الادنى لللبيع بالجمله </th>
								<td> {{ $product->minimam_gomla_number }} </td>
							</tr>
							<tr>
								<th> الباركود </th>
								<td> {{ $product->barcode }} </td>
							</tr>
							<tr>
								<th> مبلغ المسوق </th>
								<td> {{ $product->marketer_price }} <span class='text-muted' > جنيه </span> </td>
							</tr>
							<tr>
								<th> المبلغ المقترح للبيع (الحد الادنى) </th>
								<td> {{ $product->min_price }} <span class='text-muted' > جنيه </span> </td>
							</tr>
							<tr>
								<th> المبلغ المقترح للبيع (الحد الاعلى) </th>
								<td> {{ $product->max_price }} <span class='text-muted' > جنيه </span> </td>
							</tr>
							<tr>
								<th> تقيم المنتج </th>
								<td> {{ $product->rate }} </td>
							</tr>							
							<tr>
								<th> الكميات </th>
								<td>
									<ul>
										@foreach ($product->warehouses as $product_warehouse)
										<li> {{ $product_warehouse->warehouse?->name }} => {{ $product_warehouse->quantity }} قطعه</li>
										@endforeach
									</ul>
								</td>
							</tr>
							<tr>
								<th> صوره المنتج الرئيسيه </th>
								<td> <a href="{{ Storage::url('products/'.$product->image) }}"> <img class='rounded img-preview' data-popup="lightbox" data-gallery="gallery1" src="{{ Storage::url('products/'.$product->image) }}" alt=""> </a> </td>
							</tr>					
						</tbody>
					</table>
				</div>
			</div>

			<div class="tab-pane fade" id="colored-justified-tab2">
				{{-- @livewire('board.product-variations' , ['product' => $product ] ) --}}
			</div>

			<div class="tab-pane fade" id="colored-justified-tab3">
				@livewire('board.products.images' , ['product' => $product ] )
			</div>

			<div class="tab-pane fade" id="colored-justified-tab4">
				<div class="card card-body">
					<div class="row text-center">
						<div class="col-2">
							<p><i class="icon-cart2 icon-2x d-inline-block text-info"></i></p>
							<h5 class="font-weight-semibold mb-0">{{ $product->sales_count }} <span class="text-muted"> عمليه شراء </span> </h5>
							<span class="text-muted font-size-sm">عدد مرات البيع</span>
						</div>

						<div class="col-2">
							<p><i class="icon-point-up icon-2x d-inline-block text-warning"></i></p>
							<h5 class="font-weight-semibold mb-0"> {{ $product->return_count }} <span class="text-muted"> مرتجع </span> </h5>
							<span class="text-muted font-size-sm">عدد مرات الارجاع</span>
						</div>

						<div class="col-2">
							<p><i class="icon-eye icon-2x d-inline-block text-success"></i></p>
							<h5 class="font-weight-semibold mb-0"> {{ $product->views_count }} <span class="text-muted"> مره </span> </h5>
							<span class="text-muted font-size-sm">عدد مرات المشاهده</span>
						</div>
						<div class="col-2">
							<p><i class="icon-cash3 icon-2x d-inline-block text-success"></i></p>
							<h5 class="font-weight-semibold mb-0"> {{ $product->total_sales }} <span class="text-muted"> جنيه </span> </h5>
							<span class="text-muted font-size-sm">اجمالى مبيعات المنتج</span>
						</div>
						<div class="col-2">
							<p><i class="icon-cash3 icon-2x d-inline-block text-success"></i></p>
							<h5 class="font-weight-semibold mb-0"> {{ $product->total_marketers_sales }} <span class="text-muted"> جنيه </span> </h5>
							<span class="text-muted font-size-sm">اجمالى ارباح المسوقين </span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ Storage::url('dashboard_assets/global_assets/js/plugins/media/glightbox.min.js') }}"></script>
<script src="{{ Storage::url('dashboard_assets/global_assets/js/demo_pages/gallery.js') }}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Livewire.on('itemDeleted', postId => {
            Toast.fire({
                icon: 'success',
                title: 'تم حذف الصوره بنجاح'
            })
        })



        $(document).on('click', 'a.delete_item', function(event) {
            event.preventDefault();
            var id = $(this).attr('data-item_id');
            Swal.fire({
                title: '@lang('dashboard.are_you_sure_to_delete')',
                text: "@lang('dashboard.delete_notice')",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '@lang('dashboard.yes')',
                cancelButtonText: '@lang('dashboard.cancel')'
            }).then((result) => {
                if (result.isConfirmed) {
                   Livewire.emit('deleteItem' , id )
               }
           })
        });
    });
</script>
@endsection
