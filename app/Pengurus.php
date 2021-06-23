<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    protected $table = 'pengurus';
    protected $primaryKey = 'id';
    protected $fillable = ['nis', 'nama_pengurus', 'tmp_lahir', 'thn_lahir', 'jns_kelamin', 'alamat', 'thn_akademik', 'jabatan', 'src_pengurus'];
}
