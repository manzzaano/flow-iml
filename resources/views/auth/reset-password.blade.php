<x-guest-layout>
    <div class="mb-10 text-center">
        <h2 class="text-3xl font-black tracking-tighter uppercase text-white">Restaurar</h2>
        <p class="text-[10px] uppercase tracking-[0.4em] text-indigo-400 font-bold mt-2">Nueva Clave de Seguridad</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <x-input-label for="email" value="Confirmar Identidad" />
            <x-text-input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" value="Nueva Clave de Seguridad" />
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" value="Confirmar Nueva Clave" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-4">
            <x-primary-button>
                Actualizar Protocolo
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
