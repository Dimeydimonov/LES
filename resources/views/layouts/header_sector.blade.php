<!-- header -->
<div class="agileits_header">
	<div class="w3l_offers">
		<a href="{{ route("products.index") }}">Today"s special Offers !</a>
	</div>
	<div class="w3l_search">
		<form action="{{ route("search") }}" method="get">
			<input type="text" name="query" value="Search a product..." onfocus="this.value = "";" onblur="if (this.value == "") {this.value = "Search a product...";}" required="">
			<input type="submit" value=" ">
		</form>
	</div>
	<div class="product_list_header">  
		<form action="#" method="post" class="last">
            <fieldset>
                <input type="hidden" name="cmd" value="_cart" />
                <input type="hidden" name="display" value="1" />
                <input type="submit" name="submit" value="View your cart" class="button" />
            </fieldset>
        </form>
	</div>
	<div class="w3l_header_right">
		<ul>
			<li class="dropdown profile_details_drop">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
				<div class="mega-dropdown-menu">
					<div class="w3ls_vegetables">
						<ul class="dropdown-menu drp-mnu">
							@auth
								<li><form method="POST" action="{{ route("logout") }}">
									@csrf
									<button type="submit" style="background:none;border:none;color:inherit;padding:0;">Logout</button>
								</form></li>
							@else
								<li><a href="{{ route("login") }}">Login</a></li> 
								<li><a href="{{ route("login") }}">Sign Up</a></li>
							@endauth
						</ul>
					</div>                  
				</div>	
			</li>
		</ul>
	</div>
	<div class="w3l_header_right1">
		<h2><a href="mailto:store@grocery.com">Contact Us</a></h2>
	</div>
	<div class="clearfix"> </div>
</div>

<div class="logo_products">
	<div class="container">
		<div class="w3ls_logo_products_left">
			<h1><a href="{{ route("index") }}"><span>Grocery</span> Store</a></h1>
		</div>
		<div class="w3ls_logo_products_left1">
			<ul class="special_items">
				<li><a href="#">Events</a><i>/</i></li>
				<li><a href="#">About Us</a><i>/</i></li>
				<li><a href="{{ route("products.index") }}">Best Deals</a><i>/</i></li>
				<li><a href="#">Services</a></li>
			</ul>
		</div>
		<div class="w3ls_logo_products_left1">
			<ul class="phone_email">
				<li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
				<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a></li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //header -->
