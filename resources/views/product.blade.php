<link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
	<a href="{{ route('index') }}">Back to Home</a>
</div>