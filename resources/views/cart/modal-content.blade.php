<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@if(empty($cart_items))
	<div class="cart-empty">
		<div class="cart-icon cart-icon-large"></div>
		<p>Ваша корзина пуста</p>
	</div>
@else
	<table class="cart-items">
		<thead>
		<th>Фото</th>
		<th>Описание</th>
		<th>Старая цена</th>
		<th>Актуальная цена</th>
		<th>Количество</th>
		<th>Сумма</th>
		<th>
		</th>
		</thead>
		<tbody>
		@foreach($cart_items as $item)
			<td class="cart-item-image">  @if($item['image'])
					<img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}">
				@else
					<div class="no-image">
						<i class="fa fa-image"></i>
					</div>
				@endif
			</td>
			<td class="cart-item-details">
				{{ $item['name'] }}
			</td>
			<td class="cart-item-price">
				@if($item['old_price'])
					<span class="old-price">{{ number_format($item['old_price'], 2) }}</span>
				@endif
			</td>
            <td class="cart-item-price"><span class="current-price">
                    {{ number_format($item['price'], 2) }}</span>
            </td>
            <td class="cart-item-quantity">
				{{ $item['quantity'] }}
			</td>
			<td class="cart-item-total">
				{{ number_format($item['price'] * $item['quantity'], 2) }}
			</td>

			<td>
				<button class="btn-remove-from-cart" data-product-id="{{ $item['product_id'] }}">
					<i class="fa fa-trash"></i>
				</button>
			</td>
        </tbody>

		@endforeach
	</table>

	<div class="cart-summary">
		<div class="cart-total">
			<strong>Общая сума: {{ number_format($total , 2)}} Грн</strong>
		</div>
	</div>
@endif
