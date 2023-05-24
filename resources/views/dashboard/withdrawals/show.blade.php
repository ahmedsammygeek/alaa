@extends('dashboard.layouts.master')

@section('page_title')
بيانات طلب السحب
@endsection

@section('page_header')
<a href="{{ route('dashboard.withdrawals.index') }}" class="breadcrumb-item"><i class="icon-equalizer   mr-2"></i> 
	طلبات السحب
</a>
<span class="breadcrumb-item active"> بيانات طلب السحب  </span>

@endsection
@section('page_content')

<div class="row">
	<div class="col-md-12 float-left">
		<a href="{{ route('dashboard.withdrawals.approve' , $withdrawal ) }}" class='btn btn-success' > الموافقه على الطلب </a>
		<a href="{{ route('dashboard.withdrawals.deny' , $withdrawal ) }}" class='btn btn-danger' >  رفض الطلب </a>
	</div>
	
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header bg-primary text-white header-elements-sm-inline" >
				<h5 class="card-title"> بيانات طلب السحب </h5>
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

			<div class="card-body">
				<table class="table table-bwithdrawaled table-hover">
					<tbody>
						<tr>
							<th> @lang('categories.created_at') </th>
							<td> {{ $withdrawal->created_at->diffForHumans() }} -- {{ $withdrawal->created_at }} </td>
						</tr>
						<tr>
							<th> رقم الطلب </th>
							<td> {{ $withdrawal->number }} </td>
						</tr>
						<tr>
							<th> حاله الطلب   </th>
							<td> 
								@switch($withdrawal->status)
								@case(1)
								<span class='badge badge-success' > قيد المراجعه </span>
								@break
								@case(2)
								<span class='badge badge-success' > قيد التنفيذ </span>
								@break
								@case(3)
								<span class='badge badge-success' > تم الموافقه </span>
								@break
								@case(4)
								<span class='badge badge-success' > تم الرفض </span>
								@break
								@endswitch
							</td>
						</tr>
							{{-- <tr>
								<th> تعديل حاله الطلب   </th>
								<td> 
									<form  action="{{ route('dashboard.withdrawals.update' , $withdrawal ) }}" method='POST' >
										@csrf
										@method('PATCH')
										<select onchange="this.form.submit()" class='form-control' name="status_id" id="">
											<option value="1" {{ $withdrawal->status == 1 ? 'selected="selected"' : '' }} >قيد المراجعه  </option>
											<option value="2" {{ $withdrawal->status == 2 ? 'selected="selected"' : '' }} >قيد التنفيذ  </option>
											<option value="3" {{ $withdrawal->status == 3 ? 'selected="selected"' : '' }} >تم الموافقه  </option>
											<option value="4" {{ $withdrawal->status == 4 ? 'selected="selected"' : '' }} > تم الرفض </option>
										</select>
									</form>
								</td>
							</tr> --}}

							<tr>
								<th> المبلغ </th>
								<td> {{ $withdrawal->amount }} جنيه </td>
							</tr>
							<tr>
								<th> المستخدم  </th>
								<td> {{ $withdrawal->user?->name }} </td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endsection


	@section('scripts')
	@endsection


