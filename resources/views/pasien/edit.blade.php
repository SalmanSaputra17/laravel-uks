@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-8">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Data Pasien</li>
        </ol>
      </nav>

      <div class="card">
        <div class="card-header">
          Edit Data Pasien
        </div>
        <div class="card-body">
          <form class="form" action="{{ route('pasien.update', $pasien) }}" method="post">
          @csrf
          {{ method_field('PATCH') }}
          <div class="form-group">
            <label for="nis">NIS</label>
            <input type="number" class="form-control" name="nis" value="{{ $pasien->nis }}" readonly>
          </div>
          <div class="form-group">
            <label for="nama">Nama Pasien</label>
            <input type="text" class="form-control" name="nama" value="{{ $pasien->nama_pasien }}">
          </div>
          <div class="form-group">
            <label for="rombel">Rombel</label>
            <input type="text" class="form-control" name="rombel" value="{{ $pasien->rombel }}">
          </div>
          <div class="form-group">
            <label for="rayon">Rayon</label>
            <input type="text" class="form-control" name="rayon" value="{{ $pasien->rayon }}">
          </div>
          <div class="form-group">
            <label for="jenis_sakit">Sakit yang diderita</label>
            <input type="text" class="form-control" name="jenis_sakit" value="{{ $pasien->jenis_sakit }}">
          </div>
          <div class="form-group">
            <label for="obat_id">Obat yang diberikan</label>
            <select name="obat_id" id="obat_id" class="form-control">
                <option disabled="disabled" selected>--pilih obat--</option>
              @foreach( $obats as $obat )
                <option value="{{ $obat->id }}"
                  @if( $obat->id == $pasien->obat_id )  
                    selected
                  @endif
                >{{ $obat->nama_obat }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="jumlah_obat">Jumlah Obat</label>
            <input type="number" class="form-control" name="jumlah_obat" value="{{ $pasien->jumlah_obat }}">
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
