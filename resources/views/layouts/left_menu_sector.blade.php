@php use App\Components\MenuWidget; @endphp
<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
	<ul class="nav navbar-nav nav_1">
		@php
			$categories = \App\Models\Category::whereNull('parent_id')->get();
		@endphp
		@foreach($categories as $category)
			@if($category->children->count() > 0)
				<li class="dropdown mega-dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $category->title }}<span class="caret"></span></a>				
					<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
						<div class="w3ls_vegetables">
							<ul>	
								@foreach($category->children as $child)
									<li><a href="#">{{ $child->title }}</a></li>
								@endforeach
							</ul>
						</div>                  
					</div>				
				</li>
			@else
				<li><a href="#">{{ $category->title }}</a></li>
			@endif
		@endforeach
	</ul>
</div>
