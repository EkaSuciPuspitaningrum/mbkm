<section class="py-1 bg-blueGray-50">
    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="py-3">
                <div
                    class="inline-flex items-center bg-white leading-none text-pink-600 rounded-full p-2 shadow text-teal text-sm">
                    <span class="inline-flex bg-pink-600 text-white rounded-full h-6 px-3 justify-center items-center">Sukses!</span>
                    <span class="inline-flex px-2">{!! \Illuminate\Support\Facades\Session::get('success') !!}</span>
                </div>
            </div>
        @endif
        @if(!$mhsw_mbkm->approved && !isset($from_noreg))
            <div class="py-3">
                <div
                    class="inline-flex items-center bg-white leading-none text-pink-600 rounded-full p-2 shadow text-teal text-sm">
                    <span class="inline-flex bg-pink-600 text-white rounded-full h-6 px-3 justify-center items-center">Perhatian</span>
                    <span class="inline-flex px-2">Program yang Anda ajukan belum mendapatkan approval dari Program Studi / Dosen Pembimbing Anda.</span>
                </div>
            </div>
        @endif
        @if(isset($from_noreg) && $from_noreg == true)
            <a href="{{url("/")}}" class="underline text-sm font-bold uppercase text-lg py-4">
                Kembali ke Halaman Utama &#707;
            </a>
        @endif

        <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="rounded-t bg-white mb-0 px-6 py-6">
                <div class="text-center flex justify-between">
                    <h6 class="text-blueGray-700 text-xl font-bold">
                        Status Pendaftaran Kegiatan MBKM
                    </h6>
                    @if(!isset($from_noreg))
                        <a href="{{url("/mbkm/daftar")}}"
                           class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                           type="button">
                            Edit Data
                        </a>
                    @endif

                </div>
            </div>
            <div class="flex-auto bg-gray-100 px-4 lg:px-10 py-10 pt-0">
                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                    Informasi Mahasiswa
                </h6>
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                Nama Lengkap
                            </label>
                            <input type="text" disabled
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   value="{{$mhsw_mbkm->getMhsw()->first()->name}}">
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                Nomor Induk Mahasiswa
                            </label>
                            <input type="number" disabled
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   value="{{$mhsw_mbkm->getMhsw()->first()->ident}}">
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                Jurusan
                            </label>
                            <input disabled type="text"
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   value="{{$mhsw_mbkm->getProdi()->first()->getJurusan()->first()->jurusan_name}}">
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                Program Studi
                            </label>
                            <input disabled type="text"
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   value="{{$mhsw_mbkm->getProdi()->first()->prodi_name}}">
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                Angkatan
                            </label>
                            <input disabled type="text"
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   value="{{$mhsw_mbkm->angkatan}}">
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                Semester
                            </label>
                            <input disabled type="text"
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   value="{{$mhsw_mbkm->semester}}">
                        </div>
                    </div>
                </div>

                <hr class="mt-6 border-b-1 border-blueGray-300">

                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                    Informasi Kegiatan MBKM
                </h6>
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                NIP Dosen Pembimbing (Pengajuan)
                            </label>
                            <input disabled type="number"
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   value="{{$mhsw_mbkm->nip_dospem}}">
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                Nama Dosen Pembimbing (Pengajuan)
                            </label>
                            <input disabled type="text"
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   value="{{$mhsw_mbkm->nama_dospem}}">
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                Model Kegiatan MBKM
                            </label>
                            <input disabled type="text"
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   value="{{$mhsw_mbkm->getModelMbkm()->first()->model_mbkm}}">
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                Durasi (Bulan)
                            </label>
                            <input disabled type="text"
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   value="{{$mhsw_mbkm->durasi}}">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                Lokasi Kegiatan MBKM
                            </label>
                            <input disabled type="text"
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   value="{{$mhsw_mbkm->lokasi_mbkm}}">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                Alamat Lokasi Kegiatan MBKM
                            </label>
                            <input disabled type="text"
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   value="{{$mhsw_mbkm->alamat_mbkm}}">
                        </div>
                    </div>

                </div>

                <hr class="mt-6 border-b-1 border-blueGray-300">

                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                    Deskripsi
                </h6>
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                Deskripsi / Lingkup Kegiatan yang akan dilakukan
                            </label>
                            <textarea disabled type="text"
                                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                      rows="4">{{$mhsw_mbkm->deskripsi_mbkm}}</textarea>
                        </div>
                    </div>
                </div>

                <hr class="mt-6 border-b-1 border-blueGray-300">

                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                    Informasi Lainnya
                </h6>
                <div class="w-full lg:w-12/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            No. Registrasi Kegiatan (Internal)
                        </label>
                        <input disabled type="text"
                               class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                               value="{{$mhsw_mbkm->id}}">
                    </div>
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            Status Persetujuan
                        </label>
                        <input disabled type="text"
                               class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                               value="{{$mhsw_mbkm->approved ? "Sudah disetujui" : "Belum Disetujui"}}">
                    </div>
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            Nama Pembimbing Industri
                        </label>
                        <input disabled type="text"
                               class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                               value="{{$mhsw_mbkm->pembimbing_mbkm_id === null ? "Belum Didaftarkan" : $mhsw_mbkm->getPembimbing()->first()->name}}">
                    </div>
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            Program Dikbud
                        </label>
                        <input disabled type="text"
                               class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                               value="{{$mhsw_mbkm->program_dikbud ? "Ya" : "Bukan Program Kemendikbud"}}">
                    </div>
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            Sharable URL
                        </label>
                        <a class="block border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                           href="{{url('/mbkm/noreg/' . $mhsw_mbkm->id)}}">{{url('/mbkm/noreg/' . $mhsw_mbkm->id)}}</a>
                    </div>
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            QR Code
                        </label>
                        <div id="qr" class="mb-3">

                        </div>
                    </div>
                </div>

                @canany(['dosen.*', 'pembimbing.*'])
                    <hr class="mt-6 border-b-1 border-blueGray-300">

                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Pengaturan Untuk Dosen Pembimbing / Program Studi / Pembimbing Industri
                    </h6>
                    <div class="w-full lg:w-12/12 px-4">
                        @can(['dosen.*'])
                            <div class="relative w-full mb-3">
                                <form method="post" action="{{url("/mbkm/approve")}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$mhsw_mbkm->id}}">
                                    @if(!$mhsw_mbkm->approved && $mhsw_mbkm->nip_dospem === \Illuminate\Support\Facades\Auth::user()->ident)
                                        <input type="hidden" name="approve" value="true">
                                        <x-button type="submit" class="ml-0">Setujui Pengajuan MBKM Mahasiswa</x-button>
                                    @elseif($mhsw_mbkm->approved && $mhsw_mbkm->nip_dospem === \Illuminate\Support\Facades\Auth::user()->ident)
                                        <input type="hidden" name="approve" value="">
                                        <x-button type="submit" class="ml-0">Batalkan Persetujuan MBKM Mahasiswa
                                        </x-button>
                                    @endif
                                </form>
                            </div>
                        @endcan
                        @can('dosen.create_pembimbing_user')
                            @include('layouts.modal_register')
                        @endcan
                    </div>
                @endcan
            </div>
        </div>
    </div>
</section>
