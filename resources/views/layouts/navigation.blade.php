<nav x-data="{ open: false }" class="bg-black border-b border-zinc-900 shrink-0 h-16 flex items-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex justify-between h-full items-center">
        <div class="flex items-center gap-8 h-full">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 group">
                <div class="bg-indigo-600 p-1 rounded shadow-lg shadow-indigo-500/20 group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="font-black text-lg tracking-tighter uppercase text-white">Flow</span>
            </a>

            <div class="hidden sm:flex h-full gap-1">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="h-full px-4 border-b-2 text-[10px] uppercase tracking-widest font-black transition-all">
                    {{ __('Control Center') }}
                </x-nav-link>
            </div>
        </div>

        <div class="hidden sm:flex items-center">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex items-center gap-3 px-3 py-1.5 rounded-lg border border-zinc-800 hover:bg-zinc-900 transition-all">
                        <div class="w-6 h-6 rounded bg-indigo-500/10 flex items-center justify-center border border-indigo-500/20">
                            <span class="text-[10px] font-black text-indigo-400">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                        <div class="text-[10px] uppercase tracking-widest font-black text-zinc-400">{{ Auth::user()->name }}</div>
                        <svg class="w-3 h-3 text-zinc-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>
                </x-slot>

                <x-slot name="content" contentClasses="py-1 bg-zinc-950 border border-zinc-800 shadow-2xl">
                    <x-dropdown-link :href="route('profile.edit')" class="text-[10px] uppercase tracking-widest font-bold text-zinc-400 hover:text-white hover:bg-indigo-600 transition-colors">
                        {{ __('Protocolo de Perfil') }}
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-[10px] uppercase tracking-widest font-bold text-red-500 hover:text-white hover:bg-red-600 transition-colors">
                            {{ __('Desconectar Operador') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</nav>