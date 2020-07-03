@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-8">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Data Fasilitas</li>
        </ol>
      </nav>

      <div class="card">
        <div class="card-header">
          Edit Data Fasilitas
        </div>
        <div class="card-body">
          <form class="form" action="{{ route('fasilitas.update', $fasilitas) }}" method="post">
          @csrf
          {{ method_field('PATCH') }}
          <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" value="{{ $fasilitas->nama_barang }}">
          </div>
          <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="text" class="form-control" name="jumlah" value="{{ $fasilitas->jumlah }}">
          </div>
          <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" class="form-control" name="tanggal_masuk" value="{{ $fasilitas->tanggal_masuk }}">
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="keterangan" id="inlineRadio" value="Barang Baru"
              @if( $fasilitas['keterangan'] == 'Barang Baru' )
                {{ "checked" }}
              @endif
              >
              <label class="form-check-label" for="inlineRadio">Barang Baru</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="keterangan" id="inlineRadio1" value="Barang yang sudah ada"
              @if( $fasilitas['keterangan'] == 'Barang yang sudah ada' )
                {{ "checked" }}
              @endif
              >
              <label class="form-check-label" for="inlineRadio1">Barang Hasil Pebaikan</label>
            </div>
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
