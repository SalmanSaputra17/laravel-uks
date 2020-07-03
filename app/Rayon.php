<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    protected $fillable = ['rayon', 'pembimbing', 'ruangan'];

    public function pasien()
    {
    	return $this->hasMany('App\Pasien', 'rayon_id', 'id');
    }

    public function pasien2()
    {
    	return $this->hasMany('App\Pasien2', 'rayon_id', 'id');
    }
}