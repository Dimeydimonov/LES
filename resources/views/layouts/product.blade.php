@extends("layouts.app")
@section("content")
	@include("layouts.header_sector")
	
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<!-- Collect the nav links, forms, and other content for toggling -->
				@include("layouts.left_menu_sector")
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
			<div class="product-detail">
				@if(isset($product))
					<div class="col-md-6">
						<div class="product-image">
							@if($product->img)
								<img src="{{ asset($product->img) }}" alt="{{ $product->title }}" class="img-responsive">
							@else
								<img src="/images/1.jpg" alt="{{ $product->title }}" class="img-responsive">
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-info">
							<h3>{{ $product->title }}</h3>
							<h4>
								${{ number_format($product->price, 2) }}
								@if($product->old_price)
									<span>${{ number_format($product->old_price, 2) }}</span>
								@endif
							</h4>
							<p>{{ $product->description ?? 'Описание товара отсутствует' }}</p>
							<div class="product-actions">
								<form action="#" method="post">
									<fieldset>
										<input type="hidden" name="product_id" value="{{ $product->id }}">
										<input type="hidden" name="product_name" value="{{ $product->title }}">
										<input type="hidden" name="amount" value="{{ $product->price }}">
										@if($product->old_price)
											<input type="hidden" name="discount_amount" value="{{ $product->old_price - $product->price }}">
										@endif
										<input type="submit" name="submit" value="Add to cart" class="button">
									</fieldset>
								</form>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				@else
					<p>Товар не найден.</p>
				@endif
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	
	<!-- Похожие товары -->
	@if(isset($products) && $products->count())
		<div class="top-brands">
			<div class="container">
				<h3>Похожие товары</h3>
				<div class="agile_top_brands_grids">
					@foreach($products as $related_product)
						<div class="col-md-3 top_brand_left">
							<div class="hover14 column">
								<x-product-card :product="$related_product" />
							</div>
						</div>
					@endforeach
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	@endif
	
	@include("layouts.footer_sector")
@endsection




