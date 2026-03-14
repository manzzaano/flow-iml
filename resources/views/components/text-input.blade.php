@props(['disabled' => false])
<input @disabled($disabled)
    {{ $attributes->merge(['class' => 'w-full bg-black border-2 border-zinc-800 text-white rounded-xl px-4 py-4 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none text-sm placeholder-zinc-700']) }}>
