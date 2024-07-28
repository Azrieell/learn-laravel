<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // protected $table = 'siswas';
    protected $fillable = [
        'nama',
        'alamat',
        'no_telpon',
        'jurusan_id'
    ];

    public function jurusan(){

        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
