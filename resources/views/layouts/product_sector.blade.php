<block class="hot_offers"> <div class="text">Hot offers</div></block>

<menu class="products">
	@if(isset($products) && $products->count())
		@foreach($products as $product)
			<div class="product-card">
				<a href="{{ route('product.show', $product->id) }}">
				@if($product->img)
					<img src="{{ asset($product->img) }}" alt="{{ $product->title }}">
				@endif
				<h4>{{ $product->title }}</h4>
				<p>
					@if($product->old_price)
						<span>${{ number_format($product->old_price, 2) }}</span>
					@endif
					${{ number_format($product->price, 2) }}
				</p>
			</div>
		@endforeach
	@else
		<p>Товары не найдены.</p>
	@endif
</menu>
<div class="pagination">
@if($products->hasPages())
		{{ $products->links() }}
@endif
</div>