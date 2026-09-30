<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <style>
        * { box-sizing: border-box; }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 30px 40px 40px;
            padding-top: 70px;
            background-color: #f9fafb;
            color: #1f2937;
        }

        h2 { margin-bottom: 20px; }

        /* Navbar */
        nav {
            position: fixed;
            top: 20px;
            right: 30px;
            display: flex;
            gap: 15px;
            background: #ffffff;
            padding: 10px 18px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            z-index: 100;
        }
        nav a {
            text-decoration: none;
            font-weight: bold;
            font-size: 0.9em;
        }

        /* Notifikasi sukses */
        .alert {
            padding: 10px 15px;
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #10b981;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        /* Tombol tambah */
        .btn {
            display: inline-block;
            padding: 8px 16px;
            margin-bottom: 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .btn:hover { background-color: #43a047; }

        /* Tabel */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
            background: #ffffff;
            box-shadow: 0 1px 4px rgba(0,0,0,0.08);
            border-radius: 6px;
            overflow: hidden;
        }
        th, td {
            border: 1px solid #e5e7eb;
            padding: 10px 12px;
            text-align: left;
        }
        th {
            background-color: #f3f4f6;
            font-weight: bold;
        }
        tbody tr:hover { background-color: #f9fafb; }

        /* Tombol aksi */
        .aksi { display: flex; gap: 6px; }
        .btn-edit, .btn-hapus, .btn-pinjam {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            font-size: 0.85em;
            text-decoration: none;
            cursor: pointer;
            color: white;
        }
        .btn-edit   { background-color: #3b82f6; }
        .btn-edit:hover   { background-color: #2563eb; }
        .btn-hapus  { background-color: #ef4444; }
        .btn-hapus:hover  { background-color: #dc2626; }
        .btn-pinjam { background-color: #16a34a; }
        .btn-pinjam:hover { background-color: #15803d; }
    </style>
</head>
<body>

    <nav>
        <a href="{{ route('buku.index') }}"
           style="color: {{ request()->routeIs('buku.*') ? '#2563eb' : '#374151' }};">
            📚 Buku
        </a>
        <a href="{{ route('anggota.index') }}"
           style="color: {{ request()->routeIs('anggota.*') ? '#2563eb' : '#374151' }};">
            👤 Anggota
        </a>
        <a href="{{ route('peminjaman.index') }}"
           style="color: {{ request()->routeIs('peminjaman.*') ? '#2563eb' : '#374151' }};">
            📖 Peminjaman
        </a>
    </nav>

    <h2>Daftar Buku Perpustakaan</h2>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <a href="{{ route('buku.create') }}" class="btn">+ Tambah Buku</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($buku as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_buku }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->pengarang }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>{{ $item->tahun_terbit }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        <div class="aksi">
                            <a href="{{ route('peminjaman.create', ['buku_id' => $item->id]) }}" class="btn-pinjam">Pinjam</a>
                            <a href="{{ route('buku.edit', $item->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('buku.destroy', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align:center;">Belum ada data buku.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>