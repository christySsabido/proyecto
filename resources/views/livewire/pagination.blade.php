<div>
@if ($paginator->hasPages())
    <ul class="flex justify-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true">
                <span class="border rounded px-3 py-2 opacity-50 cursor-not-allowed">&lsaquo;</span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="border rounded px-3 py-2 hover:bg-gray-200">&lsaquo;</a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="border rounded px-3 py-2 hover:bg-gray-200">&rsaquo;</a>
            </li>
        @else
            <li class="disabled" aria-disabled="true">
                <span class="border rounded px-3 py-2 opacity-50 cursor-not-allowed">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif

</div>
