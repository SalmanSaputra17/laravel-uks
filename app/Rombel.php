<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $fillable = ['rombel'];

    public function pasien()
    {
    	return $this->hasMany('App\Pasien', 'rombel_id', 'id');
    }

    public function pasien2()
    {
    	return $this->hasMany('App\Pasien2', 'rombel_id', 'id');
    }
}
