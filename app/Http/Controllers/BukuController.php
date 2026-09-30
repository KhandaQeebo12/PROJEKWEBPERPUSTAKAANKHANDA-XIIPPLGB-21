<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{

    public function index()
    {
        $buku = Buku::latest()->get();
        return view('buku.index', compact('buku'));

    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_buku'    => 'required|unique:buku',
            'judul'        => 'required',
            'pengarang'    => 'required',
            'penerbit'     => 'required',
            'tahun_terbit' => 'required|numeric',
            'stok'         => 'required|numeric',
        ]);
    
        Buku::create($request->all());
    
        return redirect()->route('buku.index')
                        ->with('success', 'Data buku berhasil ditambahkan');

    }

    public function show(string $id)
    {
        //
    }

    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul'        => 'required',
            'pengarang'    => 'required',
            'penerbit'     => 'required',
            'tahun_terbit' => 'required|numeric',
            'stok'         => 'required|numeric',
        ]);
    
        $buku->update($request->all());
    
        return redirect()->route('buku.index')
                        ->with('success', 'Data buku berhasil diperbarui');

    }

    public function destroy(Buku $buku)
    {
        $buku -> delete(); 
        return redirect()->route('buku.index')
                        ->with('success', 'Data buku berhasil dihapus');
    }
}
