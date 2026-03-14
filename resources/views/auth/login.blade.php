<x-guest-layout>
    <div class="absolute top-6 left-6">
        <a href="/"
            class="group flex items-center gap-2 text-[10px] uppercase tracking-widest font-black text-zinc-500 hover:text-white transition-colors">
            <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Volver
        </a>
    </div>

    <div class="mb-10 text-center">
        <h2 class="text-3xl font-black tracking-tighter uppercase text-white">Acceso</h2>
        <p class="text-[10px] uppercase tracking-[0.4em] text-indigo-400 font-bold mt-2">Protocolo de Identificación</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <x-input-label for="email" value="ID de Operador" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                placeholder="usuario@flow.iml" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <div class="flex justify-between items-center mb-2">
                <x-input-label for="password" value="Clave de Seguridad" class="mb-0" />
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-[9px] uppercase tracking-widest font-bold text-zinc-600 hover:text-indigo-400 transition-colors">
                        ¿Recuperar clave?
                    </a>
                @endif
            </div>
            <x-text-input id="password" type="password" name="password" required placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center">
            <label class="flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" name="remember"
                    class="w-4 h-4 rounded border-zinc-800 bg-black text-indigo-600 focus:ring-offset-0 focus:ring-indigo-500 transition-all">
                <span
                    class="ms-2 text-[10px] uppercase tracking-widest text-zinc-500 font-bold group-hover:text-zinc-300">Sesión
                    Persistente</span>
            </label>
        </div>

        <x-primary-button>
            Autenticar Operador
        </x-primary-button>

        <div class="text-center pt-4">
            <p class="text-[10px] uppercase tracking-widest text-zinc-600 font-bold">
                ¿Nuevo en el sistema?
                <a href="{{ route('register') }}" class="text-indigo-500 hover:text-white transition-colors ml-1">Crear
                    Registro</a>
            </p>
        </div>
    </form>
</x-guest-layout>
