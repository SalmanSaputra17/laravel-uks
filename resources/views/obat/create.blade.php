@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-8">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Input Obat</li>
        </ol>
      </nav>

      <div class="card">
        <div class="card-header">
          Input Obat
        </div>
        <div class="card-body">
          <form action="{{ route('obat.store') }}" method="post">
            @csrf
            <div class="form-group has-feedback{{ $errors->has('nama_obat') ? ' has-error' : '' }}">
              <label for="nama_obat">Nama Obat</label>
              <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat" value="{{ old('nama_obat') }}">
              @if( $errors->has('nama_obat') )
                <span class="help-block">
                  <p>{{ $errors->first('nama_obat') }}</p>
                </span>
              @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('jumlah') ? ' has-error' : '' }}">
              <label for="jumlah">Jumlah</label>
              <input type="number" class="form-control" name="jumlah" placeholder="Jumlah" value="{{ old('jumlah') }}">
              @if( $errors->has('jumlah') )
                <span class="help-block">
                  <p>{{ $errors->first('jumlah') }}</p>
                </span>
              @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('jenis_obat') ? ' has-error' : '' }}">
              <label for="jenis_obat">Jenis Obat</label>
              <select class="form-control" name="jenis_obat">
                <option disabled="disabled" selected>--pilih jenis obat--</option>
                <option value="pil">Pil</option>
                <option value="Kapsul">Kapsul</option>
              </select>
              @if( $errors->has('jenis_obat') )
                <span class="help-block">
                  <p>{{ $errors->first('jenis_obat') }}</p>
                </span>
              @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('tanggal_masuk') ? ' has-error' : '' }}">
              <label for="tanggal_masuk">Tanggal Masuk</label>
              <input type="date" class="form-control" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}">
              @if( $errors->has('tanggal_masuk') )
                <span class="help-block">
                  <p>{{ $errors->first('tanggal_masuk') }}</p>
                </span>
              @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('keterangan') ? ' has-error' : '' }}">
              <label for="keterangan">Keterangan</label>
              <textarea name="keterangan" rows="5" placeholder="Keterangan" class="form-control">{{ old('keterangan') }}</textarea>
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
