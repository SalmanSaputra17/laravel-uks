<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien2 extends Model
{
    protected $table = 'pasien2';

    protected $fillable = ['nis', 'nama_pasien', 'rombel_id', 'rayon_id', 'jenis_sakit'];

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function rayon()
    {
      return $this->belongsTo('App\Rayon');
    }

    public function rombel()
    {
      return $this->belongsTo('App\Rombel');
    }
}
