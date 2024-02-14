@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

{{--<div>--}}
{{--    @if ($paginator->hasPages())--}}
{{--        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">--}}
{{--            <div class="flex justify-between flex-1 sm:hidden">--}}
{{--                <span>--}}
{{--                    @if ($paginator->onFirstPage())--}}
{{--                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md select-none">--}}
{{--                            {!! __('pagination.previous') !!}--}}
{{--                        </span>--}}
{{--                    @else--}}
{{--                        <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">--}}
{{--                            {!! __('pagination.previous') !!}--}}
{{--                        </button>--}}
{{--                    @endif--}}
{{--                </span>--}}

{{--                <span>--}}
{{--                    @if ($paginator->hasMorePages())--}}
{{--                        <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">--}}
{{--                            {!! __('pagination.next') !!}--}}
{{--                        </button>--}}
{{--                    @else--}}
{{--                        <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md select-none">--}}
{{--                            {!! __('pagination.next') !!}--}}
{{--                        </span>--}}
{{--                    @endif--}}
{{--                </span>--}}
{{--            </div>--}}

{{--            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">--}}
{{--                <div>--}}
{{--                    <p class="text-sm text-gray-700 leading-5">--}}
{{--                        <span>{!! __('Showing') !!}</span>--}}
{{--                        <span class="font-medium">{{ $paginator->firstItem() }}</span>--}}
{{--                        <span>{!! __('to') !!}</span>--}}
{{--                        <span class="font-medium">{{ $paginator->lastItem() }}</span>--}}
{{--                        <span>{!! __('of') !!}</span>--}}
{{--                        <span class="font-medium">{{ $paginator->total() }}</span>--}}
{{--                        <span>{!! __('results') !!}</span>--}}
{{--                    </p>--}}
{{--                </div>--}}

{{--                <div>--}}
{{--                    <span class="relative z-0 inline-flex rounded-md shadow-sm">--}}
{{--                        <span>--}}
{{--                            --}}{{-- Previous Page Link --}}
{{--                            @if ($paginator->onFirstPage())--}}
{{--                                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">--}}
{{--                                    <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5" aria-hidden="true">--}}
{{--                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">--}}
{{--                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />--}}
{{--                                        </svg>--}}
{{--                                    </span>--}}
{{--                                </span>--}}
{{--                            @else--}}
{{--                                <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">--}}
{{--                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">--}}
{{--                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />--}}
{{--                                    </svg>--}}
{{--                                </button>--}}
{{--                            @endif--}}
{{--                        </span>--}}

{{--                        --}}{{-- Pagination Elements --}}
{{--                        @foreach ($elements as $element)--}}
{{--                            --}}{{-- "Three Dots" Separator --}}
{{--                            @if (is_string($element))--}}
{{--                                <span aria-disabled="true">--}}
{{--                                    <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5 select-none">{{ $element }}</span>--}}
{{--                                </span>--}}
{{--                            @endif--}}

{{--                            --}}{{-- Array Of Links --}}
{{--                            @if (is_array($element))--}}
{{--                                @foreach ($element as $page => $url)--}}
{{--                                    <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">--}}
{{--                                        @if ($page == $paginator->currentPage())--}}
{{--                                            <span aria-current="page">--}}
{{--                                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 select-none">{{ $page }}</span>--}}
{{--                                            </span>--}}
{{--                                        @else--}}
{{--                                            <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">--}}
{{--                                                {{ $page }}--}}
{{--                                            </button>--}}
{{--                                        @endif--}}
{{--                                    </span>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                        @endforeach--}}

{{--                        <span>--}}
{{--                            --}}{{-- Next Page Link --}}
{{--                            @if ($paginator->hasMorePages())--}}
{{--                                <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">--}}
{{--                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">--}}
{{--                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />--}}
{{--                                    </svg>--}}
{{--                                </button>--}}
{{--                            @else--}}
{{--                                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">--}}
{{--                                    <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5" aria-hidden="true">--}}
{{--                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">--}}
{{--                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />--}}
{{--                                        </svg>--}}
{{--                                    </span>--}}
{{--                                </span>--}}
{{--                            @endif--}}
{{--                        </span>--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}
{{--    @endif--}}
{{--</div>--}}
@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex gap-2">
        <span>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button type="button" class="rounded-lg border px-3 py-2 bg-white font-semibold text-sm text-gray-700 hover:bg-gray-100 disabled:bg-gray-50 disabled:opacity-75 disabled:cursor-not-allowed disabled:text-gray-500" disabled>
                    Prev
                </button>
            @else
                @if(method_exists($paginator,'getCursorName'))
                    <button type="button" dusk="previousPage" wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->previousCursor()->encode() }}" wire:click="setPage('{{$paginator->previousCursor()->encode()}}','{{ $paginator->getCursorName() }}')" wire:loading.attr="disabled" class="rounded-lg border px-3 py-2 bg-white font-semibold text-sm text-gray-700 hover:bg-gray-100 disabled:bg-gray-50 disabled:opacity-75 disabled:cursor-not-allowed disabled:text-gray-500">
                        Prev
                    </button>
                @else
                    <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="rounded-lg border px-3 py-2 bg-white font-semibold text-sm text-gray-700 hover:bg-gray-100 disabled:bg-gray-50 disabled:opacity-75 disabled:cursor-not-allowed disabled:text-gray-500">
                        Prev
                    </button>
                @endif
            @endif
        </span>

        <span>
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                @if(method_exists($paginator,'getCursorName'))
                    <button type="button" dusk="nextPage" wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->nextCursor()->encode() }}" wire:click="setPage('{{$paginator->nextCursor()->encode()}}','{{ $paginator->getCursorName() }}')" wire:loading.attr="disabled" class="rounded-lg border px-3 py-2 bg-white font-semibold text-sm text-gray-700 hover:bg-gray-100 disabled:bg-gray-50 disabled:opacity-75 disabled:cursor-not-allowed disabled:text-gray-500">
                        Next
                    </button>
                @else
                    <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="rounded-lg border px-3 py-2 bg-white font-semibold text-sm text-gray-700 hover:bg-gray-100 disabled:bg-gray-50 disabled:opacity-75 disabled:cursor-not-allowed disabled:text-gray-500">
                        Next
                    </button>
                @endif
            @else
                <button type="button" class="rounded-lg border px-3 py-2 bg-white font-semibold text-sm text-gray-700 hover:bg-gray-100 disabled:bg-gray-50 disabled:opacity-75 disabled:cursor-not-allowed disabled:text-gray-500" disabled>
                    Next
                </button>
            @endif
        </span>
    </nav>
@endif
