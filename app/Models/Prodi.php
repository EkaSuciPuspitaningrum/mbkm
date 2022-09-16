<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodis';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prodi_name',
        'jurusan_id',
    ];

    public function getJurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
