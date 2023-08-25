@extends('dashboard.layouts.master')

@section('page_title')
{{ trans('products.add_new_product') }}
@endsection

@section('page_header')
<a href="{{ route('dashboard.products.index') }}" class="breadcrumb-item"><i class="icon-ampersand  mr-2"></i> @lang('products.products')</a>
<span class="breadcrumb-item active"> @lang('products.add_new_product') </span>
@endsection

@section('page_content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			
			<div class="card-header bg-primary text-white header-elements-sm-inline" >
				<h5 class="card-title"> @lang('products.add_new_product') </h5>
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
			<form action="{{ route('dashboard.products.store') }}" method='POST' enctype="multipart/form-data" > 
				@csrf
				<div class="card-body">

					<div class="tab-content">
						<div class="tab-pane fade show active" id="solid-justified-tab1">
							<fieldset class="mb-3">
								<div class="form-group row">


									<div class="col-md-3">
										<div  class='mb-2' >
											<label class="col-form-label"> الدوله </label>
											<select class='form-control' name="country_id" id="">
												@foreach ($countries as $country)
												<option value="{{ $country->id }}"> {{ $country->name }} </option>
												@endforeach
											</select>
											@error('image')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>

									<div class="col-md-2">
										<div  class='mb-2' >
											<label class="col-form-label"> الحد الادنى للتنبيه عند الوصول </label>
											<input type="text" value='0' name="minimam_stock_alert" class="form-control @error('minimam_stock_alert') is-invalid @enderror " >
											@error('minimam_stock_alert')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>



									<div class="col-md-3">
										<div  class='mb-2' >
											<label class="col-form-label"> @lang('products.image') </label>
											<input type="file" name="image" class="form-control @error('image') is-invalid @enderror " >
											@error('image')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>
									<div class="col-md-3">
										<div  class='mb-2' >
											<label class="col-form-label"> @lang('products.images') </label>
											<input type="file" name="images[]" multiple='multiple' class="form-control @error('images') is-invalid @enderror " >
											@error('images')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>


									<div class="col-md-6">
										<div  class='mb-2' >
											<label class="col-form-label"> اسم المنتج بالعربيه </label>
											<input type="text" class="form-control @error('name.ar') is-invalid @enderror" name="name[ar]" value="{{ old('name.ar') }}" >
											@error('name.ar')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>
									<div class="col-md-6">
										<div  class='mb-2' >
											<label class="col-form-label"> اسم المنتج بالانجليزيه </label>
											<input type="text" class="form-control @error('name.en') is-invalid @enderror" name="name[en]" value="{{ old('name.en') }}" >
											@error('name.en')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>
									

									<div class="col-md-3">
										<div  class='mb-2' >
											<label class="col-form-label"> @lang('products.category') </label>
											<select name="category_id" id="select1" class="form-control ">

												@foreach ($categories as $category)
												<option value="{{ $category->id }}">{{ $category->name }}</option>
												@endforeach
											</select>
											@error('category_id')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>
									


									<div class="col-md-3">
										<div  class='mb-2' >
											<label class="col-form-label"> @lang('products.brand') </label>
											<select name="brand_id" id="select5" class="form-control " >
												<option value=""></option>
												@foreach ($brands as $brand)
												<option value="{{ $brand->id }}">{{ $brand->name }}</option>
												@endforeach
											</select>
											@error('brand_id')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>

									<div class="col-md-2">
										<div  class='mb-2' >
											<label class="col-form-label"> البارد كود </label>
											<input type="text" name="barcode" class="form-control @error('barcode') is-invalid @enderror " >
											@error('barcode')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>
									<div class="col-md-2">
										<div  class='mb-2' >
											<label class="col-form-label"> عدد النقاط </label>
											<input type="text" name="points" class="form-control @error('points') is-invalid @enderror " >
											@error('points')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>
									<div class="col-md-2">
										<div  class='mb-2' >
											<label class="col-form-label"> الحد الادنى للبيع بالجمله </label>
											<input type="text" name="minimam_gomla_number" class="form-control @error('minimam_gomla_number') is-invalid @enderror " >
											@error('minimam_gomla_number')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>




									<div class="col-md-6">
										<div  class='mb-2' >
											<label class="col-form-label">وصف بسيط للمنتج بالعربيه</label>
											<textarea name="mini_description[ar]"  class="form-control" rows="3" > {{ old('mini_description.ar') }} </textarea>
											@error('mini_description.ar')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>

									<div class="col-md-6">
										<div  class='mb-2' >
											<label class="col-form-label">وصف بسيط للمنتج بالانجليزيه </label>
											<textarea name="mini_description[en]"  class="form-control" rows="3" > {{ old('mini_description.en') }} </textarea>
											@error('mini_description.en')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>

									<div class="col-md-12">
										<div  class='mb-2' >
											<label class="col-form-label"> وصف تفصيلى للمنتج بالعربيه </label>
											<textarea name="description[ar]"  class="editor form-control" rows="3" > {{ old('description.ar') }} </textarea>
											@error('description.ar')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>

									<div class="col-md-12">
										<div  class='mb-2' >
											<label class="col-form-label"> وصف تفصيلى للمنتج بالانجليزيه </label>
											<textarea name="description[en]"  class="editor form-control" rows="3" > {{ old('description.en') }} </textarea>
											@error('description.en')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>

									<div class="col-md-2">
										<div  class='mb-2' >
											<label class="col-form-label"> سعر المنتج </label>
											<input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" >
											@error('price')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>
									<div class="col-md-2">
										<div  class='mb-2' >
											<label class="col-form-label"> السعر بعد الخصم </label>
											<input type="text" class="form-control @error('price_after_discount') is-invalid @enderror" name="price_after_discount" value="{{ old('price_after_discount') }}" >
											@error('price_after_discount')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>
									<div class="col-md-2">
										<div  class='mb-2' >
											<label class="col-form-label"> نسبه الخصم </label>
											<input type="text" class="form-control @error('discount_percentage') is-invalid @enderror" name="discount_percentage" value="{{ old('discount_percentage') }}" >
											@error('discount_percentage')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>
									<div class="col-md-2">
										<div  class='mb-2' >
											<label class="col-form-label"> مبلغ المسوق </label>
											<input type="text" class="form-control @error('marketer_price') is-invalid @enderror" name="marketer_price" value="{{ old('marketer_price') }}" >
											@error('marketer_price')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>
									<div class="col-md-2">
										<div  class='mb-2' >
											<label class="col-form-label"> المبلغ الموصى بيه للبيع (الادنى) </label>
											<input type="number" class="form-control @error('min_price') is-invalid @enderror" name="min_price" value="{{ old('min_price') }}" >
											@error('min_price')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>
									<div class="col-md-2">
										<div  class='mb-2' >
											<label class="col-form-label">  المبلغ الموصى بيه للبيع (الاعلى) </label>
											<input type="number" class="form-control @error('max_price') is-invalid @enderror" name="max_price" value="{{ old('max_price') }}" >
											@error('max_price')
											<p  class='text-danger' >  {{ $message }} </p>
											@enderror
										</div>
									</div>




								</div>			
							</fieldset>
						</div>
					</div>
				</div>

				<div class="card-footer bg-white ">
					<a href="{{ route('dashboard.products.index') }}" class="btn btn-outline-primary w-100 w-sm-auto"> @lang('dashboard.cancel') </a>
					<button type="submit" name='add' class="btn btn-primary mr-2 mt-sm-0 w-100 w-sm-auto" style="float: left;"> @lang('dashboard.add') </button>
					<button type="submit" name='add_variations' class="btn btn-primary mr-2 mt-sm-0 w-100 w-sm-auto" style="float: left;"> حفظ و إضافه متغيرات </button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

@section('scripts')

<script src="{{ Storage::url('dashboard_assets/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/ic4s7prz04qh4jzykmzgizzo1lize2ckglkcjr9ci9sgkbuc/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
	$(function() {

		tinymce.init({
			selector: 'textarea.editor',
			plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
			toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
		});


	});
</script>

@endsection