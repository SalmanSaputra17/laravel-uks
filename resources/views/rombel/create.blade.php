@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-8">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Input Rombel</li>
        </ol>
      </nav>

      <div class="card">
        <div class="card-header">
          Input Rombel
        </div>
        <div class="card-body">
          <form action="{{ route('rombel.store') }}" method="post">
            @csrf
            <div class="form-group has-feedback{{ $errors->has('rombel') ? ' has-error' : '' }}">
              <label for="rombel">Nama Rombel</label>
              <input type="text" class="form-control" name="rombel" placeholder="Nama Rombel" value="{{ old('rombel') }}">
              @if( $errors->has('rombel') )
                <span class="help-block">
                  <p>{{ $errors->first('rombel') }}</p>
                </span>
              @endif
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
            <div class="form-group">
              <a href="{{ route('rombel.index') }}" class="btn btn-secondary btn-block">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
