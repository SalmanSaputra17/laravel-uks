<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $fillable = ['nama_obat', 'jumlah', 'jenis_obat', 'tanggal_masuk','keterangan'];
}
