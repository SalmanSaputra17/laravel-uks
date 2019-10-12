@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Input Data Pasien
        </div>
        <div class="card-body">
          <form action="{{ route('pasien.store') }}" method="post">
            @csrf
            <div class="form-group has-feedback{{ $errors->has('nis') ? ' has-error' : '' }}">
              <label for="nis">NIS</label>
              <input type="number" class="form-control" name="nis" placeholder="NIS" value="{{ old('nis') }}">
              @if( $errors->has('nis') )
                <span class="help-block">
                  <p>{{ $errors->first('nis') }}</p>
                </span>
              @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('nama_pasien') ? ' has-error' : '' }}">
              <label for="nama_pasien">Nama Pasien</label>
              <input type="text" class="form-control" name="nama_pasien" placeholder="Nama Pasien" value="{{ old('nama_pasien') }}">
              @if( $errors->has('nama_pasien') )
                <span class="help-block">
                  <p>{{ $errors->first('nama_pasien') }}</p>
                </span>
              @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('rombel_id') ? ' has-error' : '' }}">
              <label for="rombel_id">Rombel</label>
               <select class="form-control" name="rombel_id" id="rombel_id">
                    <option disabled="disabled" selected>--pilih rombel--</option>
                  @foreach( $rombels as $rombel )
                    <option value="{{ $rombel->id }}">{{ $rombel->rombel }}</option>
                  @endforeach
              </select>
              @if( $errors->has('rombel_id') )
                <span class="help-block">
                  <p>{{ $errors->first('rombel_id') }}</p>
                </span>
              @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('rayon_id') ? ' has-error' : '' }}">
              <label for="rayon_id">Rayon</label>
               <select class="form-control" name="rayon_id" id="rayon_id">
                    <option disabled="disabled" selected>--pilih rayon--</option>
                  @foreach( $rayons as $rayon )
                    <option value="{{ $rayon->id }}">{{ $rayon->rayon }}</option>
                  @endforeach
              </select>
              @if( $errors->has('rayon_id') )
                <span class="help-block">
                  <p>{{ $errors->first('rayon_id') }}</p>
                </span>
              @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('jenis_sakit') ? ' has-error' : '' }}">
              <label for="jenis_sakit">Sakit yang diderita</label>
              <input type="text" class="form-control" name="jenis_sakit" placeholder="Sakit yang diderita" value="{{ old('jenis_sakit') }}">
              @if( $errors->has('jenis_sakit') )
                <span class="help-block">
                  <p>{{ $errors->first('jenis_sakit') }}</p>
                </span>
              @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('obat_id') ? ' has-error' : '' }}">
              <label for="obat_id">Obat yang diberikan</label>
              <select class="form-control" name="obat_id">
                    <option disabled="disabled" selected>--pilih obat--</option>
                  @foreach( $obats as $obat )
                    @if( $obat->jumlah != 0 )
                      <option value="{{ $obat->id }}">{{ $obat->nama_obat }}</option>
                    @endif
                  @endforeach
              </select>
              @if( $errors->has('obat_id') )
                <span class="help-block">
                  <p>{{ $errors->first('obat_id') }}</p>
                </span>
              @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('jumlah_obat') ? ' has-error' : '' }}">
              <label for="jumlah_obat">Jumlah Obat</label>
              <input type="number" class="form-control" name="jumlah_obat" placeholder="Jumlah Obat" value="{{ old('jumlah_obat') }}">
              @if( $errors->has('jumlah_obat') )
                <span class="help-block">
                  <p>{{ $errors->first('jumlah_obat') }}</p>
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
