<x-guest-layout>
    <div class="absolute top-6 left-6">
        <a href="{{ route('login') }}"
            class="group flex items-center gap-2 text-[10px] uppercase tracking-widest font-black text-zinc-500 hover:text-white transition-colors">
            <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Volver
        </a>
    </div>

    <div class="mb-8 text-center">
        <h2 class="text-3xl font-black tracking-tighter uppercase text-white">Recuperación</h2>
        <p class="text-[10px] uppercase tracking-[0.4em] text-indigo-400 font-bold mt-2">Protocolo de Restauración</p>
    </div>

    <div class="mb-6 p-4 bg-indigo-500/5 border border-indigo-500/10 rounded-xl">
        <p class="text-xs leading-relaxed text-zinc-400">
            // Introduce tu dirección de enlace para recibir un token de acceso temporal y restaurar tu clave de
            seguridad.
        </p>
    </div>

    <x-auth-session-status class="mb-4 font-bold text-xs" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <div>
            <x-input-label for="email" value="Email de Enlace" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                placeholder="operador@flow.iml" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="pt-2">
            <x-primary-button>
                Enviar Token de Acceso
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
