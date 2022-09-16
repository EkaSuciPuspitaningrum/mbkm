<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Jurusan extends Model
{

    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'id',
        'jurusan_name'
    ];

    public function getJurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_name');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}

