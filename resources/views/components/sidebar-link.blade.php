@props(['href', 'icon', 'active' => false])

@php
    // Clases base para el enlace
    $classes = 'flex items-center px-4 py-3 rounded-xl transition-all duration-200 group relative overflow-hidden';

    // Clases según el estado activo
    $classes .= $active
        ? ' bg-[#00FFAB]/10 text-[#00FFAB] shadow-[inset_0_0_10px_rgba(0,255,171,0.1)]'
        : ' text-white/50 hover:text-[#00FFAB] hover:bg-white/[0.03]';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    @if ($active)
        <div class="absolute left-0 top-1/4 bottom-1/4 w-1 bg-[#00FFAB] rounded-full shadow-[0_0_10px_#00FFAB]"></div>
    @endif

    <div class="flex-shrink-0 w-5 h-5 mr-3 transition-transform duration-200 group-hover:scale-110">
        @switch($icon)
            @case('home')
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            @break

            @case('briefcase')
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            @break

            @case('cpu')
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                </svg>
            @break

            @case('book')
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            @break
        @endswitch
    </div>

    <span class="text-sm font-medium tracking-wide">{{ $slot }}</span>
</a>
