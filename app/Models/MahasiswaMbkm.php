<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaMbkm extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa_mbkms';

    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [
        'id',
        'user_id',
        'dosbing_mbkm_id',
        'pembimbing_mbkm_id',
        'model_mbkm_id',
        'prodi_id',
        'angkatan',
        'semester',
        'durasi',
        'nip_dospem',
        'nama_dospem',
        'lokasi_mbkm',
        'alamat_mbkm',
        'deskripsi_mbkm',
        'approved',
        'program_dikbud'
    ];

    public function getProdi(){
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function getModelMbkm(){
        return $this->belongsTo(ModelMbkm::class, 'model_mbkm_id');
    }

    public function getMhsw(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getDosbing(){
        return $this->belongsTo(User::class, 'dosbing_mbkm_id');
    }

    public function getPembimbing(){
        return $this->belongsTo(User::class, 'pembimbing_mbkm_id');
    }

    public function getAllLogs(){
        return $this->hasMany(LogBook::class, 'mahasiswa_mbkm_id');
    }

    public function setApproved(bool $boolean = true, int $dosbingId = null){
        $this->approved = $boolean;
        $this->dosbing_mbkm_id = $dosbingId;
        $this->save();
    }
}
