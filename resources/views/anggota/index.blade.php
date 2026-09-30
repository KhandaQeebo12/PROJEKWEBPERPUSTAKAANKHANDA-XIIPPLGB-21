<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Anggota</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { display: inline-block; padding: 8px 16px; background: #2563eb;
               color: #fff; text-decoration: none; border-radius: 4px; }
        .alert { padding: 10px 15px; background: #d1fae5; color: #065f46;
                 border: 1px solid #10b981; border-radius: 4px; margin-bottom: 15px; }
        .aksi { display: flex; gap: 6px; }
        .btn-edit { padding: 6px 12px; background-color: #3b82f6; color: white;
                    text-decoration: none; border-radius: 4px; font-size: 0.85em; }
        .btn-hapus { padding: 6px 12px; background-color: #ef4444; color: white;
                     border: none; border-radius: 4px; font-size: 0.85em; cursor: pointer; }
    </style>
</head>
<body>

    <nav style="position: fixed; top: 20px; right: 30px; display: flex; gap: 15px;
                background: #ffffff; padding: 10px 18px; border-radius: 8px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1); z-index: 100;">
        <a href="{{ route('buku.index') }}"
        style="text-decoration: none; font-weight: bold; font-size: 0.9em;
                color: {{ request()->routeIs('buku.*') ? '#2563eb' : '#374151' }};">
            📚 Buku
        </a>
        <a href="{{ route('anggota.index') }}"
        style="text-decoration: none; font-weight: bold; font-size: 0.9em;
                color: {{ request()->routeIs('anggota.*') ? '#2563eb' : '#374151' }};">
            👤 Anggota
        </a>
        <a href="{{ route('peminjaman.index') }}"
        style="text-decoration: none; font-weight: bold; font-size: 0.9em;
                color: {{ request()->routeIs('peminjaman.*') ? '#2563eb' : '#374151' }};">
            📖 Peminjaman
        </a>
    </nav>

    <h2>Daftar Anggota Perpustakaan</h2>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <a href="{{ route('anggota.create') }}" class="btn">+ Tambah Anggota</a>

    <table>
        <thead>
            <tr>
                <th>No</th><th>Nama</th><th>Alamat</th><th>No. Telp</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($anggota as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>
                        <div class="aksi">
                            <a href="{{ route('anggota.edit', $item->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('anggota.destroy', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" style="text-align:center;">Belum ada data anggota.</td></tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>