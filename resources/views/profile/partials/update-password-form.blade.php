<section class="space-y-6">
    <header class="border-b border-[#2a2a2e] pb-4">
        <h2 class="font-tech text-xs font-black text-white uppercase tracking-widest">
            {{ __('SECURITY_ENCRYPTION_UPDATE') }}
        </h2>
        <p class="mt-1 font-tech text-[8px] text-zinc-700 uppercase font-black">
            {{ __("ENSURE_OPERATOR_ACCESS_REMAINS_ENCRYPTED") }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        @method('put')

        <div>
            <label class="font-tech text-[8px] uppercase tracking-widest text-zinc-600 mb-1 block">CURRENT_PRV_KEY</label>
            <input name="current_password" type="password" class="w-full bg-[#1a1a1e] border border-[#2a2a2e] p-3 font-tech text-[10px] text-white focus:border-[#0052ff] outline-none" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label class="font-tech text-[8px] uppercase tracking-widest text-zinc-600 mb-1 block">NEW_PRV_KEY</label>
            <input name="password" type="password" class="w-full bg-[#1a1a1e] border border-[#2a2a2e] p-3 font-tech text-[10px] text-white focus:border-[#0052ff] outline-none" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label class="font-tech text-[8px] uppercase tracking-widest text-zinc-600 mb-1 block">CONFIRM_NEW_PRV_KEY</label>
            <input name="password_confirmation" type="password" class="w-full bg-[#1a1a1e] border border-[#2a2a2e] p-3 font-tech text-[10px] text-white focus:border-[#0052ff] outline-none" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="btn-tech-primary">ROTATE_KEYS</button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="font-tech text-[8px] text-[#0052ff] uppercase font-black">ENCRYPTION_UPDATED</p>
            @endif
        </div>
    </form>
</section>
