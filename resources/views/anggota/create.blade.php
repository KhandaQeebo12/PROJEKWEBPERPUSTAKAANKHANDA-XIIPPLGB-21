<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Anggota</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        form { max-width: 500px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;
                box-sizing: border-box; }
        .btn { padding: 8px 16px; background: #2563eb; color: #fff; border: none;
               border-radius: 4px; cursor: pointer; }
        .alert-error { padding: 10px 15px; background: #fee2e2; color: #991b1b;
                       border: 1px solid #ef4444; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>

    <a href="{{ route('anggota.index') }}">&larr; Kembali</a>
    <h2>Tambah Anggota Baru</h2>

    @if($errors->any())
        <div class="alert-error">
            <ul style="margin:0; padding-left:20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('anggota.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}">
        </div>
        <div class="form-group">
            <label for="no_telp">No. Telp</label>
            <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp') }}">
        </div>
        <button type="submit" class="btn">Simpan</button>
    </form>

</body>
</html>