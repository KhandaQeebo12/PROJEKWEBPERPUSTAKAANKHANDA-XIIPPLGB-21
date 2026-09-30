<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Peminjaman Buku</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        form { max-width: 500px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        select, input {
            width: 100%; padding: 8px; border: 1px solid #ccc;
            border-radius: 4px; box-sizing: border-box;
        }
        .btn { padding: 8px 16px; background: #2563eb; color: #fff; border: none;
               border-radius: 4px; cursor: pointer; }
        .alert-error { padding: 10px 15px; background: #fee2e2; color: #991b1b;
                       border: 1px solid #ef4444; border-radius: 4px; margin-bottom: 15px; }
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

    <a href="{{ route('peminjaman.index') }}">&larr; Kembali</a>

    <h2>Transaksi Peminjaman Buku</h2>

    @if($errors->any())
        <div class="alert-error">
            <ul style="margin:0; padding-left:20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="buku_id">Pilih Buku</label>
            <select name="buku_id" id="buku_id">
                <option value="">-- Pilih Buku --</option>
                @foreach($buku as $b)
                    <option value="{{ $b->id }}"
                        {{ (old('buku_id', $selectedBuku) == $b->id) ? 'selected' : '' }}>
                        {{ $b->judul }} ({{ $b->kode_buku }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="anggota_id">Pilih Anggota</label>
            <select name="anggota_id" id="anggota_id">
                <option value="">-- Pilih Anggota --</option>
                @foreach($anggota as $a)
                    <option value="{{ $a->id }}" {{ old('anggota_id') == $a->id ? 'selected' : '' }}>
                        {{ $a->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}">
        </div>

        <button type="submit" class="btn">Simpan Transaksi</button>
    </form>

</body>
</html>