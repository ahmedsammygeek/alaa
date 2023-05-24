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
			<form action="{{ route('dashboard.products.variations.store' , $product ) }}" method='POST' enctype="multipart/form-data" > 
				@csrf
				<div class="card-body">

					<div class="tab-content">
						<div class="tab-pane fade show active" id="solid-justified-tab1">
							<fieldset class="mb-3">
								<div>
									<button class='btn btn-success add_new_row '> إضافه جديد  </button>
								</div>

								<div class="row main_rows">

									<div class="row main_row" >
										<div class="col-md-2">
											<div class='mb-2' >
												<div class="form-group">
													<label class="col-form-label"> اللون </label>
													<input type="text" class="form-control @error('name.*') is-invalid @enderror" name="name[]" value="{{ old('name.*') }}" >
													@error('name.*')
													<p  class='text-danger' >  {{ $message }} </p>
													@enderror
												</div>
											</div>
										</div>

										<div class="col-md-2">
											<div  class='mb-2' >
												<div class="form-group">
													<label class="col-form-label"> المقاس </label>
													<select name="sizes[]" class="form-control" id="">
														@foreach ($sizes as $size)
														<option value="{{ $size->id }}"> {{ $size->name }} </option>
														@endforeach
													</select>
												</div>
											</div>
										</div>

										<div class="col-md-2">
											<div class='mb-2' >
												<div class="form-group">
													<label class="col-form-label"> السعر </label>
													<input type="text" class="form-control @error('price.*') is-invalid @enderror" name="price[]" value="{{ old('price.*') }}" >
													@error('price.*')
													<p  class='text-danger' >  {{ $message }} </p>
													@enderror
												</div>
											</div>
										</div>

										<div class="col-md-2">
											<div class='mb-2' >
												<div class="form-group">
													<label class="col-form-label"> البار كود </label>
													<input type="text" class="form-control @error('barcode.*') is-invalid @enderror" name="barcode[]" value="{{ old('barcode.*') }}" >
													@error('barcode.*')
													<p  class='text-danger' >  {{ $message }} </p>
													@enderror
												</div>
											</div>
										</div>

										<div class="col-md-2">
											<div class='mb-2' >
												<div class="form-group">
													<label class="col-form-label"> الصوره </label>
													<input type="file" class="form-control @error('image.*') is-invalid @enderror" name="image[]" value="{{ old('image.*') }}" >
													@error('image.*')
													<p  class='text-danger' >  {{ $message }} </p>
													@enderror
												</div>
											</div>
										</div>



										<div class="col-md-2 mt-4">
											<div class="form-group ">
												<label  class="col-form-label">  </label>
												<a class=' btn btn-danger btn-sm' wire:click.prevent='deleteRow(1)' > حذف </a>
											</div>
										</div>
									</div>
									
								</div>
								
							</fieldset>
						</div>
					</div>
				</div>

				<div class="card-footer bg-white d-sm-flex justify-content-sm-between align-items-sm-center py-sm-2">
					<a href="{{ route('dashboard.products.index') }}" class="btn btn-outline-primary w-100 w-sm-auto"> @lang('dashboard.cancel') </a>
					<button type="submit" class="btn btn-primary mt-3 mt-sm-0 w-100 w-sm-auto"> @lang('dashboard.add') </button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

@section('scripts')

<script>
	$(function() {

		

		$('button.add_new_row').on('click',  function(event) {
			event.preventDefault();	
			$.ajax({
				url: '{{ route('dashboard.get_new_varition_main_row') }}',
				type: 'POST',
				dataType: 'html',
				data: {_token: "{{ csrf_token() }}" ,  },
			})
			.done(function(data) {
				$(document).find('div.main_rows').find('div.main_row').last().after(data);
			})
			.fail(function() {
				console.log("error");
			});

		});

		});
	</script>

	@endsection