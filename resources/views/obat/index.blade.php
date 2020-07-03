@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Daftar Obat</li>
        </ol>
      </nav>
      <a href="{{ route('obat.export') }}" class="btn btn-success btn-sm" style="margin-bottom: 15px;">Export Excel</a>
      <div class="card">
        <div class="card-header">
          Data Obat
        </div>
        <div class="card-body">
          <form class="form-inline" action="{{ route('obat.search') }}">
            <div class="form-group mb-2">
              <label for="keyword">Cari nama obat</label>
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" class="form-control" id="keyword" name="search" placeholder="Cari nama obat">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
          </form>
          <div class="table-responsive">
            <table class="table table-striped table-hover" id="dataObat">
              <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>Nama Obat</th>
                  <th>Jumlah</th>
                  <th>Jenis Obat</th>
                  <th>Tanggal Masuk</th>
                  <th>Keterangan</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php $i = 1; ?>
                @foreach( $obats as $obat )
                  @if( $obat->jumlah == 0 )
                    <tr style="background-color: #E74C3C;">
                      <td>{{ $i }}</td>
                      <td>{{ $obat->nama_obat }}</td>
                      <td>{{ $obat->jumlah }}</td>
                      <td>{{ $obat->jenis_obat }}</td>
                      <td>{{ $obat->tanggal_masuk }}</td>
                      <td>{{ $obat->keterangan }}</td>
                      <td>
                        <form action="{{ route('obat.edit', $obat) }}" method="get">
                          @csrf
                          <button type="submit" class="btn btn-primary">Ubah</button>
                        </form>
                      </td>
                      <td>
                        <form action="{{ route('obat.delete', $obat) }}" method="post">
                          @csrf
                          {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ?')">Hapus</button>
                        </form>
                      </td>
                    </tr>
                  @else
                    <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $obat->nama_obat }}</td>
                      <td>{{ $obat->jumlah }}</td>
                      <td>{{ $obat->jenis_obat }}</td>
                      <td>{{ $obat->tanggal_masuk }}</td>
                      <td>{{ $obat->keterangan }}</td>
                      <td>
                        <form action="{{ route('obat.edit', $obat) }}" method="get">
                          @csrf
                          <button type="submit" class="btn btn-primary">Ubah</button>
                        </form>
                      </td>
                      <td>
                        <form action="{{ route('obat.delete', $obat) }}" method="post">
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

