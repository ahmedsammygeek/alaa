@php



$info = $orders = $returns =  $statistics = $challenges = $withdrawals = '';


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
	case 'challenges':
	case 'user_challenges':
		$challenges = 'active';		
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
		<a href="#" class="nav-link {{ $returns }} " >
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
		<a href="{{ route('dashboard.marketers.challenges' , $marketer ) }}" class="nav-link {{ $challenges }} " >
			<i class="icon-cart2"></i>
			التحديات			
		</a>
	</li>


	<li class="nav-item-divider"></li>
	<li class="nav-item">
		<a target="_blank" href="{{ route('dashboard.marketers.login' , $marketer ) }}" class="nav-link" >
			<i class="icon-switch2"></i>
			تسجيل الدخول باسم المسوق
		</a>
	</li>
</ul>