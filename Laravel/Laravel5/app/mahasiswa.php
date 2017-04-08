<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $table ='mahasiswa';
    protected $fillable =['nama','nim','pengguna_id'];

    public function Pengguna(){
		return $this->belongsTo(Pengguna::class);
	}

   public function getUsernameAttribute(){
	return $this->pengguna->username;
	}

	public function listMahasiswaDanNim()
	{
		$out = [];
		foreach ($this->all() as $mhs) {
			$out[$mhs->id] ="{$mhs->nama} ({$mhs->nim})";
		}
		return $out;
	}

	public function jadwal_matakuliah()
    {
        return $this->hasMany(jadwal_matakuliah::class);
    }

}
