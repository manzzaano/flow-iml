<section class="space-y-6">
    <header class="border-b border-red-900/20 pb-4">
        <h2 class="font-tech text-xs font-black text-red-600 uppercase tracking-widest">
            {{ __('DESTRUCT_OPERATOR_DATA') }}
        </h2>
        <p class="mt-1 font-tech text-[8px] text-red-900 uppercase font-black">
            {{ __('PERMANENT_ERASURE_OF_ALL_LOCAL_ARCHIVES_AND_METRICS') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="font-tech text-[9px] font-black text-red-600 border border-red-900/40 px-4 py-2 hover:bg-red-900/10 transition-colors uppercase tracking-widest"
    >{{ __('EXECUTE_DELETION') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 bg-[#121214] border-4 border-red-900/20">
            @csrf
            @method('delete')

            <h2 class="font-tech text-xs font-black text-white uppercase tracking-widest">
                {{ __('CONFIRM_DESTRUCT_SEQUENCE') }}
            </h2>

            <p class="mt-2 font-tech text-[8px] text-zinc-600 uppercase font-black leading-relaxed">
                {{ __('INPUT_PRIVATE_KEY_TO_VERIFY_IDENTITY_BEFORE_ERASURE') }}
            </p>

            <div class="mt-6">
                <label class="font-tech text-[8px] uppercase tracking-widest text-zinc-800 mb-1 block">PRV_KEY</label>
                <input name="password" type="password" class="w-full bg-[#1a1a1e] border border-[#2a2a2e] p-3 font-tech text-[10px] text-white focus:border-red-600 outline-none" placeholder="PASSWORD" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-2">
                <button type="button" x-on:click="$dispatch('close')" class="btn-tech">ABORT</button>
                <button type="submit" class="bg-red-600 text-white border border-red-600 px-4 py-2 font-tech text-[10px] uppercase font-bold tracking-widest hover:bg-red-700 transition-all">CONFIRM_DELETION</button>
            </div>
        </form>
    </x-modal>
</section>
