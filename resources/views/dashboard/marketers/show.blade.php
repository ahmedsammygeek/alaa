@extends('dashboard.layouts.master')

@section('page_title')
عرض بيانات المسوق
@endsection

@section('page_header')
<a href="{{ route('dashboard.marketers.index') }}" class="breadcrumb-item"><i class="icon-users4  mr-2"></i> المسوقين </a>
<span class="breadcrumb-item active"> عرض بيانات المسوق </span>

@endsection
@section('page_content')
<div class="d-lg-flex align-items-lg-start">

	<!-- Left sidebar component -->
	<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left wmin-300 border-0 shadow-none sidebar-expand-lg">

		<!-- Sidebar content -->
		<div class="sidebar-content">
			<div class="card">
				<div class="card-body text-center">
					<div class="card-img-actions d-inline-block mb-3">
						<img class="img-fluid img-thumbnail" src="{{ Storage::url('users/'.$marketer->image) }}" width="170" height="170" alt="">

					</div>

					<h6 class="font-weight-semibold mb-0"> {{ $marketer->name }} </h6>
					<span class="d-block opacity-75"> مسوق </span>
				</div>

				@include('dashboard.marketers.sidebar')
			</div>
		</div>
	</div>

	<div class="tab-content flex-1">
		<div class="tab-pane fade active show" id="profile">
			<div class="card">
				<div class="card-header bg-primary text-white header-elements-sm-inline" >
					<h5 class="card-title"> بيانات المسوق الاساسيه </h5>
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
					<table class="table table-bordered table-hover">
						<tbody>
							<tr>
								<th> @lang('admins.created') </th>
								<td> {{ $marketer->created_at->diffForHumans() }} </td>
							</tr>
							<tr>
								<th> @lang('admins.status') </th>
								<td>
									@switch($marketer->active)
									@case(1)
									<span  class='badge badge-success'> @lang('admins.active') </span>
									@break
									@case(0)
									<span  class='badge badge-danger'> @lang('admins.inactive') </span>
									@break
									@endswitch
								</td>
							</tr>
							<tr>
								<th> @lang('admins.name') </th>
								<td> {{ $marketer->name }} </td>
							</tr>
							<tr>
								<th> @lang('admins.email') </th>
								<td> {{ $marketer->email }} </td>
							</tr>
							
						</tbody>
					</table>

				</div>



			</div>
		</div>

	</div>
</div>
@endsection


@section('scripts')
@endsection


