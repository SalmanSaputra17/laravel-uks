@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-8">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Data Rayon</li>
        </ol>
      </nav>

      <div class="card">
        <div class="card-header">
          Edit Data Rayon
        </div>
        <div class="card-body">
          <form class="form" action="{{ route('rayon.update', $rayon) }}" method="post">
          @csrf
          {{ method_field('PATCH') }}
          <div class="form-group">
            <label for="rayon">Nama Rayon</label>
            <input type="text" class="form-control" name="rayon" value="{{ $rayon->rayon }}">
          </div>
          <div class="form-group">
            <label for="pembimbing">Pembimbing</label>
            <input type="text" class="form-control" name="pembimbing" value="{{ $rayon->pembimbing }}">
          </div>
          <div class="form-group">
            <label for="ruangan">Ruangan</label>
            <input type="text" class="form-control" name="ruangan" value="{{ $rayon->ruangan }}">
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
