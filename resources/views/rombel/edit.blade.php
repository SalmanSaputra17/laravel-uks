@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-8">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Data Rombel</li>
        </ol>
      </nav>

      <div class="card">
        <div class="card-header">
          Edit Data Rombel
        </div>
        <div class="card-body">
          <form class="form" action="{{ route('rombel.update', $rombel) }}" method="post">
          @csrf
          {{ method_field('PATCH') }}
          <div class="form-group">
            <label for="rombel">Nama Rombel</label>
            <input type="text" class="form-control" name="rombel" value="{{ $rombel->rombel }}">
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
