<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $guarded = ['id'];

    public $timestamps = false;

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function matakuliah()
    {
        // define the relationship
        return $this->belongsToMany(MataKuliah::class,'mahasiswa_matakuliah','mahasiswa_id','mata_kuliah_id')->withPivot('nilai');
    }
}
