<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pendaftaran Kegiatan MBKM') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-xl">Form Pendaftaran Kegiatan MBKM</h1>
                    <div class="grid  gap-8 grid-cols-1">
                        <div class="flex flex-col">
                            <div class="mt-5">
                                <form action="{{url('/mbkm/daftar')}}" method="post">
                                    @csrf
                                    <div class="form">
                                        <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                            <div class="mb-3 space-y-2 w-full text-xs">
                                                <label class="font-semibold text-gray-600 py-2">Nama Lengkap<abbr
                                                        title="required">*</abbr></label>
                                                <input disabled placeholder="Nama Lengkap"
                                                       class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                                       required="required" type="text" id="full_name" value="{{$user->name}}">
                                            </div>
                                            <div class="mb-3 space-y-2 w-full text-xs">
                                                <label class="font-semibold text-gray-600 py-2">NIM <abbr
                                                        title="required">*</abbr></label>
                                                <input disabled placeholder="NIM"
                                                       class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                                       required="required" type="text" id="nim" value="{{$user->ident}}">
                                            </div>
                                        </div>
                                        <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                            <div class="w-full flex flex-col mb-3">
                                                <label class="font-semibold text-gray-600 py-2">Jurusan <abbr
                                                        title="required">*</abbr></label>
                                                <select
                                                    class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full "
                                                    required="required" name="jurusan" id="jurusan">
                                                    @foreach($jurusan as $mJurusan)
                                                    <option value="{{$mJurusan->id}}" @if($users_jurusan->id === $mJurusan->id) selected @endif>{{$mJurusan->jurusan_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('jurusan')
                                                <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="w-full flex flex-col mb-3">
                                                <label class="font-semibold text-gray-600 py-2">Program Studi <abbr
                                                        title="required">*</abbr></label>
                                                <select
                                                    class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full "
                                                    required="required" name="prodi_id" id="prodi_id">
                                                </select>
                                                @error('prodi_id')
                                                <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                            <div class="mb-3 space-y-2 w-full text-xs">
                                                <label class="font-semibold text-gray-600 py-2">Angkatan<abbr
                                                        title="required">*</abbr></label>
                                                <input placeholder="e.g 2017"
                                                       class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                                       required="required" type="number" maxlength="4" min="2017" id="angkatan" name="angkatan" value="@if($mhsw_mbkm_exist){{$mhsw_mbkm->angkatan}}@else{{old('angkatan')}}@endif">
                                                @error('angkatan')
                                                <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3 space-y-2 w-full text-xs">
                                                <label class="font-semibold text-gray-600 py-2">Semester <abbr
                                                        title="required">*</abbr></label>
                                                <input placeholder="e.g 6"
                                                       class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                                       required="required" type="number" min="1" max="8" id="semester" name="semester" value="@if($mhsw_mbkm_exist){{$mhsw_mbkm->semester}}@else{{old('semester')}}@endif">
                                                @error('semester')
                                                <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                            <div class="mb-3 space-y-2 w-full text-xs">
                                                <label class="font-semibold text-gray-600 py-2">Model Kegiatan MBKM
                                                    <abbr title="required">*</abbr></label>
                                                <select
                                                    class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full "
                                                    required="required" name="model_mbkm_id" id="model_mbkm_id">
                                                    @foreach($model_mbkm as $mbkm)
                                                        <option value="{{$mbkm->id}}"@if($mhsw_mbkm_exist && $mhsw_mbkm->model_mbkm_id == $mbkm->id) selected @elseif(old('model_mbkm_id') == $mbkm->id) selected @elseif($loop->first) selected @endif >{{$mbkm->model_mbkm}}</option>
                                                    @endforeach
                                                </select>
                                                @error('model_mbkm_id')
                                                <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3 space-y-2 w-full text-xs">
                                                <label class="font-semibold text-gray-600 py-2">Durasi (Bulan) <abbr
                                                        title="required">*</abbr></label>
                                                <input placeholder="e.g 6"
                                                       class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                                       required="required" type="number" min="1" max="6" id="durasi" name="durasi" value="@if($mhsw_mbkm_exist){{$mhsw_mbkm->durasi}}@else{{old('durasi')}}@endif">
                                                @error('durasi')
                                                <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                            <div class="w-full flex flex-col mb-3">
                                                <label class="font-semibold text-gray-600 py-2">NIP Dosen Pembimbing
                                                    Yang Akan Diajukan <abbr title="required">*</abbr></label>
                                                <input placeholder="NIP Dospem"
                                                       class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                                       required="required" type="number" name="nip_dospem" value="@if($mhsw_mbkm_exist){{$mhsw_mbkm->nip_dospem}}@else{{old('nip_dospem')}}@endif"
                                                       id="nip_dospem">
                                                @error('nip_dospem')
                                                <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="w-full flex flex-col mb-3">
                                                <label class="font-semibold text-gray-600 py-2">Nama Dosen Pembimbing
                                                    Yang Akan Diajukan <abbr title="required">*</abbr></label>
                                                <input placeholder="Nama Dospem"
                                                       class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                                       required="required" type="text" name="nama_dospem" value="@if($mhsw_mbkm_exist){{$mhsw_mbkm->nama_dospem}}@else{{old('nama_dospem')}}@endif"
                                                       id="nama_dospem">
                                                @error('nama_dospem')
                                                <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex-auto w-full mb-3 text-xs space-y-4">
                                            <label class="font-semibold text-gray-600 py-2">Lokasi Kegiatan MBKM <abbr
                                                    title="required">*</abbr></label>
                                            <input
                                                placeholder="Tempat Kegiatan MBKM (e.g Desa Harapan Jaya, PT. XYZ, Kantor PMI Cabang Depok)"
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                                required="required" type="text" name="lokasi_mbkm" id="lokasi_mbkm" value="@if($mhsw_mbkm_exist){{$mhsw_mbkm->lokasi_mbkm}}@else{{old('lokasi_mbkm')}}@endif">
                                            @error('lokasi_mbkm')
                                            <p class="text-sm text-red-500 hidden mt-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="flex-auto w-full mb-3 text-xs space-y-2">
                                            <label class="font-semibold text-gray-600 py-2">Alamat Lokasi Kegiatan MBKM
                                                <abbr title="required">*</abbr></label>
                                            <input
                                                placeholder="Alamat Lokasi Kegiatan MBKM (e.g Jl. DR. GA Siwabessy No. 18...)"
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                                required="required" type="text" name="alamat_mbkm" id="alamat_mbkm" value="@if($mhsw_mbkm_exist){{$mhsw_mbkm->alamat_mbkm}}@else{{old('alamat_mbkm')}}@endif">
                                            @error('alamat_mbkm')
                                            <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="flex-auto w-full mb-3 text-xs space-y-2">
                                            <label class="font-semibold text-gray-600 py-2">Deskripsi / Lingkup Kegiatan
                                                MBKM</label>
                                            <textarea name="deskripsi_mbkm" id="deskripsi_mbkm"
                                                      class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4"
                                                      placeholder="Ketik detail kegiatan yang akan dilakukan pada saat kegiatan MBKM (e.g Mengajar pelajaran xyz di SMKN 1 Kota XYZ..)"
                                                      spellcheck="false">@if($mhsw_mbkm_exist){{$mhsw_mbkm->deskripsi_mbkm}}@else{{old('deskripsi_mbkm')}}@endif</textarea>
                                            @error('deskripsi_mbkm')
                                            <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="flex-auto w-full my-3 text-xs space-y-2">
                                            <input id="program_dikbud" type="checkbox" name="program_dikbud" value="1">
                                            <label for="program_dikbud" class="ml-2 font-semibold text-gray-600">Centang Jika Anda mengikuti program MBKM dari Kemendikbudristek</label>
                                            @error('deskripsi_mbkm')
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
        <script>
            let prodi_selector = document.getElementById("prodi_id");
            let jurusan_selector = document.getElementById("jurusan");
            let mbkm_prodi = null;
            @if($mhsw_mbkm_exist)
            mbkm_prodi = {{$mhsw_mbkm->prodi_id}};
            @endif

            function removeOptions(selectElement) {
                let i, L = selectElement.options.length - 1;
                for(i = L; i >= 0; i--) {
                    selectElement.remove(i);
                }
            }

            function add_select_option(selectElement, value, innerHTML, selected = false){
                let opt = document.createElement('option');
                opt.value = value;
                opt.innerHTML = innerHTML;
                opt.selected = selected;

                selectElement.appendChild(opt);
            }

            fetch('{!! url('/api/prodi/by-jur/' . $users_jurusan->id) !!}')
                .then(response => response.json())
                .then(data => data.forEach((item, index, arr) => {
                    let selected = false;
                    if(mbkm_prodi === item.id){
                        selected = true;
                    }else{
                        selected = index === 0;
                    }
                    add_select_option(prodi_selector, item.id, item.prodi_name, selected);
                }));

            jurusan_selector.addEventListener('change', function (event){
                removeOptions(prodi_selector);
                add_select_option(prodi_selector, null, "Loading...");
                fetch('{!! url('/api/prodi/by-jur/') !!}/' + jurusan_selector.value)
                    .then(response => response.json())
                    .then(data => {
                        removeOptions(prodi_selector);
                        data.forEach((item, index, arr) => {
                            let isFirst = index === 0;
                            add_select_option(prodi_selector, item.id, item.prodi_name, isFirst);
                        })
                    });
            })
        </script>
    </x-slot>
</x-app-layout>
