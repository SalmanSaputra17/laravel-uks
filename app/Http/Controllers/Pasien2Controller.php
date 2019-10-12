<?php

namespace App\Http\Controllers;

use App\Pasien2;
use App\Rayon;
use App\Rombel;
use Illuminate\Http\Request;
use Excel;

class Pasien2Controller extends Controller
{

  public function index()
  {
    $pasiens2 = Pasien2::all();

    return view('pasien2.index', compact('pasiens2'));
  }

  public function create()
  {
    $rayons = Rayon::all();
    $rombels = Rombel::all();
    return view('pasien2.create', compact('rayons', 'rombels'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'nis' => 'required|min:8|max:8',
      'nama_pasien' => 'required',
      'rombel_id' => 'required',
      'rayon_id' => 'required',
      'jenis_sakit' => 'required'
    ]);

    $pasien = new Pasien2;
    $pasien->user_id = auth()->id();
    $pasien->nis = $request->nis;
    $pasien->nama_pasien = $request->nama_pasien;
    $pasien->rombel_id = $request->rombel_id;
    $pasien->rayon_id = $request->rayon_id;
    $pasien->jenis_sakit = $request->jenis_sakit;

    $pasien->save();

    return redirect()->route('pasien2.index')->with('success', 'Data berhasil disimpan');
  }
  
  public function destroy(Pasien2 $pasien2)
  {
    $pasien2->delete();
    return redirect()->route('pasien2.index')->with('success', 'Data berhasil dihapus');
  }

  public function search(Request $request)
  {
    $cari = $request->get('search');
    $pasiens2 = Pasien2::where('nama_pasien', 'LIKE', '%'.$cari.'%')->get();

    return view('pasien2.index', compact('pasiens2'));
  }

  public function export(Request $request)
  {
      
    $nama = 'laporan_pasien_'.date('Y-m-d_H-i-s');
    Excel::create($nama, function ($excel) use ($request){
      $excel->sheet('Laporan Pasien', function ($sheet) use ($request){

        $sheet->mergeCells('A1:G1');

        $sheet->row(1, function($row){
          $row->setFontFamily('Calibri');
          $row->setFontSize(11);
          $row->setAlignment('center');
          $row->setFontWeight('bold');
        });

        $sheet->row(1, array('LAPORAN DATA PASIEN YANG TIDAK DIBERI OBAT'));

        $sheet->row(2, function($row){
          $row->setFontFamily('Calibri');
          $row->setFontSize(11);
          $row->setAlignment('center');
          $row->setFontWeight('bold');
        });              

        $datas = Pasien2::select('nis', 'nama_pasien', 'rombel_id', 'rayon_id', 'jenis_sakit', 'user_id')->get();

        $sheet->row($sheet->getHighestRow(), function ($row){
          $row->setFontWeight('bold');
        });

        $datasheet = [];
        $datasheet[0] = array('NO', 'NIS', 'Nama Pasien', 'Rombel', 'Rayon', 'Penyakit', 'Petugas');

        $i = 1;

        foreach ($datas as $data) {
           
          $datasheet[$i] = array($i,
                              $data['nis'],
                              $data['nama_pasien'],
                              $data->rombel->rombel,
                              $data->rayon->rayon,
                              $data['jenis_sakit'],
                              $data->user->name
                           );
          $i++;

        }

        $sheet->fromArray($datasheet);

      });
    })->export('xls');

  }
    
}
