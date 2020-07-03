@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Daftar Pasien</li>
        </ol>
      </nav>
      <a href="{{ route('pasien2.export') }}" class="btn btn-success btn-sm" style="margin-bottom: 15px;">Export Excel</a>
      <div class="card">
        <div class="card-header">
          Data Pasien
        </div>
        <div class="card-body">
          <form class="form-inline" action="{{ route('pasien2.search') }}">
            <div class="form-group mb-2">
              <label for="keyword">Cari nama pasien</label>
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" class="form-control" id="keyword" name="search" placeholder="Cari nama pasien">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
          </form>
          <div class="table-responsive">
            <table class="table table-striped table-hover" id="dataPasien">
              <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama Pasien</th>
                  <th>Rombel</th>
                  <th>Rayon</th>
                  <th>Penyakit</th>
                  <th>Petugas</th>
                  <th>Waktu</th>
                  <th></th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php $i = 1; ?>
                @foreach( $pasiens2 as $pasien )
                    <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $pasien->nis }}</td>
                      <td>{{ $pasien->nama_pasien }}</td>
                      <td>{{ $pasien->rombel->rombel }}</td>
                      <td>{{ $pasien->rayon->rayon }}</td>
                      <td>{{ $pasien->jenis_sakit }}</td>
                      <td>{{ $pasien->user->name }}</td>
                      <td>{{ $pasien->created_at->diffForHumans() }}</td>
                      <td>
                        <form action="{{ route('pasien2.delete', $pasien) }}" method="post">
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
