@extends('dashboard.layouts.master')

@section('page_title')
{{ trans('dashboard.home') }}
@endsection

@section('page_header')
<span class="breadcrumb-item active"> @lang('dashboard.home') </span>
@endsection

@section('page_content')

<div class="row">
	<div class="card card-body">
		<div class="row text-center">
			<div class="col-3">
				<p><i class="icon-cart4 icon-2x d-inline-block text-info"></i></p>
				<h5 class="font-weight-semibold mb-0">{{ $orders_count }}</h5>
				<span class="text-muted font-size-sm"> عدد الطلبات اليوم </span>
			</div>
			<div class="col-3">
				<p><i class="icon-cart4 icon-2x d-inline-block text-info"></i></p>
				<h5 class="font-weight-semibold mb-0">{{ $orders_return_count }}</h5>
				<span class="text-muted font-size-sm"> عدد الطلبات المرتجع اليوم </span>
			</div>

			<div class="col-3">
				<p><i class="icon-cash3 icon-2x d-inline-block text-warning"></i></p>
				<h5 class="font-weight-semibold mb-0"> {{ $orders_total_income }} جنيه </h5>
				<span class="text-muted font-size-sm"> اجمالى مبيعات طلبات اليوم </span>
			</div>

			<div class="col-3">
				<p><i class="icon-cash3 icon-2x d-inline-block text-success"></i></p>
				<h5 class="font-weight-semibold mb-0"> {{ $expenses_this_month }} جنيه </h5>
				<span class="text-muted font-size-sm">اجمالى المصروفات الشهريه</span>
			</div>
		</div>
	</div>
</div>

@endsection