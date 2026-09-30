<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::with('buku', 'anggota')->latest()->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request){
        $buku    = Buku::all();
        $anggota = Anggota::all();
        $selectedBuku = $request->query('buku_id');

        return view('peminjaman.create', compact('buku', 'anggota', 'selectedBuku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required',
            'anggota_id' => 'required',
            'tanggal_pinjam' => 'required|date',
            
        ]);

        Peminjaman::create($request->all());

        return redirect()->route('peminjaman.index')
                        ->with('success', 'Data peminjaman berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function kembali(Peminjaman $peminjaman)
        {
            if ($peminjaman->tanggal_kembali) {
                return redirect()->route('peminjaman.index')
                                ->with('success', 'Buku ini sudah tercatat dikembalikan sebelumnya');
            }

            $peminjaman->update([
                'tanggal_kembali' => now()->toDateString(),
            ]);

            return redirect()->route('peminjaman.index')
                            ->with('success', 'Buku berhasil dikonfirmasi dikembalikan');
        }
}
