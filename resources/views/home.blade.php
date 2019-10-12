@extends('layouts.app')

@section('content')

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Home</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Hello !</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        Selamat Datang !
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>

    <section style="margin: 15px auto;">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="card custom">
              <div class="card-body">
                <h3 class="card-title"><strong>Daftar Obat</strong></h3>
                <p class="card-text">Tekan tombol dibawah untuk melihat obat yang tersedia.</p>
                <a href="{{ route('obat.index') }}" class="btn btn-info">Lihat daftar obat</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card custom">
              <div class="card-body">
                <h3 class="card-title"><strong>Daftar Pasien</strong></h3>
                <p class="card-text">Tekan tombol dibawah untuk melihat detail pasien masuk.</p>
                <a href="{{ route('pasien.index') }}" class="btn btn-info">Diberi obat</a>
                <a href="{{ route('pasien2.index') }}" class="btn btn-info">Tidak diberi obat</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card custom">
              <div class="card-body">
                <h3 class="card-title"><strong>Daftar Fasilitas</strong></h3>
                <p class="card-text">Tekan tombol dibawah untuk melihat fasilitas UKS.</p>
                <a href="{{ route('fasilitas.index') }}" class="btn btn-info">Lihat daftar fasilitas</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="list-group">
              <a href="{{ route('rayon.index') }}" class="list-group-item list-group-item-action">Daftar Rayon</a>
              <a href="{{ route('rombel.index') }}" class="list-group-item list-group-item-action">Daftar Rombel</a>
            </div>
          </div>
          <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                Pasien Terbaru
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="latestPatients">
                    <thead class="text-center">
                      <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Rombel</th>
                        <th>Rayon</th>
                        <th>Penyakit</th>
                        <th>Obat</th>
                        <th>Jumlah Obat</th>
                        <th>Petugas</th>
                        <th>Waktu</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <?php $i = 1; ?>
                      @foreach( $pasiens as $pasien )
                          <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $pasien->nis }}</td>
                            <td>{{ $pasien->nama_pasien }}</td>
                            <td>{{ $pasien->rombel->rombel }}</td>
                            <td>{{ $pasien->rayon->rayon }}</td>
                            <td>{{ $pasien->jenis_sakit }}</td>
                            <td>{{ $pasien->obat->nama_obat }}</td>
                            <td>{{ $pasien->jumlah_obat }}</td>
                            <td>{{ $pasien->user->name }}</td>
                            <td>{{ $pasien->created_at->diffForHumans() }}</td>
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
    </section>




@endsection
