@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-8">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Input Rayon</li>
        </ol>
      </nav>

      <div class="card">
        <div class="card-header">
          Input Rayon
        </div>
        <div class="card-body">
          <form action="{{ route('rayon.store') }}" method="post">
            @csrf
            <div class="form-group has-feedback{{ $errors->has('rayon') ? ' has-error' : '' }}">
              <label for="rayon">Nama Rayon</label>
              <input type="text" class="form-control" name="rayon" placeholder="Nama Rayon" value="{{ old('rayon') }}">
              @if( $errors->has('rayon') )
                <span class="help-block">
                  <p>{{ $errors->first('rayon') }}</p>
                </span>
              @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('pembimbing') ? ' has-error' : '' }}">
              <label for="pembimbing">Nama pembimbing</label>
              <input type="text" class="form-control" name="pembimbing" placeholder="Nama pembimbing" value="{{ old('pembimbing') }}">
              @if( $errors->has('pembimbing') )
                <span class="help-block">
                  <p>{{ $errors->first('pembimbing') }}</p>
                </span>
              @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('ruangan') ? ' has-error' : '' }}">
              <label for="ruangan">Ruangan</label>
              <input type="text" class="form-control" name="ruangan" placeholder="Ruangan" value="{{ old('ruangan') }}">
              @if( $errors->has('ruangan') )
                <span class="help-block">
                  <p>{{ $errors->first('ruangan') }}</p>
                </span>
              @endif
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
            <div class="form-group">
              <a href="{{ route('rayon.index') }}" class="btn btn-secondary btn-block">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
