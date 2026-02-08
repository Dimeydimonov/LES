@if ($paginator->hasPages())
    <div class="custom-pagination">
        @if ($paginator->onFirstPage())
            <span class="disabled">← Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}">← Previous</a>
        @endif

        @foreach ($paginator->elements() as $element)
            @if (is_string($element))
                <span>{{ $element }}</span>
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">Next →</a>
        @else
            <span class="disabled">Next →</span>
        @endif
    </div>
@endif
