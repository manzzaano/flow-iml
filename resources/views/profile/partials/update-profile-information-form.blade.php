<section class="space-y-6">
    <header class="border-b border-[#2a2a2e] pb-4">
        <h2 class="font-tech text-xs font-black text-white uppercase tracking-widest">
            {{ __('IDENTITY_PROTOCOL_INFO') }}
        </h2>
        <p class="mt-1 font-tech text-[8px] text-zinc-700 uppercase font-black">
            {{ __("UPDATE_OPERATOR_CORE_DATA_AND_COMM_ID") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('patch')

        <div>
            <label class="font-tech text-[8px] uppercase tracking-widest text-zinc-600 mb-1 block">OP_NAME</label>
            <input name="name" type="text" class="w-full bg-[#1a1a1e] border border-[#2a2a2e] p-3 font-tech text-[10px] text-white focus:border-[#0052ff] outline-none" value="{{ old('name', $user->name) }}" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <label class="font-tech text-[8px] uppercase tracking-widest text-zinc-600 mb-1 block">COMM_LINK_EMAIL</label>
            <input name="email" type="email" class="w-full bg-[#1a1a1e] border border-[#2a2a2e] p-3 font-tech text-[10px] text-white focus:border-[#0052ff] outline-none" value="{{ old('email', $user->email) }}" required />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="btn-tech-primary">COMMIT_CHANGES</button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="font-tech text-[8px] text-[#0052ff] uppercase font-black">SUCCESS_WRITTEN</p>
            @endif
        </div>
    </form>
</section>
