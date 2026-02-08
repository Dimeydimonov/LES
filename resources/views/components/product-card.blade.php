<div class="agile_top_brand_left_grid">
    @if($product->is_offer)
        <div class="tag"><img src="/images/tag.png" alt=" " class="img-responsive"></div>
    @endif
    <div class="agile_top_brand_left_grid1">
        <figure>
            <div class="snipcart-item block">
                <div class="snipcart-thumb">
                    <a href="{{ route("product.show", $product->id) }}">
                        @if($product->img)
                            <img title="{{ $product->title }}" alt="{{ $product->title }}" src="{{ asset($product->img) }}">
                        @else
                            <img title="{{ $product->title }}" alt="{{ $product->title }}" src="/images/1.jpg">
                        @endif
                    </a>		
                    <p>{{ $product->title }}</p>
                    <h4>
                        ${{ number_format($product->price, 2) }}
                        @if($product->old_price)
                            <span>${{ number_format($product->old_price, 2) }}</span>
                        @endif
                    </h4>
                </div>
                <div class="snipcart-details top_brand_home_details">
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
        </figure>
    </div>
</div>
