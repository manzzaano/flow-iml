@props(['term', 'category' => 'General', 'example' => null])

<div
    {{ $attributes->merge(['class' => 'relative overflow-hidden rounded-2xl bg-white/[0.03] backdrop-blur-md border border-white/5 p-5 group hover:bg-white/[0.06] transition-all duration-300']) }}>

    <div
        class="absolute left-0 top-0 bottom-0 w-1 bg-gradient-to-b from-[#00FFAB] to-transparent opacity-50 group-hover:opacity-100 transition-opacity">
    </div>

    <div class="flex flex-col space-y-3">
        <div class="flex justify-between items-start">
            <span class="text-[10px] uppercase tracking-[0.2em] font-bold text-[#00FFAB]/60">
                {{ $category }}
            </span>
            <svg class="w-4 h-4 text-white/10 group-hover:text-[#00FFAB]/40 transition-colors" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="padding-left: 12px; 9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
            </svg>
        </div>

        <h4 class="text-lg font-semibold text-white group-hover:text-[#00FFAB] transition-colors leading-tight">
            {{ $term }}
        </h4>

        <div class="text-sm text-white/50 leading-relaxed font-light">
            {{ $slot }}
        </div>

        @if ($example)
            <div class="mt-2 p-3 rounded-xl bg-[#00FFAB]/5 border border-[#00FFAB]/10">
                <p class="text-[11px] text-[#00FFAB]/80 italic">
                    <span class="font-bold uppercase not-italic mr-1">Ejemplo:</span> {{ $example }}
                </p>
            </div>
        @endif
    </div>
</div>
