<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $table = 'santri';
    public $timestamps = false;
    protected $fillable = ['nis', 'nama_santri', 'tmp_lahir', 'tgl_lahir', 'jenis_kelamin', 'jenjang', 'alamat', 'nama_ayah', 'nama_ibu', 'src_santri', 'src_wali', 'hp', 'wa'];   
}
