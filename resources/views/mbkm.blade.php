<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Status Pedaftaran Kegiatan MBKM') }}
        </h2>
    </x-slot>

    <aside class="h-screen fixed top-0">
        <h1 class="text-xl">TEST FLOAT</h1>
    </aside>

    @if($mhsw_mbkm_exist)
    @include('layouts.mbkm_layout')
    @else
    <section class=" py-1 bg-blueGray-50">
    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="rounded-t bg-white mb-0 px-6 py-6">
                <div class="text-center flex justify-between">
                    <h6 class="text-blueGray-700 text-xl font-bold">
                        Status Pendaftaran Kegiatan MBKM
                    </h6>
                    <a href="{{url("/mbkm/daftar")}}" class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                        Daftar Kegiatan MBKM
                    </a>
                </div>
            </div>
            <div class="flex-auto bg-gray-100 px-4 lg:px-10 py-10 pt-0 mt-6">
                <h2 class="text-center text-xl mt-3">Anda belum mendaftar kegiatan MBKM. Anda dapat mendaftar dengan menekan tombol diatas </h2>
            </div>
        </div>
    </div>
    </section>
    @endif

    <x-slot name="script">
        @if($mhsw_mbkm_exist)
        <script>
            let url = "{{url('/mbkm/noreg/') . $mhsw_mbkm->id}}";
        </script>

        <script src="{{url('/js/qr.js')}}"></script>
        <script src="{{url('/js/mbkm.js')}}"></script>
        @endif
    </x-slot>
</x-app-layout>
