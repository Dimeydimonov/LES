<h3>Hot offers</h3>
<div class="agile_top_brands_grids">
	@if(isset($products) && $products->count())
		@foreach($products as $product)
			<div class="col-md-3 top_brand_left">
				<div class="hover14 column">
					<x-product-card :product="$product" />
				</div>
			</div>
		@endforeach
	@else
		<p>Товары не найдены.</p>
	@endif
	<div class="clearfix"></div>
</div>
@if(isset($products) && $products->hasPages())
	<div class="pagination">
		{{ $products->links() }}
	</div>
@endif