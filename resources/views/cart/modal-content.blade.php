<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@if(empty($cart_items))
    <div class="cart-empty">
        <div class="cart-icon cart-icon-large"></div>
        <p>Your cart is empty</p>
    </div>
@else
    <div class="cart-items">
        @foreach($cart_items as $item)
            <div class="cart-item">
                <div class="cart-item-image">
                    @if($item['image'])
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}">
                    @else
                        <div class="no-image">
                            <i class="fa fa-image"></i>
                        </div>
                    @endif
                </div>
                <div class="cart-item-details">
                    <h4>{{ $item['name'] }}</h4>
                    <div class="cart-item-price">
                        @if($item['old_price'])
                            <span class="old-price">${{ number_format($item['old_price'], 2) }}</span>
                        @endif
                        <span class="current-price">${{ number_format($item['price'], 2) }}</span>
                    </div>
                    <div class="cart-item-quantity">
                        Quantity: {{ $item['quantity'] }}
                    </div>
                </div>
                <div class="cart-item-total">
                    ${{ number_format($item['price'] * $item['quantity'], 2) }}
                    <button class="btn-remove-from-cart" data-product-id="{{ $item['product_id'] }}">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="cart-summary">
        <div class="cart-total">
            <strong>Total: ${{ number_format($total, 2) }}</strong>
        </div>
    </div>
@endif
