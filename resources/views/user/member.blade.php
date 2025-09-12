<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Dashboard Member</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: #0f0f0f;
            color: #fff;
        }

        .mobile-wrap {
            max-width: 420px;
            margin: 0 auto;
            background: #0f0f0f;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* header dengan background image */
        .header {
            position: relative;
            width: 100%;
            height: 220px;
            background: url('{{ asset('images/bg_login.png') }}') center/cover no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 16px;
        }

        .brand {
            font-weight: 700;
            font-size: 20px;
        }

        .btn-profile {
            position: absolute;
            right: 16px;
            top: 16px;
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 6px 12px;
            font-size: 14px;
        }

        .welcome {
            margin-top: auto;
            text-align: left;
            max-width: 85%;
        }

        .welcome h2 {
            font-weight: 700;
            font-size: 22px;
            margin: 0;
        }

        .welcome p {
            margin: 4px 0 0;
            font-size: 14px;
            color: #ddd;
        }

        /* section */
        section {
            padding: 20px 16px;
        }

        section h3 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        section p {
            font-size: 14px;
            line-height: 1.5;
            color: #ddd;
        }

        .gym-info {
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .gym-info img {
            border-radius: 12px;
            width: 120px;
            height: auto;
            object-fit: cover;
        }

        footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: auto;
            padding: 12px;
        }
    </style>
</head>

<body>
    <div class="mobile-wrap">
        <!-- Header dengan bg image -->
        <div class="header">
            <div class="brand">Majamanis</div>
            <a href="{{ route('user.profile', $member->id) }}" class="btn-profile">Profil</a>

            <div class="welcome">
                <h2>Selamat Datang, {{ $member->username ?? 'Kelompok 1' }}</h2>
                <p>Ngegym aman dengan Majamanis</p>
            </div>
        </div>

        <!-- Tentang Gym -->
        <section>
            <h3>Tentang GYM</h3>
            <div class="gym-info">
                <div>
                    <p><strong>Majamanis</strong> adalah platform manajemen keanggotaan gym yang dirancang untuk
                        mempermudah pengelolaan data member, kasir, dan admin dalam satu sistem terintegrasi.
                        Dengan antarmuka yang sederhana dan fitur otomatisasi seperti QR Code, laporan masuk, dan
                        pendaftaran akun, Majamanis membantu operasional gym jadi lebih efisien dan modern.</p>
                </div>
                <img src="{{ asset('images/gym-info.jpg') }}" alt="Gym">
            </div>
        </section>

        <!-- Kontak Gym -->
        <section>
            <h3>Kontak GYM</h3>
            <p><strong>Alamat:</strong><br>
                Jalan Sehat No. 88, Kelurahan Bugar,<br>
                Kecamatan Fitlife, Kota Semangat,<br>
                Jawa Barat 40123
            </p>
            <p><strong>Nomor Telepon:</strong><br>(+62) 812-3456-7890</p>
            <p><strong>Email:</strong><br>majamanis@gymmail.com</p>
            <p><strong>Jam Operasional:</strong><br>Senin – Minggu: 06.00 – 22.00 WIB</p>
            <p><a href="https://goo.gl/maps/majamanis-gym" target="_blank"
                    style="color:#0dcaf0;text-decoration:underline">
                    Lihat Lokasi di Google Maps</a></p>
        </section>

        <footer>Hak cipta &copy; Kelompok 1</footer>
    </div>
</body>

</html>
