<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = ['nis', 'nama', 'rombel_id', 'rayon_id', 'jenis_sakit', 'obat_id', 'jumlah_obat'];

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function obat()
    {
      return $this->belongsTo('App\Obat');
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
