@if ($paginator->hasPages())
    <ul class="pagination-list list-unstyled d-flex" role="navigation">
             {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pagination-list-item active" aria-current="page"><span class="pagination-list-item__link is-active">{{ $page }}</span></li>
                    @else
                        <li class="pagination-list-item"><a class="pagination-list-item__link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="pagination-next ml-4">
                <a class="pagination-next__link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Следующая </a>
            </li>
        @else
            <li class="pagination-next ml-4 disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="pagination-next__link" aria-hidden="true">Следующая </span>
            </li>
        @endif

@endif
