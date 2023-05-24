@extends('dashboard.layouts.master')

@section('page_title')
عرض كافه المسوقيين
@endsection

@section('page_header')
<span class="breadcrumb-item active"> عرض كافه المسوقيين </span>

@endsection

@section('page_content')

<div class="row">
	<div class="col-md-12">
		<a href="{{ route('dashboard.marketers.create') }}" class="btn btn-primary float-right "><i class="icon-user-plus  mr-2 "></i> إضافه مسوق جديد  </a>
	</div>
	<hr>
	<br>
	<div class="col-md-12">
		@include('dashboard.layouts.messages')
		@livewire('dashboard.marketers.list-all-markters')
	</div>
</div>
@endsection


@section('scripts')
<script src="{{ Storage::url('dashboard_assets/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ Storage::url('dashboard_assets/global_assets/js/demo_pages/table_elements.js') }}"></script>
@endsection


