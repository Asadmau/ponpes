<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';
    protected $fillable = ['nama_kamar', 'pengurus_id',  'jml_lemari'];
    // 'no_lemari',
    protected $primaryKey = 'id';

    public function Pengurus()
    {
        return $this->belongsTo(Pengurus::class, 'pengurus_id');
    }
}
