@if(empty($cart_items))
    <div class="cart-empty">
        <i class="fa fa-shopping-cart" style="font-size: 48px; color: #ccc; margin-bottom: 15px;"></i>
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
                    <button class="btn-remove-from-cart" data-product-id="{{ $item['product_id'] }}" style="background: none; border: none; color: #dc3545; cursor: pointer; margin-left: 10px;">
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

<style>
.cart-empty {
    text-align: center;
    padding: 40px 20px;
    color: #666;
}

.cart-items {
    margin-bottom: 20px;
}

.cart-item {
    display: flex;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #eee;
}

.cart-item:last-child {
    border-bottom: none;
}

.cart-item-image {
    width: 60px;
    height: 60px;
    margin-right: 15px;
    flex-shrink: 0;
}

.cart-item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 4px;
}

.no-image {
    width: 100%;
    height: 100%;
    background-color: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ccc;
    border-radius: 4px;
}

.cart-item-details {
    flex-grow: 1;
}

.cart-item-details h4 {
    margin: 0 0 5px 0;
    font-size: 14px;
    color: #333;
}

.cart-item-price {
    margin-bottom: 5px;
}

.old-price {
    text-decoration: line-through;
    color: #999;
    font-size: 12px;
}

.current-price {
    font-weight: bold;
    color: #28a745;
}

.cart-item-quantity {
    font-size: 12px;
    color: #666;
}

.cart-item-total {
    text-align: right;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: flex-end;
}

.cart-summary {
    padding-top: 15px;
    border-top: 2px solid #eee;
    text-align: right;
}

.cart-total {
    font-size: 18px;
    color: #333;
}

.btn-remove-from-cart:hover {
    color: #c82333 !important;
}
</style>
