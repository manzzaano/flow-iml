<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-screen overflow-hidden">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>Flow by Ismael Manzano León</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    <style>
        .text-glow {
            text-shadow: 0 0 15px rgba(79, 70, 229, 0.4);
        }

        .terminal-shadow {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), 0 0 40px rgba(79, 70, 229, 0.1);
        }
    </style>
</head>

<body
    class="antialiased bg-[#FDFDFC] dark:bg-[#050505] text-[#1b1b18] dark:text-zinc-300 font-sans h-screen overflow-hidden flex flex-col">

    <div
        class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:40px_40px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] pointer-events-none">
    </div>

    <div class="relative flex flex-col h-full max-w-7xl mx-auto px-6 lg:px-8 w-full">

        <header class="flex justify-between items-center h-24 shrink-0">
            <div class="flex items-center gap-3">
                <div class="bg-indigo-600 p-2 rounded-lg shadow-lg shadow-indigo-500/20 group cursor-pointer">
                    <svg class="w-6 h-6 text-white transform group-hover:rotate-12 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div class="flex flex-col leading-none">
                    <span class="font-black text-2xl tracking-tighter uppercase dark:text-white">Flow</span>
                    <span class="text-[8px] uppercase tracking-[0.3em] text-indigo-500 font-bold">Protocol v1.0</span>
                </div>
            </div>

            <nav class="flex items-center gap-8">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-xs font-bold hover:text-indigo-400 transition-colors uppercase tracking-[0.2em]">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-xs font-bold text-zinc-500 hover:text-white transition-colors uppercase tracking-[0.2em]">Entrar</a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-3 bg-indigo-600 text-white text-[10px] font-black rounded-lg shadow-xl shadow-indigo-500/20 hover:bg-indigo-700 hover:-translate-y-0.5 transition-all uppercase tracking-[0.2em]">
                        Empezar Ahora
                    </a>
                @endauth
            </nav>
        </header>

        <main class="flex-1 flex items-center min-h-0 relative">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 w-full items-center">

                <div class="space-y-8">
                    <div class="space-y-4">
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20">
                            <span class="relative flex h-2 w-2">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                            </span>
                            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-indigo-400">System
                                Online</span>
                        </div>
                        <h1 class="text-5xl lg:text-7xl font-black leading-[0.95] tracking-tighter dark:text-white">
                            Eleva tu código al <br>
                            <span class="text-indigo-600 text-glow">estándar</span> <br>
                            profesional.
                        </h1>
                    </div>

                    <p class="text-lg text-zinc-400 leading-relaxed max-w-md border-l-2 border-indigo-500/30 pl-6">
                        Diseñado por <strong class="text-zinc-100">Ismael Manzano León</strong>. <br>
                        Auditoría de alta fidelidad con el motor de <strong class="text-indigo-400">Gemini 3
                            Flash</strong>.
                    </p>

                    <div class="flex gap-4 pt-4">
                        <a href="{{ route('register') }}"
                            class="group bg-indigo-600 text-white px-8 py-4 rounded-xl font-bold shadow-2xl shadow-indigo-600/30 hover:bg-indigo-700 hover:-translate-y-1 transition-all flex items-center">
                            Solicitar Acceso
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="relative hidden lg:block h-full max-h-[480px]">
                    <div class="absolute -inset-10 bg-indigo-600/10 blur-[100px] rounded-full"></div>
                    <div
                        class="relative bg-zinc-950/80 backdrop-blur-xl p-8 rounded-2xl border border-white/10 terminal-shadow h-full flex flex-col font-mono text-[13px]">
                        <div class="flex justify-between items-center mb-8 shrink-0">
                            <div class="flex gap-2">
                                <div class="w-3 h-3 rounded-full bg-red-500/20 border border-red-500/50"></div>
                                <div class="w-3 h-3 rounded-full bg-amber-500/20 border border-amber-500/50"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500/20 border border-green-500/50"></div>
                            </div>
                            <span class="text-[10px] text-zinc-600 uppercase tracking-widest">bash — flow-iml —
                                127.0.0.1</span>
                        </div>

                        <div class="flex-1 space-y-4">
                            <div class="space-y-1">
                                <p class="text-zinc-600">// Analizando cambios en local...</p>
                                <p class="text-zinc-300"><span class="text-indigo-500 font-bold">$</span> git add .</p>
                                <p class="text-zinc-300"><span class="text-indigo-500 font-bold">$</span> php artisan
                                    flow:sync</p>
                            </div>

                            <div class="pt-6 border-t border-zinc-900 space-y-3">
                                <p class="text-green-400 flex items-center gap-3">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                                    Branch: main detectada
                                </p>
                                <p class="text-green-400 flex items-center gap-3">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                                    Engine: Gemini 3 Flash Online
                                </p>

                                <div
                                    class="mt-8 p-6 bg-indigo-500/5 border border-indigo-500/10 rounded-xl relative overflow-hidden group">
                                    <div class="absolute top-0 right-0 p-2 opacity-20">
                                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <p class="text-indigo-400 font-black text-xl mb-1">94/100 QUALITY</p>
                                    <p class="text-zinc-500 text-[10px] uppercase tracking-widest font-bold italic">
                                        Verification Sello: Flow-IML-SECURE</p>
                                    <p class="text-zinc-400 mt-4 leading-relaxed italic text-xs">"El código cumple con
                                        SOLID. Se recomienda unificar el namespace en el Service."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="h-20 border-t border-zinc-900 flex justify-between items-center shrink-0">
            <div class="flex items-center gap-4 text-zinc-600 text-[9px] uppercase tracking-[0.4em] font-black">
                <span>&copy; 2026 FLOW</span>
                <span class="h-1 w-1 rounded-full bg-zinc-800"></span>
                <span>BY ISMAEL MANZANO LEÓN</span>
            </div>
            <div class="flex gap-8 text-[9px] uppercase tracking-[0.4em] font-black">
                <span class="text-indigo-600">Secure Protocol</span>
                <span class="text-zinc-800">Verified by Gemini 3 Flash</span>
            </div>
        </footer>
    </div>

</body>

</html>
