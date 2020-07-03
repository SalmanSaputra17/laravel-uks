@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Daftar Rayon</li>
        </ol>
      </nav>

      <a href="{{ route('rayon.create') }}" class="btn btn-info btn-sm" style="margin-bottom: 15px;">Tambah Rayon</a>

      <div class="card">
        <div class="card-header">
          Data Rayon
        </div>
        <div class="card-body">
          <form class="form-inline" action="{{ route('rayon.search') }}">
            <div class="form-group mb-2">
              <label for="keyword">Cari nama rayon</label>
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" class="form-control" id="keyword" name="search" placeholder="Cari nama rayon">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
          </form>
          <div class="table-responsive">
            <table class="table table-striped table-hover" id="dataRayon">
              <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>Nama Rayon</th>
                  <th>Pembimbing</th>
                  <th>Ruangan</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php $i = 1; ?>
                @foreach( $rayons as $rayon )
                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $rayon->rayon }}</td>
                    <td>{{ $rayon->pembimbing }}</td>
                    <td>{{ $rayon->ruangan }}</td>
                    <td>
                      <form action="{{ route('rayon.edit', $rayon) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary">Ubah</button>
                      </form>
                    </td>
                    <td>
                      <form action="{{ route('rayon.delete', $rayon) }}" method="post">
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
