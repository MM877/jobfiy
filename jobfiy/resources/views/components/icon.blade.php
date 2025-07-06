@props(['name', 'class' => 'w-6 h-6'])

@switch($name)
    @case('mail')
        <svg xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge(['class' => $class]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h.01M12 12h.01M8 12h.01M21 16.5a2.5 2.5 0 01-2.5 2.5H5.5A2.5 2.5 0 013 16.5v-9A2.5 2.5 0 015.5 5h13A2.5 2.5 0 0121 7.5v9z" />
        </svg>
        @break

    @case('phone')
        <svg xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge(['class' => $class]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h2l3.6 7.59-1.35 2.45A1 1 0 008 17h10v-2H9.42a.5.5 0 01-.42-.75l.94-1.68h7.45a1 1 0 00.96-.74l3.58-12.1A.75.75 0 0021.75 0H6a1 1 0 00-1 1v2a1 1 0 001 1h1" />
        </svg>
        @break

    @case('map-pin')
        <svg xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge(['class' => $class]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.656 0 3-1.567 3-3.5S13.656 4 12 4 9 5.567 9 7.5 10.344 11 12 11zm0 10c-4.418 0-8-4.03-8-9a8 8 0 1116 0c0 4.97-3.582 9-8 9z" />
        </svg>
        @break

    @case('globe')
        <svg xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge(['class' => $class]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 1c1.105 0 2 .895 2 2s-.895 2-2 2-2-.895-2-2 .895-2 2-2zm1 16.938V18h-2v1.938A8.001 8.001 0 014.062 13H6v-2H4.062A8.001 8.001 0 0111 3.062V6h2V3.062A8.001 8.001 0 0119.938 11H18v2h1.938A8.001 8.001 0 0113 19.938z" />
        </svg>
        @break

    @default
        <!-- fallback icon -->
        <svg xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge(['class' => $class]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" />
        </svg>
@endswitch
