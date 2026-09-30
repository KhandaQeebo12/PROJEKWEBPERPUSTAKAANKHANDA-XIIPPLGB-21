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
        .btn { padding: 8px 16px; background: #2563eb; color: #fff; border: none;
               border-radius: 4px; cursor: pointer; }
        .btn-back { display: inline-block; margin-bottom: 15px; color: #2563eb;
                    text-decoration: none; }
        .error { color: #dc2626; font-size: 0.9em; margin-top: 4px; }
        .alert-error { padding: 10px 15px; background: #fee2e2; color: #991b1b;
                       border: 1px solid #ef4444; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <a href="{{ route('buku.index') }}" class="btn-back"> Kembali ke Daftar Buku</a>

    <h2>Edit Data Buku</h2>

    @if($errors->any())
        <div class="alert-error">
            <ul style="margin:0; padding-left:20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="kode_buku">Kode Buku</label>
            <input type="text" name="kode_buku" id="kode_buku"
                   value="{{ old('kode_buku', $buku->kode_buku) }}" readonly>
        </div>

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul"
                   value="{{ old('judul', $buku->judul) }}">
        </div>

        <div class="form-group">
            <label for="pengarang">Pengarang</label>
            <input type="text" name="pengarang" id="pengarang"
                   value="{{ old('pengarang', $buku->pengarang) }}">
        </div>

        <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input type="text" name="penerbit" id="penerbit"
                   value="{{ old('penerbit', $buku->penerbit) }}">
        </div>

        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" id="tahun_terbit"
                   value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok"
                   value="{{ old('stok', $buku->stok) }}">
        </div>

        <button type="submit" class="btn">Update</button>
    </form>
</body>
</html>