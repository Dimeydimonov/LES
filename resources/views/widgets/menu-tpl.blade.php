@foreach($data as $category)
	<li class="{{ request('category') === $category['id'] ? 'active' : '' }}">
		<a href="{{ route('index', ['category' => $category['id']]) }}">
			{{ $category['title'] }}
		</a>
		@if(isset($category['childs']))
			<ul class="submenu">
				@include('widgets.menu-tpl', ['data' => $category['childs']])
			</ul>
		@endif
	</li>
@endforeach
{{--нет глубины рекурсии, будет отрисосовать всю таблицу --}}