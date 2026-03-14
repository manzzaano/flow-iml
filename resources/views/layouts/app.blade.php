<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-screen overflow-hidden dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Flow Workbench — Ismael Manzano León</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Scrollbar minimalista tipo IDE */
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #1f1f23;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #4f46e5;
        }

        /* Efectos de interfaz Pro */
        .glass-header {
            background: rgba(2, 2, 3, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .sidebar-item-active {
            background: rgba(79, 70, 229, 0.1);
            color: #818cf8;
            border-right: 2px solid #4f46e5;
        }
    </style>
</head>

<body class="antialiased bg-[#121214] text-zinc-500 font-sans h-screen overflow-hidden flex selection:bg-[#0052ff]/30">

    <aside class="w-60 border-r border-[#2a2a2e] flex flex-col shrink-0 bg-[#121214] z-50 relative">
        <div class="h-14 flex items-center px-6 border-b border-[#2a2a2e] gap-3">
            <span class="font-tech text-white text-[10px] font-black uppercase tracking-widest leading-none">Flow <span class="text-[#0052ff]">Core</span></span>
        </div>

        <nav class="flex-1 px-4 py-8 space-y-12 overflow-y-auto custom-scrollbar">
            <div>
                <p class="font-tech text-[8px] uppercase tracking-widest font-extrabold text-zinc-700 mb-4 px-2">Mission Control</p>
                <div class="space-y-0.5">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 px-3 py-2 border {{ request()->routeIs('dashboard') ? 'border-[#0052ff] bg-[#0052ff]/5 text-white' : 'border-transparent text-zinc-600 hover:text-zinc-200 hover:border-zinc-800' }} font-tech text-[9px] uppercase font-bold tracking-widest transition-all">
                        Board
                    </a>
                </div>
            </div>

            <div>
                <p class="font-tech text-[8px] uppercase tracking-widest font-extrabold text-zinc-700 mb-4 px-2">Engineering</p>
                <div class="space-y-0.5">
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center gap-3 px-3 py-2 border {{ request()->routeIs('profile.edit') ? 'border-[#0052ff] bg-[#0052ff]/5 text-white' : 'border-transparent text-zinc-600 hover:text-zinc-200 hover:border-zinc-800' }} font-tech text-[9px] uppercase font-bold tracking-widest transition-all">
                        Operator ID
                    </a>
                </div>
            </div>
        </nav>

        <div class="p-6 border-t border-[#2a2a2e]">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left font-tech text-[8px] font-extrabold text-zinc-700 hover:text-red-500 uppercase tracking-widest transition-colors">
                    TERMINATE_SESSION
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full overflow-hidden relative">
        <header class="h-14 bg-[#121214] border-b border-[#2a2a2e] flex items-center justify-between px-8 shrink-0">
            <div class="flex items-center">
                @isset($header)
                    {{ $header }}
                @endisset
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2 px-3 py-1 bg-[#1a1a1e] border border-[#2a2a2e]">
                    <span class="w-1.5 h-1.5 bg-[#0052ff]"></span>
                    <span class="font-tech text-[8px] font-black uppercase tracking-widest text-zinc-500">Iml-Flash-Engine v3</span>
                </div>
                <div class="flex items-center gap-3 ml-4">
                    <span class="font-tech text-[9px] font-black text-white uppercase">{{ Auth::user()->name }}</span>
                    <div class="w-6 h-6 bg-[#1a1a1e] border border-[#2a2a2e] flex items-center justify-center font-tech text-[8px] text-zinc-600">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto custom-scrollbar p-6">
            {{ $slot }}
        </div>

        <footer class="h-6 border-t border-[#2a2a2e] bg-[#121214] flex items-center justify-between px-8 shrink-0">
            <div class="flex items-center gap-4">
                <span class="font-tech text-[7px] font-bold text-zinc-700 uppercase tracking-widest">System: Flow-IML-Standard</span>
            </div>
            <div class="font-tech text-[7px] font-bold text-zinc-700 uppercase tracking-widest">
                CLK: {{ now()->format('H:i:s') }}
            </div>
        </footer>
    </main>
</body>

</html>
