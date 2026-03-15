<header
    class="h-16 flex items-center justify-between px-8 bg-[#0D1117]/60 backdrop-blur-md border-b border-white/5 sticky top-0 z-20">
    <button @click="$dispatch('open-menu')" class="lg:hidden mr-4 text-white/40 hover:text-[#00FFAB]">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    <div class="flex-1 max-w-xl">
        <div class="relative group">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-white/20 group-focus-within:text-[#00FFAB] transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </span>
            <input type="text"
                class="block w-full bg-white/[0.03] border border-white/10 rounded-xl py-2 pl-10 pr-3 text-sm text-[#C9D1D9] placeholder-white/20 focus:outline-none focus:ring-1 focus:ring-[#00FFAB]/40 focus:border-[#00FFAB]/40 focus:bg-white/[0.05] transition-all"
                placeholder="Buscar tareas, sprints o documentación...">
        </div>
    </div>

    <div class="flex items-center space-x-6 ml-4">
        <div class="flex items-center space-x-3 bg-white/[0.02] border border-white/5 px-3 py-1.5 rounded-full">
            <div class="flex -space-x-1">
                <span class="w-2 h-2 rounded-full bg-[#00FFAB] shadow-[0_0_8px_#00FFAB]" title="PO Active"></span>
                <span class="w-2 h-2 rounded-full bg-[#00FFAB] shadow-[0_0_8px_#00FFAB]" title="SM Active"></span>
                <span class="w-2 h-2 rounded-full bg-white/10" title="Tech Lead Sleeping"></span>
            </div>
            <span class="text-[10px] uppercase tracking-widest font-bold text-white/30">Squad Ready</span>
        </div>

        <button class="text-white/30 hover:text-[#00FFAB] transition-colors relative">
            <span class="absolute top-0 right-0 w-2 h-2 bg-[#00FFAB] rounded-full border-2 border-[#0D1117]"></span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
        </button>
    </div>
</header>
