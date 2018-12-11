<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hafalan extends Model
{
    protected $table = 'hafalans';
    protected $fillable = ['id_siswa', 'Juz', 'halaman', 'count', 'komentar'];
}
