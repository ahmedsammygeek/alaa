@if (session('success'))
<div class="alert bg-primary text-white alert-styled-left alert-dismissible">
	<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
	<span class="font-weight-semibold">  {{ session('success') }} </span>
</div>
@endif


@if (session('error'))
<div class="alert bg-danger text-white alert-styled-left alert-dismissible">
	<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
	<span class="font-weight-semibold">  {{ session('error') }} </span>
</div>
@endif