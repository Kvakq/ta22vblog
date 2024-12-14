@if ($paginator->hasPages())
    <nav style="margin: 30px">
        <ul class="pagination flex justify-center space-x-4 mt-6">
            
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled">
                    <span class="btn btn-outline btn-primary rounded-md px-4 py-2 cursor-not-allowed">@lang('pagination.previous')</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn btn-outline btn-primary rounded-md px-4 py-2">@lang('pagination.previous')</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn btn-outline btn-primary rounded-md px-4 py-2">@lang('pagination.next')</a>
                </li>
            @else
                <li class="disabled">
                    <span class="btn btn-outline btn-primary rounded-md px-4 py-2 cursor-not-allowed">@lang('pagination.next')</span>
                </li>
            @endif

        </ul>
    </nav>
@endif
