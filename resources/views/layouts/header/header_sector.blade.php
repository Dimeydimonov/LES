<div class='header-top'>
    <div class='container'>
        <div class='special-offers'>
            <a href="">Today's special Offers !</a>
        </div>
        
        <div class='search-bar'>
            <form action="{{ route('search') }}" method="get">
                <input type="text" name="query" placeholder="Search a product..." >
                <button type="submit"><i class='fa fa-search'></i></button>
            </form>


        </div>


        <noscript>
            <a href="{{ route('cart.view.get') }}" class="btn btn-primary btn-lg">
                <i class="fa fa-shopping-cart"></i>
                Cart



                @php
                    $cart = session('cart', 0);
					$cartCount = is_numeric($cart) ? (int) $cart : 0;
                @endphp

                <span class="cart-count {{ $cartCount > 0 ? 'cart-count-visible' : 'cart-count-hidden' }}">
    {{ $cartCount }}
</span>


            </a>
        </noscript>
        <button type="button" class="btn btn-primary btn-lg cart-button-hidden" onclick="openCartModal()">
            <i class="fa fa-shopping-cart"></i>
            Cart
{{--            <span class="cart-count {{ session('cart') && count(session('cart')) > null ? 'cart-count-visible' : 'cart-count-hidden' }}">{{ session('cart') ??( session('cart') < null) }}</span>--}}
        </button>
        <script>
            document.querySelector('.btn-primary.btn-lg[onclick="openCartModal()"]').classList.remove('cart-button-hidden');
        </script>


        <div class='user-menu'>
            <ul>
                <li class='dropdown profile-details-drop'>
                    <button type="button" class='dropdown-toggle' data-toggle="dropdown">
                        <i class='fa fa-user' aria-hidden="true"></i>
                        <span class='caret'></span>
                    </button>
                    <div class='mega-dropdown-menu'>
                        <div class='dropdown-content'>
                            <ul class='dropdown-menu drp-mnu'>
                                @auth
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class='logout-btn'>Logout</button>
                                        </form>
                                    </li>
                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('login') }}">Sign Up</a></li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        
        <div class='contact-info'>
            <h2><a href="mailto:store@grocery.com">Contact Us</a></h2>
        </div>
    </div>
</div>

<div class="header-main">
    <div class="container">
        <div class="site-logo">
            <h1><a href="{{ route('index') }}"><span>Grocery</span> Store</a></h1>
        </div>

        <div class="navigation-menu">
            <ul class="nav-links">
                <li><a href="#">Events</a><i>/</i></li>
                <li><a href="#">About Us</a><i>/</i></li>
                <li><a href="">Best Deals</a><i>/</i></li>
                <li><a href="#">Services</a></li>
                <li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
                <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> store@grocery.com</a></li>
            </ul>
        </div>

    </div>
</div>


