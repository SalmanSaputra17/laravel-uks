<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Obat;
use App\Rayon;
use App\Rombel;
use Auth;
use Illuminate\Http\Request;
use Excel;

class PasienController extends Controller
{
  public function index()
  {
    $pasiens = Pasien::all();

    return view('pasien.index', compact('pasiens'));
  }

  public function create()
  {
    $obats = Obat::all();
    $rayons = Rayon::all();
    $rombels = Rombel::all();
    return view('pasien.create', compact('obats', 'rayons', 'rombels'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'nis' => 'required|min:8|max:8',
      'nama_pasien' => 'required',
      'rombel_id' => 'required',
      'rayon_id' => 'required',
      'jenis_sakit' => 'required',
      'obat_id' => 'required',
      'jumlah_obat' => 'required'
    ]);

    $pasien = new Pasien;
    $pasien->user_id = auth()->id();
    $pasien->nis = $request->nis;
    $pasien->nama_pasien = $request->nama_pasien;
    $pasien->rombel_id = $request->rombel_id;
    $pasien->rayon_id = $request->rayon_id;
    $pasien->jenis_sakit = $request->jenis_sakit;
    $pasien->obat_id = $request->obat_id;
    $pasien->jumlah_obat = $request->jumlah_obat;

    $pasien->save();

    return redirect()->route('pasien.index')->with('success', 'Data berhasil disimpan');
  }

  public function show()
  {
    $pasiens = Pasien::latest()->paginate(env('PER_PAGE'));
    return view('home', compact('pasiens'));
  }

  public function destroy(Pasien $pasien)
  {
    $pasien->delete();
    return redirect()->route('pasien.index')->with('success', 'Data berhasil dihapus');
  }

  public function search(Request $request)
  {
    $cari = $request->get('search');
    $pasiens = Pasien::where('nama_pasien', 'LIKE', '%'.$cari.'%')->get();

    return view('Pasien.index', compact('pasiens'));
  }

  public function export(Request $request)
  {
      
    $nama = 'laporan_pasien_'.date('Y-m-d_H-i-s');
    Excel::create($nama, function ($excel) use ($request){
      $excel->sheet('Laporan Pasien', function ($sheet) use ($request){

        $sheet->mergeCells('A1:I1');

        $sheet->row(1, function($row){
          $row->setFontFamily('Calibri');
          $row->setFontSize(11);
          $row->setAlignment('center');
          $row->setFontWeight('bold');
        });

        $sheet->row(1, array('LAPORAN DATA PASIEN YANG DIBERI OBAT'));

        $sheet->row(2, function($row){
          $row->setFontFamily('Calibri');
          $row->setFontSize(11);
          $row->setAlignment('center');
          $row->setFontWeight('bold');
        });              

        $datas = Pasien::select('nis', 'nama_pasien', 'rombel_id', 'rayon_id', 'jenis_sakit', 'obat_id', 'jumlah_obat', 'user_id')->get();

        $sheet->row($sheet->getHighestRow(), function ($row){
          $row->setFontWeight('bold');
        });

        $datasheet = [];
        $datasheet[0] = array('NO', 'NIS', 'Nama Pasien', 'Rombel', 'Rayon', 'Penyakit', 'Obat', 'Jumlah Obat', 'Petugas');

        $i = 1;

        foreach ($datas as $data) {
           
          $datasheet[$i] = array($i,
                              $data['nis'],
                              $data['nama_pasien'],
                              $data->rombel->rombel,
                              $data->rayon->rayon,
                              $data['jenis_sakit'],
                              $data->obat->nama_obat,
                              $data['jumlah_obat'],
                              $data->user->name
                           );
          $i++;

        }

        $sheet->fromArray($datasheet);

      });
    })->export('xls');

  }

}
