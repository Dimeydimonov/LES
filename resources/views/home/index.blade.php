@extends('layouts.app')
@section('content')
	@include('layouts.header.header_sector')
	<div class="content">
		<div class="container">
			@include('layouts.menu.left_menu_sector')
			<div class="content-right">
				@include('layouts.content.content_sector')
				@include('layouts.product.product_sector')
			</div>
		</div>
	</div>
	@include('layouts.footer.footer_sector')
@endsection
