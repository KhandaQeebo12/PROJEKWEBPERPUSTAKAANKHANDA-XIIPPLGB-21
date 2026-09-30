<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::latest()->get();
        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required',
            'alamat'  => 'required',
            'no_telp' => 'required',
        ]);

        Anggota::create($request->all());

        return redirect()->route('anggota.index')
                          ->with('success', 'Data anggota berhasil ditambahkan');
    }

    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nama'    => 'required',
            'alamat'  => 'required',
            'no_telp' => 'required',
        ]);

        $anggota->update($request->all());

        return redirect()->route('anggota.index')
                          ->with('success', 'Data anggota berhasil diperbarui');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return redirect()->route('anggota.index')
                          ->with('success', 'Data anggota berhasil dihapus');
    }
}