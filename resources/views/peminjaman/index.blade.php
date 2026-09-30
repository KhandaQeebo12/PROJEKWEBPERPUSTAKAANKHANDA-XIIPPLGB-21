<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Peminjaman Buku</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { display: inline-block; padding: 8px 16px; background: #2563eb;
               color: #fff; text-decoration: none; border-radius: 4px; }
        .alert { padding: 10px 15px; background: #d1fae5; color: #065f46;
                 border: 1px solid #10b981; border-radius: 4px; margin-bottom: 15px; }
        .status {
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.8em;
            font-weight: bold;
        }
        .status-dipinjam { background: #fef3c7; color: #92400e; }
        .status-kembali  { background: #d1fae5; color: #065f46; }

        .btn-kembali {
            padding: 6px 12px;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 0.85em;
            cursor: pointer;
        }
        .btn-kembali:hover { background-color: #2563eb; }
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

    <h2>Daftar Peminjaman Buku</h2>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('peminjaman.create') }}" class="btn">+ Tambah Peminjaman</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Nama Anggota</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($peminjaman as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->buku->judul }}</td>
                    <td>{{ $item->anggota->nama }}</td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_kembali ?? '-' }}</td>
                    <td>
                        @if(is_null($item->tanggal_kembali))
                            <span class="status status-dipinjam">Sedang Dipinjam</span>
                        @else
                            <span class="status status-kembali">Sudah Kembali</span>
                        @endif
                    </td>
                    <td>
                        @if(is_null($item->tanggal_kembali))
                            <form action="{{ route('peminjaman.kembali', $item->id) }}" method="POST"
                                onsubmit="return confirm('Konfirmasi buku sudah dikembalikan?')">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn-kembali">Kembalikan</button>
                            </form>
                        @else
                            <span style="color:#9ca3af;">-</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center;">Belum ada transaksi peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>