<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-screen overflow-hidden">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Flow Auth — Ismael Manzano León</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
        @endif
    </head>
    <body class="antialiased bg-[#050505] text-zinc-300 font-sans h-screen overflow-hidden flex flex-col items-center justify-center selection:bg-indigo-500">
        
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:40px_40px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_50%,#000_70%,transparent_100%)] pointer-events-none"></div>

        <div class="relative w-full max-w-md px-6 flex flex-col items-center">
            <div class="mb-10 group">
                <a href="/">
                    <div class="bg-indigo-600 p-3 rounded-xl shadow-2xl shadow-indigo-500/30 transform group-hover:scale-105 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                </a>
            </div>

            <div class="w-full bg-zinc-950/50 backdrop-blur-xl border border-white/10 p-8 rounded-2xl shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-16 h-16 bg-indigo-500/5 blur-2xl rounded-full -mr-8 -mt-8"></div>
                
                {{ $slot }}
            </div>

            <div class="mt-8 flex flex-col items-center gap-2">
                <p class="text-[9px] uppercase tracking-[0.4em] font-black text-zinc-600">
                    &copy; 2026 FLOW <span class="mx-1">|</span> BY ISMAEL MANZANO LEÓN
                </p>
                <div class="h-px w-8 bg-zinc-800"></div>
            </div>
        </div>
    </body>
</html>