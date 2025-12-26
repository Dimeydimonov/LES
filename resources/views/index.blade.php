@extends('layouts.app')
@section('content')
	@include('layouts.header_sector')
	<div class="content">
		<div class="container">
			@include('layouts.inc.left_menu_sector')
			<div class="content-right">
				@include('layouts.right_sector')
				@include('layouts.product_sector')
			</div>
		</div>
	</div>
	@include('layouts.footer_sector')
@endsection
