@extends('layouts.app')
@section('title', $product->title)
@section('content')
	@include('layouts.header.header_sector')
	
	<div class="product-detail-container">
		<div class="container">
			<div class="row">
				<!-- Left Column - Product Image -->
				<div class="col-md-6">
					<div class="product-image-section">
						<div class="main-product-image">
							@if($product->img)
								<img src="{{ asset($product->img) }}" alt="{{ $product->title }}">
							@else
								<img src="{{ asset('images/1.jpg') }}" alt="{{ $product->title }}">
							@endif
						</div>
					</div>
				</div>
				
				<!-- Right Column - Product Info -->
				<div class="col-md-6">
					<div class="product-info-section">
						<h1 class="product-title">{{ $product->title }}</h1>
						
						<div class="product-price-section">
							@if($product->old_price)
								<span class="old-price">${{ number_format($product->old_price, 2) }}</span>
							@endif
							<span class="current-price">${{ number_format($product->price, 2) }}</span>
						</div>
						
						<div class="product-description">
							<p>{{ $product->description ?? 'Fresh and high-quality product carefully selected for our customers.' }}</p>
						</div>
						
						<div class="purchase-section">
							<form action="{{ route('cart.add') }}" method="post" class="add-to-cart-form">
								@csrf
								<input type="hidden" name="product_id" value="{{ $product->id }}">
								<input type="hidden" name="product_name" value="{{ $product->title }}">
								<input type="hidden" name="amount" value="{{ $product->price }}">
								<input type="hidden" name="old_price" value="{{ $product->old_price ?? '' }}">
								<input type="hidden" name="image" value="{{ asset($product->img ?? 'images/1.jpg') }}">
								<input type="hidden" name="quantity" value="1">
								<button type="submit" class="add-to-cart-btn">
									<i class="fa fa-shopping-cart"></i>
									Add to Cart
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	@include('layouts.discounts.hot_offers_sector')
	@include('layouts.footer.footer_sector')
@endsection
