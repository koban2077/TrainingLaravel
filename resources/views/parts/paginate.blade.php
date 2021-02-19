@if ($paginator->hasPages())

    <nav aria-label="...">
        <ul class="pagination">

            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" tabindex="-1">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only"></span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only"></span>
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())

                            <li class="page-item active">
                                <a class="page-link" href="#">{{ $page }}
                                    <span class="sr-only">{{ $page }}</span></a>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                        <i class="fa fa-angle-right"></i>
                        <span class="sr-only"></span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link">
                        <i class="fa fa-angle-right"></i>
                        <span class="sr-only"></span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
