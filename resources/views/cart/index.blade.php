@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="section-title">Shopping Cart</h1>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(!empty($cartItems))
                <div class="cart-page">
                    <div class="cart-items">
                        @foreach($cartItems as $item)
                            <div class="cart-item">
                                <div class="cart-item-image">
                                    <img src="{{ $item['image'] ?? asset('images/1.jpg') }}" alt="{{ $item['name'] }}">
                                </div>
                                <div class="cart-item-info">
                                    <h5 class="cart-item-name">{{ $item['name'] }}</h5>
                                    <div class="cart-item-details">
                                        <span class="cart-item-price">
                                            @if(!empty($item['old_price']) && $item['old_price'] > $item['price'])
                                                <span class="cart-old-price">${{ number_format($item['old_price'], 2) }}</span>
                                            @endif
                                            ${{ number_format($item['price'], 2) }}
                                        </span>
                                        <span class="cart-item-quantity">× {{ $item['quantity'] }}</span>
                                    </div>
                                </div>
                                <div class="cart-item-actions">
                                    <span class="cart-item-total">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                    <form action="{{ route('cart.remove') }}" method="post" class="cart-remove-form">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                        <button type="submit" class="btn btn-sm btn-danger btn-remove-from-cart" data-product-id="{{ $item['product_id'] }}">
                                            <i class="fa fa-trash"></i> Remove
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="cart-summary">
                        <div class="cart-summary-row cart-total">
                            <strong>Total:</strong>
                            <strong>${{ number_format($total, 2) }}</strong>
                        </div>
                        <div class="cart-actions">
                            <a href="{{ route('home') }}" class="btn btn-outline-primary">Continue Shopping</a>
                            <button class="btn btn-primary">Checkout</button>
                        </div>
                    </div>
                </div>
            @else
                <div class="cart-empty">
                    <div class="cart-icon cart-icon-large"></div>
                    <h3>Your cart is empty</h3>
                    <p>Looks like you haven't added any products to your cart yet.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
