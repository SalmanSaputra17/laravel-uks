<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
  protected $fillable = ['nama_barang', 'jumlah', 'keterangan', 'tanggal_masuk'];
}
