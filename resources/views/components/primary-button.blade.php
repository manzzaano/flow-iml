<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full bg-indigo-600 hover:bg-indigo-500 text-white py-4 rounded-xl font-black text-xs uppercase tracking-[0.3em] shadow-2xl shadow-indigo-600/40 transform hover:-translate-y-1 active:scale-95 transition-all flex justify-center items-center']) }}>
    {{ $slot }}
</button>
