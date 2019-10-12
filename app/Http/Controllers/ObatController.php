<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obat;
// use Yajra\Datatables\Datatables;
use Excel;

class ObatController extends Controller
{
    public function index()
    {
      $obats = Obat::all();
      return view('obat.index', compact('obats'));
    }

    public function create()
    {
      return view('obat.create');
    }

    public function store()
    {
      $this->validate(request(), [
        'nama_obat' => 'required',
        'jumlah' => 'required',
        'jenis_obat' => 'required',
        'tanggal_masuk' => 'required',
        'keterangan' => 'required'
      ]);

      Obat::create([
        'nama_obat' => request('nama_obat'),
        'jumlah' => request('jumlah'),
        'jenis_obat' => request('jenis_obat'),
        'tanggal_masuk' => request('tanggal_masuk'),
        'keterangan' => request('keterangan')
      ]);

      return redirect()->route('obat.index')->with('success', 'Data berhasil disimpan');
    }

    public function show()
    {

    }

    public function edit(Obat $obat)
    {
      return view('obat.edit', compact('obat'));
    }

    public function update(Obat $obat)
    {
      $obat->update([
        'nama_obat' => request('nama_obat'),
        'jumlah' => request('jumlah'),
        'jenis_obat' => request('jenis_obat'),
        'tanggal_masuk' => request('tanggal_masuk'),
        'keterangan' => request('keterangan')
      ]);

      return redirect()->route('obat.index')->with('success', 'Data berhsail diubah');
    }

    public function destroy(Obat $obat)
    {
      $obat->delete();
      return redirect()->route('obat.index')->with('success', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
      $cari = $request->get('search');
      $obats = Obat::where('nama_obat', 'LIKE', '%'.$cari.'%')->get();
      return view('obat.index', compact('obats'));
    }

    public function export(Request $request)
    {
        
      $nama = 'laporan_obat_'.date('Y-m-d_H-i-s');
      Excel::create($nama, function ($excel) use ($request){
        $excel->sheet('Laporan Obat', function ($sheet) use ($request){

          $sheet->mergeCells('A1:F1');

          $sheet->row(1, function($row){
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setAlignment('center');
            $row->setFontWeight('bold');
          });

          $sheet->row(1, array('LAPORAN DATA OBAT'));

          $sheet->row(2, function($row){
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setAlignment('center');
            $row->setFontWeight('bold');
          });              

          $datas = Obat::select('nama_obat', 'jumlah', 'jenis_obat', 'tanggal_masuk', 'keterangan')->get();

          $sheet->row($sheet->getHighestRow(), function ($row){
            $row->setFontWeight('bold');
          });

          $datasheet = [];
          $datasheet[0] = array('NO', 'Nama Obat', 'Jumlah', 'Jenis Obat', 'Tanggal Masuk', 'Keterangan');

          $i = 1;

          foreach ($datas as $data) {
             
            $datasheet[$i] = array($i,
                                $data['nama_obat'],
                                $data['jumlah'],
                                $data['jenis_obat'],
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
