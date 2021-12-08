<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuruModel extends Model
{
   // use HasFactory;
   public $timestamps = false;
    protected $table = "tabelguru";
    protected $fillable = [
        'id',
        'Nip',
        'Nik',
        'Nama',
        'Agama',
        'Tempatlahir',
        'Tanggallahir',
        'Jeniskelamin',
        'Alamat',
        'NoHp',
        'Email',
        'Jabatan',
        'Pangkat',
        'Golongan',
        'NUPTK',
        'StatusMenikah',
        'Goldarah',
        'NamaIbu',
        'Gelardepan',
        'Gelarbelakang',
        'Tahunmasuk',
        'Jabatansekolah',
        'reg_date'
    ];

}
