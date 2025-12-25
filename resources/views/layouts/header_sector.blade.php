<div class="header">
	<div class="container">
		<div class="banner">
			<div class="banner-info">
				<h3>{{ __('header.menu1') }}</h3>
				<a href="#" class="btn btn-primary">{{ __('header.menu2') }}</a>
			</div>
		</div>

		<div class="logo">
			<h1><a href="#"><span>Grocery</span> Store <i class="fa fa-shopping-basket"></i></a></h1>
		</div>

		<div class="header-search">
			<form action="#" method="post">
				<input type="search" placeholder="{{ __('header.menu3') }}" required="">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>

		@auth
			<form method="POST" action="{{ route('logout') }}" class="d-inline">
				@csrf
				<button type="submit" class="button">{{ __('Logout') }}</button>
			</form>
		@else
			<a href="{{ route('login') }}" class="button">{{ __('header.menu4') }}</a>
		@endauth

	<div class="lang-switcher">
		<a href="{{ route('lang.switch', 'en') }}"
		   class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">EN</a> |
		<a href="{{ route('lang.switch', 'uk') }}"
		   class="{{ app()->getLocale() == 'uk' ? 'active' : '' }}">UA</a> |
		<a href="{{ route('lang.switch', 'ru') }}"
		   class="{{ app()->getLocale() == 'ru' ? 'active' : '' }}">RU</a>
	</div>
	</div>
</div>
<div class="nav">
	<li><a href="{{route('home')}}" class="active">{{ __('header.menu5') }}</a></li>
	<li><a href="#">{{ __('header.menu_6') }}</a></li>
	<li><a href="#">{{ __('header.menu_7') }}</a></li>
	<li><a href="#">{{ __('header.menu_8') }}</a></li>
	<li><a href="#">{{ __('header.menu_9') }}</a></li>
	<li><i class="fa fa-phone" aria-hidden="true"></i> (+0123) 234 567</li>
	<li><i class="fa fa-envelope" aria-hidden="true"></i> store@grocery.com</li>
</div>

