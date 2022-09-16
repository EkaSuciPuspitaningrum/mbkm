<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\MahasiswaMbkm;
use App\Models\ModelMbkm;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MahasiswaMBKMController extends Controller
{
    public function render_form(){
        $mhsw_mbkm_exist = false;
        $mhsw_mbkm = MahasiswaMbkm::where('user_id', Auth::user()->id)->first();
        if($mhsw_mbkm){
            $mhsw_mbkm_exist = true;
        }

        $user = Auth::user();
        $jurusan = Jurusan::all();
        $model_mbkm = ModelMbkm::all();
        
        $users_jurusan = $user->getMhsJurusan()->first();


        return view('dashboard', [
            'user' => $user,
            'jurusan' => $jurusan,
            'users_jurusan' => $users_jurusan,
            'model_mbkm' => $model_mbkm,
            'mhsw_mbkm_exist' => $mhsw_mbkm_exist,
            'mhsw_mbkm' => $mhsw_mbkm
        ]);
    }

    public function render_dashboard(){
        $mhsw_mbkm_exist = false;
        $mhsw_mbkm = MahasiswaMbkm::where('user_id', Auth::user()->id)->first();
        if($mhsw_mbkm){
            $mhsw_mbkm_exist = true;
        }

        return view('mbkm', [
            'mhsw_mbkm_exist' => $mhsw_mbkm_exist,
            'mhsw_mbkm' => $mhsw_mbkm
        ]);
    }

    public function render_noreg(string $id){
        $from_noreg = true;
        $mhsw_mbkm_exist = true;
        $mhsw_mbkm = MahasiswaMbkm::where('id', $id)->first();

        return view('mbkm_guest', [
            'mhsw_mbkm_exist' => $mhsw_mbkm_exist,
            'mhsw_mbkm' => $mhsw_mbkm,
            'from_noreg' => $from_noreg
        ]);
    }

    public function approve(Request $request){
        $mhsw_mbkm = MahasiswaMbkm::where('id', $request->post('id'))->first();
        $approved = !($request->get('approve') === null);
        if($approved){
            $mhsw_mbkm->setApproved(true, Auth::user()->id);
        }else{
            $mhsw_mbkm->setApproved(false);
        }
        $mhsw_mbkm->setApproved($approved, Auth::user()->id);
        return redirect()->back()->with('success', $mhsw_mbkm->approved ? "Pengajuan MBKM ini telah disetujui" : "Persetujuan MBKM ini telah dibatalkan");
    }

    public function create_pembimbing(Request $request){
        Auth::user()->can(['dosen.create_pembimbing_user']);
        $request->validate([
            'email' => 'email|required',
            'mbkm_id' => 'required'
        ]);

        $pembimbing_user = User::where('email', $request->get('email'))->first();
        $mhsw_mbkm = MahasiswaMbkm::where('id', $request->get('mbkm_id'))->first();

        if($pembimbing_user){
            $mhsw_mbkm->pembimbing_mbkm_id = $pembimbing_user->id;
            $mhsw_mbkm->save();
        }else{
            $request->validate([
                'name' => 'required|string',
                'password' => 'required|string|min:8'
            ]);
            $pembimbing_user = new User();

            $pembimbing_user->fill($request->all());
            $pembimbing_user->password = Hash::make($request->get('password'));
            $pembimbing_user->assignRole('pembimbing');
            $pembimbing_user->save();

            $mhsw_mbkm->pembimbing_mbkm_id = $pembimbing_user->id;
            $mhsw_mbkm->save();
        }

        return redirect()->back()->with('success', 'Pembimbing telah didaftarkan dan/atau dikaitkan ke MBKM ini!');
    }

    public function store(Request $request){
        $request->validate([
            'model_mbkm_id' => 'numeric|required',
            'prodi_id' => 'numeric|required',
            'angkatan' => 'numeric|required|gte:2017',
            'semester' => 'numeric|required|gte:1|lte:8',
            'durasi' => 'numeric|required|gte:1|lte:12',
            'nip_dospem' => 'numeric|required',
            'nama_dospem' => 'string|required',
            'lokasi_mbkm' => 'string|required',
            'alamat_mbkm' => 'string|required',
            'deskripsi_mbkm' => 'string',
            'program_dikbud' => 'boolean'
        ]);

        $mhsw_mbkm = MahasiswaMbkm::where('user_id', Auth::user()->id)->first();
        $data = $request->all();
        if($mhsw_mbkm){
            $mhsw_mbkm->fill($data);
        }else{
            $mhsw_mbkm = new MahasiswaMbkm();
            $data['user_id'] = Auth::user()->id;
            $data['id'] = Str::orderedUuid();
            $mhsw_mbkm->fill($data);
        }
        $mhsw_mbkm->save();
        return redirect()->to('/mbkm');
    }

    public static function getAllProdiWithinJurusan(int $jurusan_id){
        return Prodi::where('jurusan_id', $jurusan_id)->get();
    }



}
