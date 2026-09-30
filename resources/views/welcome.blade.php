<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perpustakaan</title>
    <style>
        * { box-sizing: border-box; }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f9fafb;
            color: #1f2937;
        }

        .container {
            text-align: center;
            max-width: 700px;
            padding: 40px;
        }

        h1 {
            font-size: 2.2em;
            margin-bottom: 8px;
        }

        p.subtitle {
            color: #6b7280;
            margin-bottom: 40px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .menu-card {
            display: block;
            background: #ffffff;
            padding: 30px 20px;
            border-radius: 10px;
            text-decoration: none;
            color: #1f2937;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: transform 0.15s, box-shadow 0.15s;
        }
        .menu-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 16px rgba(0,0,0,0.12);
        }

        .menu-card .icon {
            font-size: 2.2em;
            display: block;
            margin-bottom: 10px;
        }

        .menu-card .title {
            font-weight: bold;
            font-size: 1.05em;
            margin-bottom: 4px;
        }

        .menu-card .desc {
            font-size: 0.85em;
            color: #6b7280;
        }

        @media (max-width: 600px) {
            .menu-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>📚 Sistem Perpustakaan</h1>
        <p class="subtitle">Kelola data buku, anggota, dan transaksi peminjaman</p>

        <div class="menu-grid">
            <a href="{{ route('buku.index') }}" class="menu-card">
                <span class="icon">📚</span>
                <div class="title">Buku</div>
                <div class="desc">Kelola daftar buku perpustakaan</div>
            </a>

            <a href="{{ route('anggota.index') }}" class="menu-card">
                <span class="icon">👤</span>
                <div class="title">Anggota</div>
                <div class="desc">Kelola data anggota perpustakaan</div>
            </a>

            <a href="{{ route('peminjaman.index') }}" class="menu-card">
                <span class="icon">📖</span>
                <div class="title">Peminjaman</div>
                <div class="desc">Kelola transaksi peminjaman buku</div>
            </a>
        </div>
    </div>

</body>
</html>