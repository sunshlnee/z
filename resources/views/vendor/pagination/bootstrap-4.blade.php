@if ($paginator->hasPages())
    {{-- НА САМОМ ДЕЛЕ ЭТО БУЛЬМА!!! --}}
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">

        {{-- Previous Page Link --}}

        @if ($paginator->onFirstPage())
            <a class="pagination-previous disabled" href="{{ $paginator->previousPageUrl() }}" aria-disabled="true" aria-label="@lang('pagination.previous')">Назад</a>
        @else
            <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Назад</a>
        @endif

        {{-- Next Page Link --}}

        @if ($paginator->hasMorePages())
            <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Дальше</a>
        @else
            <a class="pagination-next disabled" href="{{ $paginator->nextPageUrl() }}" aria-disabled="true" aria-label="@lang('pagination.next')">Дальше</a>
        @endif

        <ul class="pagination-list">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="pagination-ellipsis">&hellip;</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="pagination-link is-current">{{ $page }}</a></li>
                        @else
                            <li><a class="pagination-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </nav>
@endif
