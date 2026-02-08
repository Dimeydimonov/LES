@extends("layouts.app")
@section("content")
	@include("layouts.header_sector")
	<div class="content">
		<div class="container">
			@include("layouts.left_menu_sector")
			<div class="content-right">
				@include("layouts.hot_offers_sector")
			</div>
		</div>
	</div>
	@include("layouts.footer_sector")
@endsection
