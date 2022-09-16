<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Log Book Catatan Bimbingan MBKM Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-xl">Form LogBook Mahasiswa</h1>
                    <div class="grid  gap-8 grid-cols-1">
                        <div class="flex flex-col">
                            <div class="mt-5">
                                <form action="{{url('/logbook/form')}}" method="post">
                                    @csrf
                                    <div class="form">
                                        <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                            <div class="mb-3 space-y-2 w-full text-xs">
                                                <label class="font-semibold text-gray-600 py-2">Tanggal Bimbingan<abbr
                                                        title="required">*</abbr></label>
                                                <input placeholder="Tanggal Bimbingan"
                                                       class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                                       required="required" type="datetime-local" id="tanggal_log" name="tanggal_log" value="">
                                                @error('tanggal_log')
                                                <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3 space-y-2 w-full text-xs">
                                                <label class="font-semibold text-gray-600 py-2">Tempat <abbr
                                                        title="required">*</abbr></label>
                                                <input placeholder="Tempat/Lokasi Bimbingan"
                                                       class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                                       required="required" type="text" id="tempat" name="tempat" value="">
                                                @error('tempat')
                                                <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex-auto w-full mb-3 text-xs space-y-2">
                                            <label class="font-semibold text-gray-600 py-2">Uraian Kegiatan Bimbingan</label>
                                            <textarea name="uraian" id="uraian"
                                                      class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4"
                                                      placeholder="Detail kegiatan yang dilakukan pada saat bimbingan"
                                                      spellcheck="false"></textarea>
                                            @error('uraian')
                                            <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="flex-auto w-full mb-3 text-xs space-y-2">
                                            <label class="font-semibold text-gray-600 py-2">Rencana Pencapaian</label>
                                            <textarea name="rencana_pencapaian" id="rencana_pencapaian"
                                                      class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4"
                                                      placeholder="Detail target pencapaian yang akan dipenuhi setelah bimbingan"
                                                      spellcheck="false"></textarea>
                                            @error('rencana_pencapaian')
                                            <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <p class="text-red-500 text-right my-3">Kolom diperlukan ditandai dengan simbol
                                            asterisk <abbr title="Required field">*</abbr></p>
                                        <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                            <button type="submit"
                                                    class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">

    </x-slot>
</x-app-layout>
