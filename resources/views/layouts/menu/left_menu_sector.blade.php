@php use App\Components\MenuWidget; @endphp
<div class="content-left">
    <ul class="categories">
        @php
            MenuWidget::Widget([
                'tpl' => 'layouts.widgets.menu-tpl',
            ]);
        @endphp
    </ul>
</div>