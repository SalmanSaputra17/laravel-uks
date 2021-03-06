@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Daftar Fasilitas</li>
        </ol>
      </nav>

      <a href="{{ route('fasilitas.export') }}" class="btn btn-success btn-sm pull-left" style="margin-bottom: 15px;">Export Excel</a>  

      <div class="card">
        <div class="card-header">
          Data Fasilitas
        </div>
        <div class="card-body">
          <form class="form-inline" action="{{ route('fasilitas.search') }}">
            <div class="form-group mb-2">
              <label for="keyword">Cari nama fasilitas</label>
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" class="form-control" id="keyword" name="search" placeholder="Cari nama fasilitas">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
          </form>
          <div class="table-responsive">
            <table class="table table-striped table-hover" id="dataFasilitas">
              <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Keterangan</th>
                  <th>Tanggal Masuk</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php $i = 1; ?>
                @foreach( $fasilitas as $f )
                  @if( $f->keterangan == "Barang yang sudah ada" )
                    <tr style="background-color: #9CAAB9;">
                      <td>{{ $i }}</td>
                      <td>{{ $f->nama_barang }}</td>
                      <td>{{ $f->jumlah }}</td>
                      <td>{{ $f->keterangan }}</td>
                      <td>{{ $f->tanggal_masuk }}</td>
                      <td>
                        <form action="{{ route('fasilitas.edit', $f) }}" method="get">
                          @csrf
                          <button type="submit" class="btn btn-primary">Ubah</button>
                        </form>
                      </td>
                      <td>
                        <form action="{{ route('fasilitas.delete', $f) }}" method="post">
                          @csrf
                          {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ?')">Hapus</button>
                        </form>
                      </td>
                    </tr>
                  @else
                    <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $f->nama_barang }}</td>
                      <td>{{ $f->jumlah }}</td>
                      <td>{{ $f->keterangan }}</td>
                      <td>{{ $f->tanggal_masuk }}</td>
                      <td>
                        <form action="{{ route('fasilitas.edit', $f) }}" method="get">
                          @csrf
                          <button type="submit" class="btn btn-primary">Ubah</button>
                        </form>
                      </td>
                      <td>
                        <form action="{{ route('fasilitas.delete', $f) }}" method="post">
                          @csrf
                          {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ?')">Hapus</button>
                        </form>
                      </td>
                    </tr>
                  @endif
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
