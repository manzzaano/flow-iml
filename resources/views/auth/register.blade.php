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
        <h2 class="text-3xl font-black tracking-tighter uppercase text-white">Registro</h2>
        <p class="text-[10px] uppercase tracking-[0.4em] text-indigo-400 font-bold mt-2">Nuevo Operador Flow</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="name" value="Nombre Completo" />
            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
                autocomplete="name" placeholder="Ej. Ismael Manzano" />
            <x-input-error :messages="$errors->get('name')" class="mt-1 font-bold" />
        </div>

        <div>
            <x-input-label for="email" value="Email de Enlace" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required
                autocomplete="username" placeholder="operador@flow.iml" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 font-bold" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <x-input-label for="password" value="Contraseña" />
                <x-text-input id="password" type="password" name="password" required autocomplete="new-password"
                    placeholder="••••••••" />
            </div>
            <div>
                <x-input-label for="password_confirmation" value="Confirmar" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password" placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="col-span-1 sm:col-span-2 mt-1 font-bold" />
        </div>

        <div class="pt-4 space-y-4 text-center">
            <x-primary-button>
                Crear Nuevo Registro
            </x-primary-button>

            <p class="text-[10px] uppercase tracking-widest text-zinc-600 font-bold">
                ¿Operador existente?
                <a href="{{ route('login') }}" class="text-indigo-500 hover:text-white transition-colors ml-1">Iniciar
                    Sesión</a>
            </p>
        </div>
    </form>
</x-guest-layout>
