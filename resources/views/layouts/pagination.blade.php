@if ($paginator->hasPages())
    <ul class="pagination justify-content-sm-center">
        {{-- Previous Page Link --}}
        {{-- Previous Page Link --}}

        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><strong><span
                            class="iconify" data-icon="bi:arrow-left"></span>
                        Anterior</strong></a>
            </li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><strong><span
                            class="iconify" data-icon="bi:arrow-left"></span>
                        Anterior</strong></a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled"><a class="page-link"><strong>{{ $element }}</strong></a></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item disabled"><a class="page-link text-primary"
                                href="{{ $url }}"><strong>{{ $page }}</strong></a></li>
                        {{-- hide the last page number link --}}
                        {{-- @elseif ($page == $paginator->lastpage())
                        <li class="page-item disabled d-none"><a class="page-link"
                                href="{{ $url }}"><strong>{{ $page }}</strong></a></li> --}}
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"><strong>Siguiente <span
                            class="iconify" data-icon="bi:arrow-right"></span>
                    </strong></a></li>
        @else
            <li class="page-item disabled"><a class="page-link"><strong>Siguiente
                        <span class="iconify" data-icon="bi:arrow-right"></span></strong></a></li>
        @endif

        {{-- @if ($paginator->currentPage() < $paginator->lastPage() - 1)
            <li class="page-item"><a class="page-link"
                    href="{{ $paginator->url($paginator->lastPage()) }}"><strong>Ultima</strong>
        @endif --}}
    </ul>
@endif
