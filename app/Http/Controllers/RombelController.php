<?php

namespace App\Http\Controllers;

use App\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    public function index()
    {
        $rombels = Rombel::all();
        return view('rombel.index', compact('rombels'));
    }

    public function create()
    {
        return view('rombel.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'rombel' => 'required|min:7',
        ]);

        Rombel::create([
            'rombel' => request('rombel'),
        ]);

        return redirect()->route('rombel.index')->with('success', 'Data berhasil disimpan');
    }

    // public function show()
    // {
    	
    // }

    public function edit(Rombel $rombel)
    {
    	return view('rombel.edit', compact('rombel'));
    }

    public function update(Rombel $rombel)
    {
    	$rombel->update([
            'rombel' => request('rombel'),
        ]);

        return redirect()->route('rombel.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Rombel $rombel)
    {
    	$rombel->delete();
        return redirect()->route('rombel.index')->with('success', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $cari = $request->get('search');
        $rombels = Rombel::where('rombel', 'LIKE', '%'.$cari.'%')->get();
        return view('rombel.index', compact('rombels'));
    }

}
