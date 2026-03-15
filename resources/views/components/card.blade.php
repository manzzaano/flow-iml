@props(['title' => null, 'subtitle' => null])

<div
    {{ $attributes->merge(['class' => 'relative overflow-hidden rounded-3xl bg-white/[0.02] backdrop-blur-md border border-white/5 p-6 transition-all duration-300 hover:bg-white/[0.04] hover:border-white/10 group']) }}>

    <div class="absolute -top-px left-0 right-0 h-px bg-gradient-to-r from-transparent via-white/10 to-transparent">
    </div>

    @if ($title || $subtitle)
        <div class="mb-4">
            @if ($title)
                <h3
                    class="text-white/90 font-semibold text-lg tracking-tight group-hover:text-[#00FFAB] transition-colors">
                    {{ $title }}
                </h3>
            @endif

            @if ($subtitle)
                <p class="text-white/30 text-xs font-medium uppercase tracking-widest mt-0.5">
                    {{ $subtitle }}
                </p>
            @endif
        </div>
    @endif

    <div class="relative z-10">
        {{ $slot }}
    </div>

    <div
        class="absolute -bottom-10 -right-10 w-32 h-32 bg-[#00FFAB]/5 blur-[50px] rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-500">
    </div>
</div>
