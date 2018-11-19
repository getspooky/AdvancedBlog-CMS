@if ($paginator->hasPages())


    <nav class="pagination is-rounded is-centered" role="navigation" aria-label="pagination">

        <a href="{{ $paginator->previousPageUrl() }}" class="pagination-previous {{ $paginator->onFirstPage() ? 'is-disabled' : '' }}">Previous</a>

            <ul class="pagination-list">
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))

                    <li><a class="pagination-link" aria-label="Goto page 1">{{ $element }}</a></li>

                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li><a class="pagination-link is-current" aria-label="Page 46" aria-current="page">{{ $page }}</a></li>
                            @else
                                <li class="pagination-link"><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif

                 @endforeach

            </ul>

            {{-- Next Page Link --}}
           <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next {{ $paginator->hasMorePages() ? ' ' : 'is-disabled' }}">Next page</a>


    </nav>


@endif
