@php



$info = $orders = $returns = $statistics = $withdrawals = '';


switch (request()->segment(5)) {
	case null:
		$info = 'active';		
	break;
	case 'orders':
		$orders = 'active';		
	break;
	case 'returns':
		$returns = 'active';		
	break;
	case 'statistics':
		$statistics = 'active';		
	break;
	case 'withdrawals':
		$withdrawals = 'active';		
	break;

	default:
				
	break;
}	

@endphp

<ul class="nav nav-sidebar">
	<li class="nav-item">
		<a href="{{ route('dashboard.marketers.show' , $marketer ) }}" class="nav-link {{ $info }} "  >
			<i class="icon-user"></i>
			البيانات الاساسيه
		</a>
	</li>
	<li class="nav-item">
		<a href="{{ route('dashboard.marketers.orders' , $marketer ) }}" class="nav-link {{ $orders }} " >
			<i class="icon-cart2"></i>
			الطلبات
			<span class="badge badge-dark badge-pill ml-auto"> {{ $marketer->orders()->count() }} </span>
		</a>
	</li>

	<li class="nav-item">
		<a href="{{ route('dashboard.marketers.returns' , $marketer ) }}" class="nav-link {{ $returns }} " >
			<i class="icon-cart2"></i>
			المرتجعات
			<span class="badge badge-dark badge-pill ml-auto">16</span>
		</a>
	</li>


	<li class="nav-item">
		<a href="{{ route('dashboard.marketers.statistics' , $marketer ) }}" class="nav-link {{ $statistics }} " >
			<i class="icon-cart2"></i>
			الاحصائيات
			
		</a>
	</li>

	<li class="nav-item">
		<a href="{{ route('dashboard.marketers.withdrawals' , $marketer ) }}" class="nav-link {{ $withdrawals }} " >
			<i class="icon-cart2"></i>
			طلبات سحب الارباح
			
		</a>
	</li>

	<li class="nav-item">
		<a href="#schedule" class="nav-link" data-toggle="tab">
			<i class="icon-calendar3"></i>
			Schedule
			<span class="font-size-sm line-height-sm font-weight-normal opacity-75 ml-auto">02:56pm</span>
		</a>
	</li>
	<li class="nav-item">
		<a href="#inbox" class="nav-link" data-toggle="tab">
			<i class="icon-envelop2"></i>
			Inbox
			<span class="badge badge-dark badge-pill ml-auto">29</span>
		</a>
	</li>

	<li class="nav-item-divider"></li>
	<li class="nav-item">
		<a href="login_advanced.html" class="nav-link" data-toggle="tab">
			<i class="icon-switch2"></i>
			Logout
		</a>
	</li>
</ul>