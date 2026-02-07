<div class="product-card">
	<div class="product-image">
		<a href="{{ route('product.show', $product->id) }}">
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
			<a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a>
		</h4>
		<div class="product-price">
			<p>
				@if($product->old_price)
					<span>${{ number_format($product->old_price, 2) }}</span>
				@endif
				${{ number_format($product->price, 2) }}
			</p>
		</div>
		</div>
</div>
