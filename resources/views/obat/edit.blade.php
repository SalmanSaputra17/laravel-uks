@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-8">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Data Obat</li>
        </ol>
      </nav>

      <div class="card">
        <div class="card-header">
          Edit Data Obat
        </div>
        <div class="card-body">
          <form class="form" action="{{ route('obat.update', $obat) }}" method="post">
          @csrf
          {{ method_field('PATCH') }}
          <div class="form-group">
            <label for="nama_obat">Nama Obat</label>
            <input type="text" class="form-control" name="nama_obat" value="{{ $obat->nama_obat }}">
          </div>
          <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" value="{{ $obat->jumlah }}">
          </div>
          <div class="form-group">
            <label for="jenis_obat">Jenis Obat</label>
            <select class="form-control" name="jenis_obat">
              <option disabled="disabled" selected>--pilih jenis obat--</option>
              <option value="pil" 
              @if( $obat['jenis_obat'] == 'pil' )
                {{ "selected" }}
              @endif
              >Pil</option>
              <option value="Kapsul"
              @if( $obat['jenis_obat'] == 'Kapsul' )
                {{ "selected" }}
              @endif
              >Kapsul</option>
            </select>
          </div>
          <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" class="form-control" name="tanggal_masuk" value="{{ $obat->tanggal_masuk }}">
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" rows="5" class="form-control">{{ $obat->keterangan }}</textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Save</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
