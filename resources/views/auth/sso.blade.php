<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo" class="flex">
            <a href="/">
                <x-application-logo class="w-48 h-48 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <div class=" mt-2
                  items-center
                  justify-center
                  text-center">
            <h1 class="text-xl">Sistem Informasi Kegiatan MBKM Politeknik Negeri Jakarta</h1>
        </div>
        <a href="{{url('/auth/pnj')}}" class="flex
                  mt-2
                  items-center
                  justify-center
                  focus:outline-none
                  text-white text-sm
                  sm:text-base
                  bg-blue-500
                  hover:bg-blue-600
                  rounded-2xl
                  py-2
                  w-full
                  transition
                  duration-150
                  ease-in">
            Login Dengan SSO PNJ
        </a>
    </x-auth-card>
</x-guest-layout>
