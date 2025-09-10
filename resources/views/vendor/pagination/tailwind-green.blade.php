@if ($paginator->hasPages())
    <nav class="d-flex justify-content-center mt-3">
        <ul class="pagination pagination-sm">
            {{-- Tombol Sebelumnya --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link">←</span></li>
            @else
                <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link">←</a></li>
            @endif

            {{-- Nomor Halaman --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Selanjutnya --}}
            @if ($paginator->hasMorePages())
                <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link">→</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">→</span></li>
            @endif
        </ul>
    </nav>
@endif
