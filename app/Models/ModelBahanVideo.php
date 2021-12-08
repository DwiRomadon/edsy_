<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelBahanVideo extends Model
{
    use HasFactory;
   public $timestamps = false;
    protected $table = "tb_bahan_video";
    protected $fillable = [
        'id',
        'id_bahan_ajar',
        'judul_video',
        'link',
    ];

}
