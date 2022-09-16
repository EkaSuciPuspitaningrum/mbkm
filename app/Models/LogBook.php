<?php

namespace App\Models;

use App\Models\Jurusan;
use App\Models\MahasiswaMbkm;
use App\Models\ModelMbkm;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogBook extends Model
{
    use HasFactory;

    protected $table = 'log_books';

    protected $casts = [
        'mahasiswa_mbkm_id' => 'string'
    ];

    protected $fillable = [
        'mahasiswa_mbkm_id',
        'tanggal_log',
        'tempat',
        'uraian',
        'rencana_pencapaian',
        'approved_by_dosen',
        'approved_by_pembimbing'
    ];

    public function getMahasiswaMbkm(){
        return $this->belongsTo(MahasiswaMbkm::class, 'mahasiswa_mbkm_id');
    }

    public function setApprovedByDosen(bool $approved){
        $this->approved_by_dosen($approved);
        $this->save();
    }

    public function setApprovedByPembimbing(bool $approved){
        $this->approved_by_pembimbing($approved);
        $this->save();
    
    } 
}