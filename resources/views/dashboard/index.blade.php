@extends('dashboard.layouts.master')

@section('page_title')
{{ trans('dashboard.home') }}
@endsection

@section('page_header')
<span class="breadcrumb-item active"> @lang('dashboard.home') </span>
@endsection

@section('page_content')

<div class="row">
	<div class="col-sm-6 col-xl-3">
		<div class="card card-body">
			<div class="media">
				<div class="media-body">
					<h3 class="font-weight-semibold mb-0">{{ $orders_count }}</h3>
					<span class="text-uppercase font-size-sm text-muted">عدد الطلبات اليوم</span>
				</div>

				<div class="ml-3 align-self-center">
					<i class="icon-cart4 icon-3x text-primary"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-xl-3">
		<div class="card card-body">
			<div class="media">
				<div class="media-body">
					<h3 class="font-weight-semibold mb-0">{{ $orders_return_count }}</h3>
					<span class="text-uppercase font-size-sm text-muted">عدد الطلبات المرتجع اليوم</span>
				</div>

				<div class="ml-3 align-self-center">
					<i class="icon-cart4 icon-3x text-primary"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-xl-3">
		<div class="card card-body">
			<div class="media">
				<div class="media-body">
					<h3 class="font-weight-semibold mb-0">{{ $orders_total_income }} جنيه </h3>
					<span class="text-uppercase font-size-sm text-muted">اجمالى مبيعات طلبات اليوم </span>
				</div>

				<div class="ml-3 align-self-center">
					<i class="icon-cash3 icon-3x text-danger"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-xl-3">
		<div class="card card-body">
			<div class="media">
				<div class="media-body">
					<h3 class="font-weight-semibold mb-0">{{ $expenses_this_month }} جنيه</h3>
					<span class="text-uppercase font-size-sm text-muted">اجمالى المصروفات الشهريه</span>
				</div>

				<div class="ml-3 align-self-center">
					<i class="icon-cash3 icon-3x text-success"></i>
				</div>
			</div>
		</div>
	</div>

	<hr>

	<div class="col-sm-6 col-xl-3">
		<div class="card card-body">
			<div class="media">
				<div class="media-body">
					<h3 class="font-weight-semibold mb-0">{{ $marketers_count }} مسوق</h3>
					<span class="text-uppercase font-size-sm text-muted">اجمالى عدد المسوقين</span>
				</div>

				<div class="ml-3 align-self-center">
					<i class="icon-users icon-3x text-success"></i>
				</div>
			</div>
		</div>
	</div>


	<div class="col-sm-6 col-xl-3">
		<div class="card card-body">
			<div class="media">
				<div class="media-body">
					<h3 class="font-weight-semibold mb-0">{{ $products_count }} منتج</h3>
					<span class="text-uppercase font-size-sm text-muted">اجمالى عدد المنتجات</span>
				</div>

				<div class="ml-3 align-self-center">
					<i class="icon-ampersand  icon-3x text-success"></i>
				</div>
			</div>
		</div>
	</div>


	<div class="col-sm-6 col-xl-3">
		<div class="card card-body">
			<div class="media">
				<div class="media-body">
					<h3 class="font-weight-semibold mb-0">{{ $categories_count }} قسم</h3>
					<span class="text-uppercase font-size-sm text-muted">اجمالى عدد الاقسام</span>
				</div>

				<div class="ml-3 align-self-center">
					<i class="icon-equalizer  icon-3x text-success"></i>
				</div>
			</div>
		</div>
	</div>



	<div class="col-sm-6 col-xl-3">
		<div class="card card-body">
			<div class="media">
				<div class="media-body">
					<h3 class="font-weight-semibold mb-0">{{ $brands_count }} ماركه</h3>
					<span class="text-uppercase font-size-sm text-muted">اجمالى عدد الماركات</span>
				</div>

				<div class="ml-3 align-self-center">
					<i class="icon-equalizer  icon-3x text-success"></i>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title"> احصائيات المنتجات & المسوقين </h6>
			</div>

			<div class="card-body">
				<ul class="nav nav-tabs nav-tabs-highlight nav-justified">
					<li class="nav-item">
						<a href="#justified-badge-tab1" class="nav-link active" data-toggle="tab">
							المنتجات الاكثر ارجاع
							<span class="badge badge-danger align-top mr-2"> 10 </span> 
						</a>
					</li>
					<li class="nav-item">
						<a href="#justified-badge-tab2" class="nav-link" data-toggle="tab">
							المنتجات الاكثر مبيعا 
							<span class="badge badge-info align-top ml-2">10</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="#justified-badge-tab3" class="nav-link" data-toggle="tab">
							المسوقين الاعلى ربحا 
							<span class="badge badge-info align-top ml-2"> 10 </span>
						</a>
					</li>

					<li class="nav-item">
						<a href="#justified-badge-tab4" class="nav-link" data-toggle="tab">
							المسوقين الاعلى طلبا 
							<span class="badge badge-info align-top ml-2"> 10 </span>
						</a>
					</li>

					<li class="nav-item">
						<a href="#justified-badge-tab5" class="nav-link" data-toggle="tab">
							المسوقين الاعلى ارجاع 
							<span class="badge badge-info align-top ml-2"> 10 </span>
						</a>
					</li>

					
				</ul>

				<div class="tab-content">
					<div class="tab-pane fade show active" id="justified-badge-tab1">
						<table class='table table-bordered table-hover' >
							<thead>
								<tr>
									<th> # </th>
									<th> اسم المنتج </th>
									<th> عدد مرات الارجاع </th>
									<th>  </th>
								</tr>
							</thead>
							<tbody>
								@php
								$i = 1;
								@endphp
								@foreach ($most_returnd_products as $most_returnd_product)
								<tr>
									<td> {{ $i++ }} </td>
									<td> <a href="{{ route('dashboard.products.show' , $most_returnd_product ) }}"> {{ $most_returnd_product->name }} </a> </td>
									<td> {{ $most_returnd_product->return_count }} <span class='text-muted' > مره </span> </td>
									<td> 
										<a target="_blank" href='{{ route('dashboard.products.show' , ['product' => $most_returnd_product->id ] ) }}' class="btn btn-primary btn-icon"><i class="icon-eye "></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>

					<div class="tab-pane fade" id="justified-badge-tab2">
						
						<table class='table table-bordered table-hover' >
							<thead>
								<tr>
									<th> # </th>
									<th> اسم المنتج </th>
									<th> عدد مرات البيع </th>
									<th>  </th>
								</tr>
							</thead>
							<tbody>
								@php
								$i = 1;
								@endphp
								@foreach ($most_sales_products as $most_sales_product)
								<tr>
									<td> {{ $i++ }} </td>
									<td> <a href="{{ route('dashboard.products.show' , $most_sales_product ) }}"> {{ $most_sales_product->name }} </a> </td>
									<td> {{ $most_sales_product->sales_count }} <span class='text-muted' > مره </span> </td>
									<td> 
										<a target="_blank" href='{{ route('dashboard.products.show' , ['product' => $most_sales_product->id ] ) }}' class="btn btn-primary btn-icon"><i class="icon-eye "></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>

					<div class="tab-pane fade" id="justified-badge-tab3">
						<table class='table table-bordered table-hover' >
							<thead>
								<tr>
									<th> # </th>
									<th> اسم المسوق </th>
									<th> اجمالى الربح المحقق </th>
									<th>  </th>
								</tr>
							</thead>
							<tbody>
								@php
								$i = 1;
								@endphp
								@foreach ($most_income_marketers as $most_income_marketer)
								<tr>
									<td> {{ $i++ }} </td>
									<td> <a href="{{ route('dashboard.marketers.show' , $most_income_marketer ) }}"> {{ $most_income_marketer->name }} </a> </td>
									<td> {{ $most_income_marketer->total_incomes }} <span class='text-muted' > جنيه </span> </td>
									<td> 
										<a target="_blank" href='{{ route('dashboard.marketers.show' , $most_income_marketer ) }}' class="btn btn-primary btn-icon"><i class="icon-eye "></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>

					</div>

					<div class="tab-pane fade" id="justified-badge-tab4">
						<table class='table table-bordered table-hover' >
							<thead>
								<tr>
									<th> # </th>
									<th> اسم المسوق </th>
									<th> اجمالى الربح المحقق </th>
									<th>  </th>
								</tr>
							</thead>
							<tbody>
								@php
								$i = 1;
								@endphp
								@foreach ($most_order_marketers as $most_order_marketer)
								<tr>
									<td> {{ $i++ }} </td>
									<td> <a href="{{ route('dashboard.marketers.show' , $most_order_marketer ) }}"> {{ $most_order_marketer->name }} </a> </td>
									<td> {{ $most_order_marketer->orders_count }} <span class='text-muted' > طلب </span> </td>
									<td> 
										<a target="_blank" href='{{ route('dashboard.marketers.show' , $most_order_marketer ) }}' class="btn btn-primary btn-icon"><i class="icon-eye "></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>

					<div class="tab-pane fade" id="justified-badge-tab5">
						<table class='table table-bordered table-hover' >
							<thead>
								<tr>
									<th> # </th>
									<th> اسم المسوق </th>
									<th> اجمالى الربح المحقق </th>
									<th>  </th>
								</tr>
							</thead>
							<tbody>
								@php
								$i = 1;
								@endphp
								@foreach ($most_return_marketers as $most_return_marketer)
								<tr>
									<td> {{ $i++ }} </td>
									<td> <a href="{{ route('dashboard.marketers.show' , $most_return_marketer ) }}"> {{ $most_return_marketer->name }} </a> </td>
									<td> {{ $most_return_marketer->returns_count }} <span class='text-muted' > طلب </span> </td>
									<td> 
										<a target="_blank" href='{{ route('dashboard.marketers.show' , $most_return_marketer ) }}' class="btn btn-primary btn-icon"><i class="icon-eye "></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection