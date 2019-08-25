<div class="row">
    @if ($elements->hasPages())
        <div class="col-sm-5 col-md-5">
            <div class="dataTables_info">
                Showing {{ $elements->firstItem() }} to {{ $elements->lastItem() }} of {{ $elements->total() }} entries
            </div>
        </div>
        <div class="col-sm-7 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers">
                <ul class="pagination pull-right">
                    {{-- Previous Page Link --}}
                    <li class="paginate_button previous {{ $elements->onFirstPage() ? 'disabled' : '' }}">
                        <a href="{{ $elements->onFirstPage() ? '#' : $elements->previousPageUrl() }}">Previous</a>
                    </li>
                    @php
                    $pages = $elements->getUrlRange($elements->currentPage() - 2, $elements->currentPage()+2); @endphp
                    @foreach ($pages as $page => $url)
                        @if ($page < 1 ) @continue; @endif
                        <li class="paginate_button {{ $page === $elements->currentPage() ? 'active' : '' }}">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                        @if($page > $elements->lastPage()) @break; @endif

                    @endforeach
                    {{-- Next Page Link --}}
                    <li class="paginate_button next">
                        <a href="{{ $elements->hasMorePages() ? $elements->nextPageUrl() : '#' }}">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    @endif
</div>
