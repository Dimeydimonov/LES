<h3>Hot offers</h3>
@if(isset($products) && $products->count())
	<!-- Первый товар справа от меню -->
	<div class="featured-product">
		<div class="hover14 column">
			<x-product-card :product="$products->first()" />
		</div>
	</div>
	
	<!-- Остальные товары внизу -->
	@if($products->count() > 1)
		<div class="other-products">
			<h4>Другие товары</h4>
			<div class="agile_top_brands_grids">
				@foreach($products->slice(1) as $product)
					<div class="col-md-3 top_brand_left">
						<div class="hover14 column">
							<x-product-card :product="$product" />
						</div>
					</div>
				@endforeach
				<div class="clearfix"></div>
			</div>
		</div>
	@endif
@else
	<p>Товары не найдены.</p>
@endif
@if(isset($products) && $products->hasPages())
	<div class="pagination">
		{{ $products->links() }}
	</div>
@endif