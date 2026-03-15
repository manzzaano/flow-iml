<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Flow by Ismael Manzano León</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#0D1117] text-[#C9D1D9] selection:bg-[#00FFAB]/30 selection:text-[#00FFAB]">

    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute -top-[10%] -left-[10%] w-[40%] h-[40%] rounded-full bg-[#00FFAB]/5 blur-[120px]"></div>
        <div class="absolute -bottom-[10%] -right-[10%] w-[30%] h-[30%] rounded-full bg-[#00FFAB]/3 blur-[100px]"></div>
    </div>

    <div class="flex h-screen overflow-hidden">

        <x-sidebar />

        <div class="flex flex-col flex-1 min-w-0 overflow-hidden">

            <x-navbar />

            <main class="flex-1 overflow-y-auto px-6 py-8 custom-scrollbar">
                <div class="max-w-7xl mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #30363D;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #00FFAB;
        }
    </style>
</body>

</html>
