<div class='products'>
	@if(isset($products) && $products->count())
		@foreach($products as $product)
			@include('layouts.product.product_card', ['product' => $product])
		@endforeach
	@else
		<p>Товары не найдены.</p>
	@endif
</div>

@if(isset($pagination))
	@include('layouts.footer.components.custom_pagination ', ['pagination' => $pagination])
@endif

