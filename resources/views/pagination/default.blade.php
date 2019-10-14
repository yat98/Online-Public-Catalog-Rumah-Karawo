@if ($paginator->hasPages())

<nav aria-label="navigation">
    <ul class="pagination justify-content-end mt-50">
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="page-item disabled"><span class="page-link">{{ str_pad($element,2,'0',STR_PAD_LEFT).'.' }}</span>
        </li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item active"><span class="page-link">{{ str_pad($page,2,'0',STR_PAD_LEFT).'.' }}</span></li>
        @else
        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ str_pad($page,2,'0',STR_PAD_LEFT).'.' }}</a>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach
    </ul>
</nav>
@endif