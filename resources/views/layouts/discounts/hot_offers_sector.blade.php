<div class='hot_offers'>
	<div class='text'>Hot Offers</div>
	<div class='products'>
		@if(isset($hotProducts) && count($hotProducts))
			@foreach($hotProducts as $product)
				<div class="product-card">
					<div class="product-image">
						<a href="{{ route('products.show', $product->id) }}">
							@if($product->img)
								<img src="{{ asset($product->img) }}" alt="{{ $product->title }}">
							@else
								<img src="{{ asset('images/1.jpg') }}" alt="{{ $product->title }}">
							@endif
							@if($product->is_offer)
								<div class="offer-badge">
									<img src="{{ asset('images/offer.png') }}" alt="Offer">
								</div>
							@endif
						</a>
					</div>
					<div class="product-info">
						<h4 class="product-title">
							<a href="{{ route('products.show', $product->id) }}">{{ $product->title }}</a>
						</h4>
						<div class="product-price">
							<p>
								@if($product->old_price)
									<span class="product-old-price">${{ number_format($product->old_price, 2) }}</span>
								@endif
								<span class="product-current-price">${{ number_format($product->price, 2) }}</span>
							</p>
						</div>
						<div class="product-actions">
							<form action="{{ route('cart.add') }}" method="post" class="add-to-cart-form" data-js-enhanced="false">
								@csrf
								<input type="hidden" name="product_id" value="{{ $product->id }}">
								<input type="hidden" name="product_name" value="{{ $product->title }}">
								<input type="hidden" name="amount" value="{{ $product->price }}">
								<input type="hidden" name="old_price" value="{{ $product->old_price ?? '' }}">
								<input type="hidden" name="image" value="{{ asset($product->img ?? 'images/1.jpg') }}">
								<button type="submit" class="btn-add-to-cart">
									<div class="cart-icon"></div>
									Add to Cart
								</button>
							</form>
						</div>
					</div>
				</div>
			@endforeach
		@else
			<p>Товары не найдены.</p>
		@endif
	</div>
	@if(isset($hotPagination))
		@include('layouts.footer.components.custom_pagination', ['pagination' => $hotPagination, 'itemsName' => 'горячих предложений'])
	@endif
</div>
