<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMbkm extends Model
{
    protected $table = 'modelmbkms';

    use HasFactory;

    protected $fillable = [
        'user',
        'jurusan',
        'model_mbkm',
        'mhsw_mbkm_exist',
        'mhsw_mbkm',
    ];

    public function getMhsJurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_name');
    }
}
