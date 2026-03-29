@props([
'meta',
'params' => [],
'routeName' => null,
])

@php
    $resolvedRouteName = $routeName ?? request()->route()?->getName();
@endphp

@if ($meta['last_page'] > 1)

<div class="flex justify-center mt-6">
    <nav class="inline-flex -space-x-px rounded-md shadow-sm">
        @if ($meta['current_page'] > 1)
        <a href="{{ route($resolvedRouteName, [...$params, 'page' => $meta['current_page'] - 1]) }}" class="px-3 py-2 ml-0 rounded-l-md border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">
            <x-heroicon-o-arrow-left class="w-5 h-5" />
        </a>
        @else
        <span class="px-3 py-2 ml-0 rounded-l-md border border-gray-300 bg-white text-gray-400 opacity-50">
            <x-heroicon-o-arrow-left class="w-5 h-5" />
        </span>
        @endif


        @foreach ($meta['pages'] as $page)
        <a href="{{ route($resolvedRouteName, [...$params, 'page' => $page]) }}" class="px-3 py-2 border border-gray-300 {{ $meta['current_page'] === $page ? 'bg-blue-500 text-white' : 'bg-white text-gray-700 hover:bg-gray-50' }}">{{ $page }}</a>
        @endforeach

        @if ($meta['current_page'] < $meta['last_page'])
        <a href="{{ route($resolvedRouteName, [...$params, 'page' => $meta['current_page'] + 1]) }}" class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">
            <x-heroicon-o-arrow-right class="w-5 h-5" />
        </a>
        @else
        <span class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-400 opacity-50">
            <x-heroicon-o-arrow-right class="w-5 h-5" />
        </span>
        @endif
    </nav>
</div>

@endif
