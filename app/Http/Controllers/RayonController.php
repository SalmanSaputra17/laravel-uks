<?php

namespace App\Http\Controllers;

use App\Rayon;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    public function index()
    {
    	$rayons = Rayon::all();
    	return view('rayon.index', compact('rayons'));
    }

    public function create()
    {
    	return view('rayon.create');
    }

    public function store()
    {
    	$this->validate(request(), [
    		'rayon' => 'required',
    		'pembimbing' => 'required',
    		'ruangan' => 'required',
    	]);
    
    	Rayon::create([
    		'rayon' => request('rayon'),
    		'pembimbing' => request('pembimbing'),
    		'ruangan' => request('ruangan'),
    	]);

    	return redirect()->route('rayon.index')->with('success', 'Data berhasil disimpan');
    }

    public function show()
    {
    	
    }

    public function edit(Rayon $rayon)
    {
    	return view('rayon.edit', compact('rayon'));
    }

    public function update(Rayon $rayon)
    {
   	 	$rayon->update([
	       'rayon' => request('rayon'),
	       'pembimbing' => request('pembimbing'),
	       'ruangan' => request('ruangan'),
	    ]);

      	return redirect()->route('rayon.index')->with('success', 'Data berhsail diubah');
    }

    public function destroy(Rayon $rayon)
    {
      	$rayon->delete();
      	return redirect()->route('rayon.index')->with('success', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $cari = $request->get('search');
        $rayons = Rayon::where('rayon', 'LIKE', '%'.$cari.'%')->get();
        return view('rayon.index', compact('rayons'));
    }

}
