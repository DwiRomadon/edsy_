<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelBahanFile extends Model
{
    use HasFactory;
   public $timestamps = false;
    protected $table = "tb_bahan_file";
    protected $fillable = [
        'id',
        'id_bahan_ajar',
        'judul_file',
        'file',
    ];

}
