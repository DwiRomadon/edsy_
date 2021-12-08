<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelMateriTugas extends Model
{
    use HasFactory;
   public $timestamps = false;
    protected $table = "tabel_bahan_ajar";
    protected $fillable = [
        'id',
        'nip',
        'mapel_id',
        'judul',
        'keterangan',
        'aktiv',
        'tingkat_kelas',
        'created_at',
    ];

}
