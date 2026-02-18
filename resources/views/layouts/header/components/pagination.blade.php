@if(isset($items, $pagination))
<div class='custom-pagination'>
    <div class="pagination-info">
        Показано {{ $pagination['from'] }} - {{ $pagination['to'] }} из {{ $pagination['total'] }} {{ $itemsName ?? 'записей' }}
    </div>
    
    <div class="pagination-links">
        @if($pagination['current_page'] > 1)
            <a href="{{ $pagination['first_page_url'] }}" class="pagination-link first">&laquo;&laquo;</a>
            <a href="{{ $pagination['prev_page_url'] }}" class="pagination-link prev">&laquo;</a>
        @endif
        
        @for($i = max(1, $pagination['current_page'] - 2); $i <= min($pagination['last_page'], $pagination['current_page'] + 2); $i++)
            @if($i === $pagination['current_page'])
                <span class="pagination-link current">{{ $i }}</span>
            @else
                <a href="{{ $pagination['base_url'] }}?page={{ $i }}" class="pagination-link">{{ $i }}</a>
            @endif
        @endfor
        
        @if($pagination['current_page'] < $pagination['last_page'])
            <a href="{{ $pagination['next_page_url'] }}" class="pagination-link next">&raquo;</a>
            <a href="{{ $pagination['last_page_url'] }}" class="pagination-link last">&raquo;&raquo;</a>
        @endif
    </div>
</div>
@endif
