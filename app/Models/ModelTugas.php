<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelTugas extends Model
{
    use HasFactory;
   public $timestamps = false;
    protected $table = "tb_tugas";
    protected $fillable = [
        'id',
        'nip',
        'id_kelompok_kelas',
        'type',
        'tgl_mulai',
        'tgl_selesai',
        'id_komponen_nilai',
        'keterangan',
        'created_at',
        'id_mapel',
        'tahun',
        'semester',
        'nama_tugas'
    ];

}
