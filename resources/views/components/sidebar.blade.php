<aside x-data="{ open: false }" @open-menu.window="open = true" :class="open ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-[#161B22]/40 backdrop-blur-xl border-r border-white/5 transition-transform duration-300 lg:relative lg:translate-x-0 flex flex-col">
    <button @click="open = false" class="lg:hidden absolute top-4 right-4 text-white/40">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <div class="p-6 flex items-center space-x-3">
        <div
            class="w-8 h-8 rounded-lg bg-[#00FFAB] flex items-center justify-center shadow-[0_0_15px_rgba(0,255,171,0.4)]">
            <svg class="w-5 h-5 text-[#0D1117]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                    d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
        </div>
        <span class="font-bold text-lg tracking-tight text-white/90">Flow <span
                class="text-[#00FFAB]/80 text-xs font-light">IML</span></span>
    </div>

    <nav class="flex-1 px-4 py-4 space-y-2">
        <x-sidebar-link :href="route('dashboard')" icon="home" :active="request()->routeIs('dashboard')">Dashboard</x-sidebar-link>
        <x-sidebar-link :href="route('projects.index')" icon="briefcase" :active="request()->routeIs('projects.*')">Proyectos</x-sidebar-link>
        <x-sidebar-link :href="route('squad.index')" icon="cpu" :active="request()->routeIs('squad.*')">Squad IA</x-sidebar-link>
    </nav>

    <div class="p-4 mt-auto border-t border-white/5 bg-white/[0.02]">
        <div class="flex items-center justify-between group">
            <div class="flex items-center p-2">
                <div
                    class="w-8 h-8 rounded-full bg-[#00FFAB]/20 flex items-center justify-center text-[#00FFAB] text-xs font-bold">
                    {{ substr(auth()->user()->name, 0, 2) }}
                </div>
                <div class="ml-3">
                    <p class="text-xs font-medium text-white/80 truncate w-24">{{ auth()->user()->name }}</p>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="p-2 text-white/20 hover:text-red-400 transition-colors"
                    title="Cerrar Sesión">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</aside>
