<x-app-layout>
    <header class="mb-10">
        <h1 class="text-3xl font-bold text-white tracking-tight">
            Hola, <span class="text-[#00FFAB]">Ismael</span>.
        </h1>
        <p class="text-white/40 mt-2 font-light">
            Tu Squad de IA ha revisado los últimos commits. Tienes 2 tareas pendientes de auditoría.
        </p>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <x-card title="Sprint Actual" subtitle="Finaliza en 3 días">
            <div class="flex items-end justify-between">
                <span class="text-4xl font-bold text-white">72%</span>
                <div class="w-24 h-2 bg-white/5 rounded-full overflow-hidden">
                    <div class="bg-[#00FFAB] h-full shadow-[0_0_10px_#00FFAB]" style="width: 72%"></div>
                </div>
            </div>
        </x-card>

        <x-card title="Calidad de Código" subtitle="Media del Tech Lead">
            <div class="flex items-center space-x-2">
                <span class="text-4xl font-bold text-[#00FFAB]">A+</span>
                <span class="text-white/20 text-xs uppercase tracking-tighter">Excellent Flow</span>
            </div>
        </x-card>

        <x-card title="Tareas en curso" subtitle="Bloqueadas: 0">
            <div class="flex items-center space-x-4">
                <span class="text-4xl font-bold text-white">12</span>
                <div class="flex -space-x-2">
                    <div
                        class="w-8 h-8 rounded-full border-2 border-[#0D1117] bg-blue-500/20 text-[10px] flex items-center justify-center text-blue-400 font-bold">
                        PO</div>
                    <div
                        class="w-8 h-8 rounded-full border-2 border-[#0D1117] bg-purple-500/20 text-[10px] flex items-center justify-center text-purple-400 font-bold">
                        TL</div>
                </div>
            </div>
        </x-card>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2">
            <h3 class="text-sm font-semibold text-white/30 uppercase tracking-widest mb-4 ml-2">Backlog Prioritario</h3>
            <div class="space-y-4">
                <div class="space-y-4">
                    @forelse($tasks as $task)
                        <x-task-item :title="$task->title" :points="$task->story_points" :priority="$task->priority" :id="$task->id" />
                    @empty
                        <p class="text-white/20 text-sm italic">No hay tareas pendientes en el backlog.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="space-y-8">

            <div>
                <h3 class="text-sm font-semibold text-white/30 uppercase tracking-widest mb-4 ml-2">Tu Squad de IA</h3>
                <div class="space-y-4">
                    <x-squad-member role="po" name="Sarah" status="active" />
                    <x-squad-member role="sm" name="Marcos" status="idle" />
                    <x-squad-member role="tl" name="Alex" status="thinking" />
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-white/30 uppercase tracking-widest mb-4 ml-2">Concepto del Día
                </h3>
                <x-glossary-term term="Middleware" category="Arquitectura Laravel"
                    example="Un guardia de seguridad que revisa si tienes entrada (token) antes de dejarte pasar a una ruta.">
                    Capas de lógica que filtran las peticiones HTTP que entran a tu aplicación. Útiles para manejar la
                    seguridad y los logs.
                </x-glossary-term>
            </div>

        </div>
    </div>
</x-app-layout>
