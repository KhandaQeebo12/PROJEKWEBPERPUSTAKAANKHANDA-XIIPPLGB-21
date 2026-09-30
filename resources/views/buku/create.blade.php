<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        form { max-width: 500px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;
                box-sizing: border-box; }
        .btn { padding: 8px 16px; background: #4CAF50; color: #fff; border: none;
               border-radius: 4px; cursor: pointer; }
        .btn-back { display: inline-block; margin-bottom: 15px; color: #2563eb;
                    text-decoration: none; }
    </style>
</head>
<body>
    
    <a href="{{ route('buku.index') }}" class="btn-back">Kembali ke Daftar Buku</a>

    <h2>TAMBAH BUKU BARU</h2>

    @if($errors->any())
        <div class="alert-error">
            <ul style="margin:0; padding-left:20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="kode_buku">Kode Buku:</label>
            <input type="text" name="kode_buku" id="kode_buku" value="{{ old('kode_buku') }}" required>
        </div>
        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required>
        </div>
        <div class="form-group">
            <label for="pengarang">Pengarang:</label>
            <input type="text" name="pengarang" id="pengarang" value="{{ old('pengarang') }}" required>
        </div>
        <div class="form-group">
            <label for="penerbit">Penerbit:</label>
            <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit') }}" required>
        </div>
        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit:</label>
            <input type="text" name="tahun_terbit" id="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
        </div>
        <div class="form-group">
            <label for="stok">Stok:</label>
            <input type="text" name="stok" id="stok" value="{{ old('stok') }}" required>
        </div>

        <button type="submit" class="btn">Simpan</button>
    </form>

</body>
</html>