<x-app-layout>
    <div class="flex flex-col space-y-6">
        <nav class="flex items-center space-x-2 text-xs font-medium uppercase tracking-widest text-white/20">
            <a href="{{ route('dashboard') }}" class="hover:text-[#00FFAB] transition-colors">Dashboard</a>
            <span>/</span>
            <span class="text-white/40">{{ $task->project->name }}</span>
            <span>/</span>
            <span class="text-[#00FFAB]">Tarea #{{ $task->id }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-6">
                <x-card>
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-white tracking-tight">{{ $task->title }}</h2>
                            <p class="text-white/40 mt-1 font-light">
                                {{ $task->description ?? 'Sin descripción detallada.' }}</p>
                        </div>
                        <div
                            class="px-4 py-1.5 rounded-full bg-[#00FFAB]/10 border border-[#00FFAB]/20 text-[#00FFAB] text-[10px] font-bold uppercase tracking-widest">
                            {{ $task->status }}
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-sm font-semibold text-white/30 uppercase tracking-widest mb-4">Criterios de
                            Aceptación</h3>
                        <ul class="space-y-3">
                            @if ($task->acceptance_criteria)
                                @foreach (json_decode($task->acceptance_criteria) as $criterion)
                                    <li class="flex items-center space-x-3 text-white/70 text-sm">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#00FFAB]"></span>
                                        <span>{{ $criterion }}</span>
                                    </li>
                                @endforeach
                            @else
                                <li class="text-white/20 text-sm italic">Define criterios con el Product Owner para
                                    empezar.</li>
                            @endif
                        </ul>
                    </div>
                </x-card>

                <div class="p-8 rounded-3xl bg-[#010409] border border-white/5 font-mono text-sm text-white/50">
                    // Aquí se mostrará el diff de tu código o el feedback técnico del Tech Lead...
                    <div class="mt-4 flex items-center space-x-2 text-[#00FFAB]/40 italic">
                        <span class="animate-pulse">_</span> Esperando commit para auditoría...
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <h3 class="text-sm font-semibold text-white/30 uppercase tracking-widest ml-2">Squad Chat</h3>

                <div
                    class="h-[500px] flex flex-col rounded-3xl bg-white/[0.02] border border-white/5 backdrop-blur-md overflow-hidden">
                    <div class="flex-1 p-6 overflow-y-auto space-y-4 custom-scrollbar">
                        <div class="flex flex-col space-y-1 items-start">
                            <span class="text-[9px] font-bold text-blue-400 uppercase ml-1">Product Owner</span>
                            <div class="bg-white/5 p-3 rounded-2xl rounded-tl-none text-sm text-white/70 max-w-[90%]">
                                Hola Ismael, ¿tienes alguna duda con los criterios de aceptación de esta tarea?
                            </div>
                        </div>
                    </div>

                    <div class="p-4 bg-white/[0.02] border-t border-white/5">
                        <div class="relative">
                            <input type="text" placeholder="Escribe a la Squad..."
                                class="w-full bg-white/5 border border-white/10 rounded-xl py-3 px-4 text-sm text-white placeholder-white/20 focus:outline-none focus:ring-1 focus:ring-[#00FFAB]/40">
                            <button
                                class="absolute right-2 top-2 p-1.5 text-[#00FFAB] hover:bg-[#00FFAB]/10 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
