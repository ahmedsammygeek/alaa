@extends('dashboard.layouts.master')

@php
$lang = LaravelLocalization::getCurrentLocale();
@endphp
@section('page_title')
{{ trans('settings.edit_setting_details') }}
@endsection

@section('page_header')
<a href="{{ route('dashboard.settings.edit') }}" class="breadcrumb-item"><i class="icon-newspaper2 mr-2"></i> @lang('settings.settings')</a>
<span class="breadcrumb-item active"> @lang('settings.edit_setting_details') </span>
@endsection

@section('page_content')

<div class="row">
	<div class="col-md-12">
		@include('dashboard.layouts.messages')
		<div class="card">
			<div class="card-header bg-primary text-white header-elements-sm-inline" >
				<h5 class="card-title"> @lang('settings.edit_setting_details') </h5>
				<div class="header-elements">
					<div class="d-flex justify-content-between">
						<div class="list-icons ml-3">
							<a class="list-icons-item" data-action="collapse"></a>
							<a class="list-icons-item" data-action="reload"></a>
							<a class="list-icons-item" data-action="remove"></a>
						</div>
					</div>
				</div>
			</div>
			<form action="{{ route('dashboard.settings.update' ) }}" method='POST' enctype="multipart/form-data" > 		@method('PATCH')
				@csrf
				<div class="card-body">


					<fieldset class="mb-3">
						<legend class="text-uppercase font-size-sm font-weight-bold">@lang('settings.settings_details')</legend>
						<div class="form-group row">
							
							<div class="col-md-6">
								<div  class='mb-2' >
									<label class="col-form-label"> @lang('settings.address_ar') </label>
									<input type="text" class="form-control @error('address.ar') is-invalid @enderror" name="address[ar]" value="{{ $info->getTranslation('address' , 'ar') }}" >
									@error('address.ar')
									<p  class='text-danger' >  {{ $message }} </p>
									@enderror
								</div>
							</div>			
							<div class="col-md-6">
								<div  class='mb-2' >
									<label class="col-form-label"> @lang('settings.address_en') </label>
									<input type="text" class="form-control @error('address.en') is-invalid @enderror" name="address[en]" value="{{ $info->getTranslation('address' , 'en') }}" >
									@error('address.en')
									<p  class='text-danger' >  {{ $message }} </p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div  class='mb-2' >
									<label class="col-form-label"> @lang('settings.email') </label>
									<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $info->email }}" >
									@error('email')
									<p  class='text-danger' >  {{ $message }} </p>
									@enderror
								</div>
							</div>

							<div class="col-md-4">
								<div  class='mb-2' >
									<label class="col-form-label"> @lang('settings.phone') </label>
									<input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $info->phone }}" >
									@error('phone')
									<p  class='text-danger' >  {{ $message }} </p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div  class='mb-2' >
									<label class="col-form-label"> @lang('settings.facebook') </label>
									<input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ $info->facebook }}" >
									@error('facebook')
									<p  class='text-danger' >  {{ $message }} </p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div  class='mb-2' >
									<label class="col-form-label"> حساب يوتيوب </label>
									<input type="text" class="form-control @error('youtube') is-invalid @enderror" name="youtube" value="{{ $info->youtube }}" >
									@error('youtube')
									<p  class='text-danger' >  {{ $message }} </p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div  class='mb-2' >
									<label class="col-form-label"> @lang('settings.instgrame') </label>
									<input type="text" class="form-control @error('instgrame') is-invalid @enderror" name="instgrame" value="{{ $info->instgrame }}" >
									@error('instgrame')
									<p  class='text-danger' >  {{ $message }} </p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div  class='mb-2' >
									<label class="col-form-label"> حساب تويتر </label>
									<input type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{ $info->twitter }}" >
									@error('twitter')
									<p  class='text-danger' >  {{ $message }} </p>
									@enderror
								</div>
							</div>

							<div class="col-md-3">
								<div  class='mb-2' >
									<label class="col-form-label"> قيمه النقاط بالقروش </label>
									<input type="text" class="form-control @error('points_money') is-invalid @enderror" name="points_money" value="{{ $info->points_money }}" >
									@error('points_money')
									<p  class='text-danger' >  {{ $message }} </p>
									@enderror
								</div>
							</div>

							<div class="col-md-3">
								<div  class='mb-2' >
									<label class="col-form-label"> الحد الادنى للنقاط للسحب </label>
									<input type="text" class="form-control @error('minimam_points_can_be_withdrawald') is-invalid @enderror" name="minimam_points_can_be_withdrawald" value="{{ $info->minimam_points_can_be_withdrawald }}" >
									@error('minimam_points_can_be_withdrawald')
									<p  class='text-danger' >  {{ $message }} </p>
									@enderror
								</div>
							</div>
							<div class="col-md-3">
								<div  class='mb-2' >
									<label class="col-form-label"> عدد الساعات قبل نزول ارباح المسوق </label>
									<input type="text" class="form-control @error('days_to_valid_marketer_money') is-invalid @enderror" name="days_to_valid_marketer_money" value="{{ $info->days_to_valid_marketer_money }}" >
									@error('days_to_valid_marketer_money')
									<p  class='text-danger' >  {{ $message }} </p>
									@enderror
								</div>
							</div>
							<div class="col-md-3">
								<div  class='mb-2' >
									<label class="col-form-label"> الحد الادنى لطلب سحب الارباح</label>
									<input type="text" class="form-control @error('minimam_money_can_be_withdrawald') is-invalid @enderror" name="minimam_money_can_be_withdrawald" value="{{ $info->minimam_money_can_be_withdrawald }}" >
									@error('minimam_money_can_be_withdrawald')
									<p  class='text-danger' >  {{ $message }} </p>
									@enderror
								</div>
							</div>

						</div>						
					</fieldset>
				</div>

				<div class="card-footer bg-white d-sm-flex justify-content-sm-between align-items-sm-center py-sm-2">
					<a href="{{ route('dashboard.settings.edit') }}" class="btn btn-outline-primary w-100 w-sm-auto"> @lang('dashboard.cancel') </a>
					<button type="submit" class="btn btn-primary mt-3 mt-sm-0 w-100 w-sm-auto"> @lang('dashboard.edit') </button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection


