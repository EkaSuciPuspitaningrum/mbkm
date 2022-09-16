<?php

namespace App\Http\Controllers;

use App\Models\LogBook;
use App\Models\MahasiswaMbkm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogBookController extends Controller
{

    public function render(){
        $mhsw_mbkm_exist = false;
        $mhsw_mbkm = MahasiswaMbkm::where('user_id', Auth::user()->id)->first();
        if($mhsw_mbkm){
            $mhsw_mbkm_exist = true;
        }

        return view("mbkm.logbook.logbook", [
            'mhsw_mbkm_exist' => $mhsw_mbkm_exist,
            'mhsw_mbkm' => $mhsw_mbkm
        ]);
    }

    public function render_noreg(string $id){
    $from_noreg = true;
    $mahasiswa_mbkm_id = true;
    $mhsw_mbkm = LogBook::where('mahasiswa_mbkm_id', $id)->first();

    return view('mbkm.logbook.logbook_guest', [
        'mahasiswa_mbkm_id' => $mahasiswa_mbkm_id,
        'mhsw_mbkm' => $mhsw_mbkm,
        'from_noreg' => $from_noreg
    ]);
}

    public function render_form(){
        $mhsw_mbkm_exist = false;
        $mhsw_mbkm = MahasiswaMbkm::where('user_id', Auth::user()->id)->first();
        if($mhsw_mbkm){
            $mhsw_mbkm_exist = true;
        }

        return view("mbkm.logbook.logbook-form", [
            'mhsw_mbkm_exist' => $mhsw_mbkm_exist,
            'mhsw_mbkm' => $mhsw_mbkm
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'tanggal_log' => 'required|date',
            'tempat' => 'required|string',
            'uraian' => 'required|string',
            'rencana_pencapaian' => 'required|string',
            'id' => 'sometimes|numeric'
        ]);

        // LogBook::create([
        //     'tanggal_log'        => $request-> tanggal_log,
        //     'tempat'             => $request-> tempat,
        //     'uraian'             => $request-> uraian,
        //     'rencana_pencapaian' => $request-> rencana_pencapaian,
        //     'id'                 => $request-> mahasiswa_mbkm_id,
        //     'approved_by_dosen'    => $request-> approved_by_dosen,
        //     'approved_by_pembimbing' => $request-> approved_by_pembimbing,
        // ]);

        if($request->exists('id')){
            $logbook = LogBook::find($request->get('id'));
            if(!$this->checkIfUserHasAccessToLog(Auth::user(), $logbook)) return abort(403);
        }else{
            $logbook = new LogBook();
        }

        $mhsw_mbkm = Auth::user()->getMahasiswaMbkm()->first();

        if(!$mhsw_mbkm){
            return redirect()->back()->with('error', 'Anda belum mendaftar program MBKM! Daftar MBKM dahulu sebelum memasukkan entri logbook');
        }

        $logbook->mahasiswa_mbkm_id = $mhsw_mbkm->id;

        $logbook->fill($request->all());

        $logbook->save();
        return redirect()->to('/logbook');
    }

    public function checkIfUserHasAccessToLog(User $user, LogBook $logBook){
        $mhsw_mbkm = $logBook->getMahasiswaMbkm()->first();
        $mhsw = $mhsw_mbkm->getMhsw()->first();

        if($user === $mhsw){
            return true;
        }else{
            return false;
        }
    }

    public function data(){
        $logbook = LogBook::all();
        return view('mbkm.logbook.logbook',['
        logbook'=>$logbook
    ]);
    }
}
