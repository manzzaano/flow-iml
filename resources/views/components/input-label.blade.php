@props(['value'])
<label
    {{ $attributes->merge(['class' => 'block text-[11px] uppercase tracking-[0.2em] font-black text-zinc-400 mb-2']) }}>
    {{ $value ?? $slot }}
</label>
