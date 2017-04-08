<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peran extends Model
{
protected $table = 'peran';
public function pengguna(){
	return $this->belongsToMany(pengguna::class);
}   
}
