<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
	protected $table = 'anggota';
    protected $fillable = ['id', 'user_id','nis', 'nama', 'jk','kelas_id','juz','halaman', 'count','komentar'];


    /**
     * Method One To One
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    /**
     * Method One To Many
     */
    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }
}
