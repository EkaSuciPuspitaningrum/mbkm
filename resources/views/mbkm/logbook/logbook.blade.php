<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Status Pedaftaran Kegiatan MBKM') }}
        </h2>
    </x-slot>
    @if($mhsw_mbkm_exist)
    @include('layouts.logbook_layout')
    @else
    <section class="py-1 bg-blueGray-50">
        <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold">
                            Log Book Kegiatan MBKM
                        </h6>
                        <a href="{{url("/logbook/form")}}" class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                            Tambahkan Entri Log Book
                        </a>
                    </div>
                </div>
                <div class="flex-auto bg-gray-100 px-4 lg:px-10 py-10 pt-0 mt-6">
                    <h2 class="text-center text-xl mt-3">Anda belum menambahkan entri log book kegiatan MBKM, silahkan klik tombol diatas untuk menambah entri.</h2>
                </div>         
            </div>
        </div>
    </section>
    @endif

    <x-slot name="script">
        @if($mhsw_mbkm_exist)
        <script>
            let url = "{{url('/logbook/noreg/') . $mhsw_mbkm->id}}";
        </script>

        <script src="{{url('/js/qr.js')}}"></script>
        <script src="{{url('/js/mbkm.js')}}"></script>
        @endif
    </x-slot>
</x-app-layout>
