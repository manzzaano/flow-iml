<x-app-layout>
    <x-slot name="header">
        <span class="font-tech text-[10px] text-zinc-600 uppercase tracking-widest">Operator / Identity_Config</span>
    </x-slot>

    <div class="space-y-px bg-[#2a2a2e] border border-[#2a2a2e]">
        <div class="bg-[#121214] p-12">
            <p class="font-tech text-[9px] font-black uppercase text-zinc-700 mb-8 border-b border-[#2a2a2e] pb-2">Profile_Information</p>
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="bg-[#121214] p-12">
            <p class="font-tech text-[9px] font-black uppercase text-zinc-700 mb-8 border-b border-[#2a2a2e] pb-2">Security_Protocol</p>
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="bg-[#121214] p-12">
            <p class="font-tech text-[9px] font-black uppercase text-red-900 mb-8 border-b border-red-900/20 pb-2">Destruct_Sequence</p>
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
