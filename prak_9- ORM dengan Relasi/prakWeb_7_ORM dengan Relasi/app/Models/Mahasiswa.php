<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $fillable = [
        'nim',
        'nama',
        'kelas',
        'jurusan',
        'email',
        'tanggal_lahir',
        'no_handphone',
    ];

    public $timestamps = false;

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
