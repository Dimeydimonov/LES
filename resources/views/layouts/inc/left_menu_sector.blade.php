@php use App\Components\MenuWidget; @endphp
<div class="content-left">
    <h3>{{__('left-menu.Category')}}</h3>
    <ul class="categories">
        @php
            MenuWidget::Widget([
				'tpl' => 'layouts.inc.left_menu_sector',
			]);
        @endphp
    </ul>


</div>