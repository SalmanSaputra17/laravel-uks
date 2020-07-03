@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-8">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Input Fasilitas</li>
        </ol>
      </nav>

      <div class="card">
        <div class="card-header">
          Input Fasilitas
        </div>
        <div class="card-body">
          <form action="{{ route('fasilitas.store') }}" method="post">
            @csrf
            <div class="form-group has-feedback{{ $errors->has('nama_barang') ? ' has-error' : '' }}">
              <label for="nama_barang">Nama Barang</label>
              <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" value="{{ old('nama_barang') }}">
              @if( $errors->has('nama_barang') )
                <span class="help-block">
                  <p>{{ $errors->first('nama_barang') }}</p>
                </span>
              @endif
            </div>  
            <div class="form-group has-feedback{{ $errors->has('jumlah') ? ' has-error' : '' }}">
              <label for="jumlah">Jumlah</label>
              <input type="text" class="form-control" name="jumlah" placeholder="Jumlah" value="{{ old('jumlah') }}">
              @if( $errors->has('jumlah') )
                <span class="help-block">
                  <p>{{ $errors->first('jumlah') }}</p>
                </span>
              @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('tanggal_masuk') ? ' has-error' : '' }}">
              <label for="tanggal_masuk">Tanggal Masuk</label>
              <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk') }}">
              @if( $errors->has('tanggal_masuk') )
                <span class="help-block">
                  <p>{{ $errors->first('tanggal_masuk') }}</p>
                </span>
              @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('keterangan') ? ' has-error' : '' }}">
              <label for="keterangan">Keterangan</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="keterangan" id="inlineRadio" value="Barang Baru" checked>
                <label class="form-check-label" for="inlineRadio">Barang Baru</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="keterangan" id="inlineRadio1" value="Barang yang sudah ada">
                <label class="form-check-label" for="inlineRadio1">Barang Hasil Pebaikan</label>
              </div>
              @if( $errors->has('keterangan') )
                <span class="help-block">
                  <p>{{ $errors->first('keterangan') }}</p>
                </span>
              @endif
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
            <div class="form-group">
              <a href="{{ route('home') }}" class="btn btn-secondary btn-block">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
