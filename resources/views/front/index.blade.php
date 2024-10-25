<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Untuk Responsif -->
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
        }

        .container {
            margin: 0 auto;
            padding: 50px 20px;
            max-width: 500px;
        }

        .profile-pic {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        h1 {
            font-size: 28px;
            margin: 20px 0;
        }

        .links {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .link-card {
            display: flex;
            align-items: center;
            background-color: #0088cc;
            color: #fff;
            text-decoration: none;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            transition: background-color 0.3s;
        }

        .link-card:hover {
            background-color: #005f99;
        }

        .link-card img {
            width: 40px;
            height: 40px;
            margin-right: 15px;
            border-radius: 5px;
            object-fit: cover;
        }

        .link-text {
            flex: 1;
            text-align: left;
            font-size: 18px;
        }

        /* Media Query untuk Responsif */
        @media (max-width: 600px) {
            .container {
                padding: 30px 10px;
                margin: 0 20px;
            }

            .link-card {
                flex-direction: row;
                padding: 10px;
            }

            .link-card img {
                width: 35px;
                height: 35px;
                margin-right: 10px;
            }

            .link-text {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="img/vettel_2012.jpg" alt="Foto Profil" class="profile-pic">
        <h1>Nama Anda</h1>
        <div class="links">
            @foreach ($links as $item)
                <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer" class="link-card">
                    <img src="{{ $item->icon }}" alt="{{ $item->icon }}">
                    <span class="link-text">{{ $item->name }}</span>
                </a>
            @endforeach
            {{-- <a href="https://contoh2.com" target="_blank" rel="noopener noreferrer" class="link-card">
                <img src="img/Logo Aksi GEULIS.png" alt="Gambar 2">
                <span class="link-text">Tautan 2</span>
            </a>
            <a href="https://contoh3.com" target="_blank" rel="noopener noreferrer" class="link-card">
                <img src="img/Logo Aksi GEULIS.png" alt="Gambar 3">
                <span class="link-text">Tautan 3</span>
            </a> --}}
        </div>
    </div>
</body>
</html>
