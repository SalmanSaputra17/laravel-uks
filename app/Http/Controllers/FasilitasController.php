<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use Illuminate\Http\Request;
use Excel;

class FasilitasController extends Controller
{
  public function index()
  {
    $fasilitas = Fasilitas::all();
    return view('fasilitas.index', compact('fasilitas'));
  }

  public function create()
  {
    return view('fasilitas.create');
  }

  public function store()
  {
    $this->validate(request(), [
      'nama_barang' => 'required',
      'jumlah' => 'required',
      'keterangan' => 'required',
      'tanggal_masuk' => 'required'
    ]);

    Fasilitas::create([
      'nama_barang' => request('nama_barang'),
      'jumlah' => request('jumlah'),
      'keterangan' => request('keterangan'),
      'tanggal_masuk' => request('tanggal_masuk')
    ]);

    return redirect()->route('fasilitas.index')->with('success', 'Data berhasil disimpan');
  }

  public function show()
  {

  }

  public function edit(Fasilitas $fasilitas)
  {
    return view('fasilitas.edit', compact('fasilitas'));
  }

  public function update(Fasilitas $fasilitas)
  {
    $fasilitas->update([
      'nama_barang' => request('nama_barang'),
      'jumlah' => request('jumlah'),
      'keterangan' => request('keterangan'),
      'tanggal_masuk' => request('tanggal_masuk')
    ]);

    return redirect()->route('fasilitas.index')->with('success', 'Data berhsail diubah');
  }

  public function destroy(Fasilitas $fasilitas)
  {
    $fasilitas->delete();
    return redirect()->route('fasilitas.index')->with('success', 'Data berhasil dihapus');
  }

  public function search(Request $request)
  {
    $cari = $request->get('search');
    $fasilitas = Fasilitas::where('nama_barang', 'LIKE', '%'.$cari.'%')->get();
    return view('fasilitas.index', compact('fasilitas'));
  }

  public function export(Request $request)
  {
      
    $nama = 'laporan_fasilitas_'.date('Y-m-d_H-i-s');
    Excel::create($nama, function ($excel) use ($request){
      $excel->sheet('Laporan Fasilitas', function ($sheet) use ($request){

        $sheet->mergeCells('A1:E1');

        $sheet->row(1, function($row){
          $row->setFontFamily('Calibri');
          $row->setFontSize(11);
          $row->setAlignment('center');
          $row->setFontWeight('bold');
        });

        $sheet->row(1, array('LAPORAN DATA FASILITAS'));

        $sheet->row(2, function($row){
          $row->setFontFamily('Calibri');
          $row->setFontSize(11);
          $row->setAlignment('center');
          $row->setFontWeight('bold');
        });              

        $datas = Fasilitas::select('nama_barang', 'jumlah', 'tanggal_masuk', 'keterangan')->get();

        $sheet->row($sheet->getHighestRow(), function ($row){
          $row->setFontWeight('bold');
        });

        $datasheet = [];
        $datasheet[0] = array('NO', 'Nama Barang', 'Jumlah', 'Tanggal Masuk', 'Keterangan');

        $i = 1;

        foreach ($datas as $data) {
           
          $datasheet[$i] = array($i,
                              $data['nama_barang'],
                              $data['jumlah'],
                              $data['tanggal_masuk'],
                              $data['keterangan']
                           );
          $i++;

        }

        $sheet->fromArray($datasheet);

      });
    })->export('xls');

  }


}
