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
        @if(isset($from_noreg) && $from_noreg == true)
            <a href="{{url("/")}}" class="underline text-sm font-bold uppercase text-lg py-4">
                Kembali ke Halaman Utama &#707;
            </a>
        @endif
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
        <div class="rounded-t bg-white mb-0 px-6 py-6">
            <div class="text-center flex justify-between">
                <h6 class="text-blueGray-700 text-xl font-bold">
                    Daftar LogBook Kegiatan MBKM
                </h6>
                @if(!isset($from_noreg))
                        <a href="{{url("/logbook/data")}}"
                           class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                           type="button">
                            Tambah Logbook
                        </a>
                    @endif
            </div>
        </div>
        <div class="data-table text-center flex items-center justify-center table-responsive">
            <table class="table-bordered table-striped table-hover table display">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Tempat</th>
                        <th>Uraian</th>
                        <th>Rencana</th>
                        <th>Persetujuan Dosen</th>
                        <th>Persetujuan Pembimbing</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach ($logbook as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ date('d F Y', strtotime($row->tanggal_log)) }}</td>
                            <td>{{ $row->tempat }}</td>
                            <td>{{ $row->uraian }}</td>
                            <td>{{ $row->rencana_pencapaian }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>
