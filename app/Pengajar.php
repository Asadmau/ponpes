<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    protected $table = 'pengajar';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_pengajar', 'src_pengajar'];

    public $timestamp = true;
}
