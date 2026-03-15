@props([
    'role',
    'name',
    'status' => 'idle', // idle, thinking, active
    'avatar' => null,
])

@php
    $roleConfig = [
        'po' => ['label' => 'Product Owner', 'color' => 'text-blue-400', 'bg' => 'bg-blue-500/10'],
        'sm' => ['label' => 'Scrum Master', 'color' => 'text-purple-400', 'bg' => 'bg-purple-500/10'],
        'tl' => ['label' => 'Tech Lead', 'color' => 'text-[#00FFAB]', 'bg' => 'bg-[#00FFAB]/10'],
    ];

    $config = $roleConfig[$role] ?? $roleConfig['po'];

    $statusClasses = [
        'idle' => 'bg-white/20',
        'active' => 'bg-[#00FFAB] shadow-[0_0_8px_#00FFAB]',
        'thinking' => 'bg-[#00FFAB] animate-pulse shadow-[0_0_12px_#00FFAB]',
    ];
@endphp

<div
    {{ $attributes->merge(['class' => 'relative p-5 rounded-3xl bg-white/[0.02] border border-white/5 backdrop-blur-md hover:bg-white/[0.05] transition-all duration-300 group']) }}>

    <div class="flex items-center space-x-4">
        <div class="relative">
            <div
                class="w-14 h-14 rounded-2xl {{ $config['bg'] }} border border-white/5 flex items-center justify-center overflow-hidden">
                @if ($avatar)
                    <img src="{{ $avatar }}" alt="{{ $name }}"
                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                @else
                    <span class="{{ $config['color'] }} font-bold text-lg uppercase">{{ substr($role, 0, 2) }}</span>
                @endif
            </div>
            <div
                class="absolute -bottom-1 -right-1 w-4 h-4 rounded-full border-4 border-[#0D1117] {{ $statusClasses[$status] ?? $statusClasses['idle'] }}">
            </div>
        </div>

        <div class="flex-1">
            <div class="flex items-center justify-between">
                <span class="text-[10px] font-bold uppercase tracking-widest {{ $config['color'] }} opacity-80">
                    {{ $config['label'] }}
                </span>
            </div>
            <h4 class="text-white font-semibold text-base group-hover:text-white transition-colors">
                {{ $name }}
            </h4>
            <p class="text-xs text-white/30 font-light mt-0.5 capitalize">
                Status:
                {{ $status === 'thinking' ? 'Analizando...' : ($status === 'active' ? 'En línea' : 'En reposo') }}
            </p>
        </div>
    </div>

    <button
        class="mt-4 w-full py-2 rounded-xl bg-white/[0.03] border border-white/5 text-white/40 text-[10px] font-bold uppercase tracking-widest hover:bg-[#00FFAB]/10 hover:text-[#00FFAB] hover:border-[#00FFAB]/20 transition-all">
        Consultar Agente
    </button>
</div>
