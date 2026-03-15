@props([
    'title',
    'points' => 0,
    'priority' => 'medium', // low, medium, high, urgent
    'id' => null, // Para construir la URL más adelante
])

@php
    // Mapeo de colores para la prioridad (sutiles y funcionales)
    $priorityColors = [
        'low' => 'bg-blue-500 shadow-[0_0_8px_rgba(59,130,246,0.5)]',
        'medium' => 'bg-yellow-500 shadow-[0_0_8px_rgba(234,179,8,0.5)]',
        'high' => 'bg-orange-500 shadow-[0_0_8px_rgba(249,115,22,0.5)]',
        'urgent' => 'bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.5)]',
    ];
    $priorityColor = $priorityColors[$priority] ?? $priorityColors['medium'];
@endphp

<div
    {{ $attributes->merge(['class' => 'p-6 rounded-3xl bg-white/[0.02] border border-white/5 flex items-center justify-between group hover:bg-white/[0.04] hover:border-white/10 transition-all duration-300 relative overflow-hidden']) }}>

    <div
        class="absolute -bottom-10 -right-10 w-32 h-32 bg-[#00FFAB]/3 blur-[50px] rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
    </div>

    <div class="flex items-center space-x-4 relative z-10">
        <div class="w-2.5 h-2.5 rounded-full {{ $priorityColor }}" title="Prioridad: {{ ucfirst($priority) }}"></div>

        <div>
            <h4 class="text-white/80 font-medium group-hover:text-[#00FFAB] transition-colors">
                {{ $title }}
            </h4>
            <p class="text-xs text-white/20 mt-1.5 font-light tracking-wide">
                Estimación: <span class="font-medium text-white/40">{{ $points }} Story Points</span>
            </p>
        </div>
    </div>

    <a href="{{ route('tasks.show', $id) }}"
        class="px-5 py-2.5 rounded-xl bg-[#00FFAB]/10 text-[#00FFAB] text-xs font-bold hover:bg-[#00FFAB] hover:text-[#0D1117] transition-all relative z-10 shadow-[inset_0_0_10px_rgba(0,255,171,0.1)] hover:shadow-none">
        Detalles
    </a>
</div>
