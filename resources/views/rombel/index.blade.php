@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Daftar Rombel</li>
        </ol>
      </nav>

      <a href="{{ route('rombel.create') }}" class="btn btn-info btn-sm" style="margin-bottom: 15px;">Tambah Rombel</a>

      <div class="card">
        <div class="card-header">
          Data Rombel
        </div>
        <div class="card-body">
          <form class="form-inline" action="{{ route('rombel.search') }}">
            <div class="form-group mb-2">
              <label for="keyword">Cari nama rombel</label>
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" class="form-control" id="keyword" name="search" placeholder="Cari nama rombel">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
          </form>
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataRombel">
              <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>Nama Rombel</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php $i = 1; ?>
                @foreach( $rombels as $rombel )
                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $rombel->rombel }}</td>
                    <td>
                      <form action="{{ route('rombel.edit', $rombel) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary">Ubah</button>
                      </form>
                    </td>
                    <td>
                      <form action="{{ route('rombel.delete', $rombel) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ?')">Hapus</button>
                      </form>
                    </td>
                  </tr>
                <?php $i++; ?>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
