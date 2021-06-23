<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'table_images';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_gambar', 'src_images'];
}
