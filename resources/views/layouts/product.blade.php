@extends('layouts.app')
@section('content')
	@include('layouts.header_sector')
	<div class="content">
		<div class="container">
			@include('layouts.left_menu_sector')
			<div class="product">
				<h1>{{ ($product->title) }} </h1>
				<h2>Category - {{ ($product->category->title) }}</h2>
				<img src="{{ asset($product->img) }}" alt="{{ $product->title }}">
				<h3>{{ $product->content }}</h3>
				<p>{{ $product->description }}</p>
				<p>Price: ${{ $product->price }}</p>
				<p>Old Price: ${{ $product->old_price }}</p>
				<p>Keywords: {{ $product->keywords }}</p>
				<p>Is Offer: {{ $product->is_offer }}</p>
			</div>
			<div class="products">
				@if(isset($products) && $products->count())
					@foreach($products as $product)
						<x-product-card :product="$product" />
					@endforeach
				@endif
			</div>
		</div>
	</div>
	@include('layouts.footer_sector')
@endsection




