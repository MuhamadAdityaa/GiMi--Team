<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Profil Member</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            background: #0f0f0f;
            color: #fff;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        .mobile-wrap {
            max-width: 420px;
            margin: 0 auto;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            background: #1e1e1e;
            padding: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .brand {
            font-size: 20px;
            font-weight: 700;
        }

        .btn-back {
            background: #2c2c2c;
            border: none;
            padding: 6px 14px;
            border-radius: 8px;
            color: #fff;
            font-size: 14px;
            text-decoration: none;
        }

        .profile-pic {
            text-align: center;
            margin: 24px 0 12px;
        }

        .profile-pic img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #2c2c2c;
        }

        .profile-name {
            text-align: center;
            font-size: 20px;
            font-weight: 600;
        }

        .profile-card {
            background: #2c2c2c;
            border-radius: 16px;
            padding: 20px;
            margin: 24px 16px;
        }

        .profile-card p {
            margin: 0 0 12px;
            font-size: 15px;
        }

        .btn-qr {
            display: block;
            margin: 16px auto 0;
            background: #3c3c3c;
            border: none;
            border-radius: 12px;
            padding: 12px;
            width: 100%;
            color: #fff;
            font-weight: 500;
            text-align: center;
        }

        .btn-lg {
            display: block;
            margin: 16px auto 0;
            background: #a10000;
            border: none;
            border-radius: 12px;
            padding: 12px;
            width: 100%;
            color: #fff;
            font-weight: 500;
            text-align: center;
        }

        footer {
            text-align: center;
            font-size: 12px;
            color: #aaa;
            margin-top: auto;
            padding: 12px;
            background: #1e1e1e;
        }

        /* overlay QR */
        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .overlay-content {
            background: #fff;
            color: #000;
            border-radius: 20px;
            padding: 20px;
            max-width: 360px;
            width: 90%;
            text-align: center;
            position: relative;
        }

        .overlay-content img.qr {
            width: 180px;
            height: 180px;
            margin: 16px 0;
        }

        .overlay-content p {
            margin: 4px 0;
            font-size: 14px;
        }

        .btn-close-overlay {
            position: absolute;
            bottom: -60px;
            left: 50%;
            transform: translateX(-50%);
            background: #fff;
            border-radius: 50%;
            width: 44px;
            height: 44px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 22px;
            border: none;
        }

        .btn-download {
            position: absolute;
            top: -50px;
            right: 50%;
            transform: translateX(50%);
            background: #ddd;
            border: none;
            border-radius: 12px;
            padding: 6px 14px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="mobile-wrap">
        <!-- Header -->
        <div class="header">
            <div class="brand">Majamanis</div>
            <a href="{{ route('member.dashboard') }}" class="btn-back">Kembali</a>
        </div>

        <!-- Foto Profil -->
        <div class="profile-pic">
            <img src="{{ asset('images/avatar.png') }}" alt="Foto Profil">
        </div>
        <div class="profile-name">Kelompok 1</div>

        <!-- Info -->
        <div class="profile-card">
            <p>
                <strong>📞 No Telepon</strong><br>{{ $member->no_telp }}
            </p>
            <p>
                <strong>🏋️ Paket Kamu</strong><br>Paket
                @if ($member->paket === 1)
                    Reguler
                @elseif ($member->paket === 2)
                    Premium
                @else
                    VIP
                @endif
                <br>
                <span>
                    @if ($member->sisa_hari >= 0)
                        Tersisa {{ floor($member->sisa_hari) }} hari
                    @else
                        Expired
                    @endif
                </span>
            </p>
            <button class="btn-qr" onclick="openOverlay()">QR Kamu</button>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm btn-lg">Logout</button>
            </form>
        </div>

        <!-- Overlay QR -->
        <div class="overlay" id="qrOverlay">
            <div class="overlay-content">
                <button class="btn-download">Unduh ⬇️</button>
                <h5>12840905</h5>
                <img src="{{ asset('storage/qrkodes/member/' . $member->kode_qr . '.png') }}" class="qr"
                    alt="QR Code">
                <p><strong>Username:</strong>{{ $member->username }}</p>
                <p><strong>Jenis:</strong> Paket
                    @if ($member->paket === 1)
                        Reguler
                    @elseif ($member->paket === 2)
                        Premium
                    @else
                        VIP
                    @endif
                </p>
                <p><strong>Durasi:</strong>
                    @if ($member->paket === 1)
                        1 bulan
                    @elseif ($member->paket === 2)
                        2 bulan
                    @else
                        3 bulan
                    @endif
                </p>
                <p><strong>Berakhir pada:</strong>{{ $member->tanggal_berakhir_text }}</p>
                <button class="btn-close-overlay" onclick="closeOverlay()">&times;</button>
            </div>
        </div>


        <footer>Hak cipta Kelompok 1</footer>
    </div>

    <script>
        function openOverlay() {
            document.getElementById('qrOverlay').style.display = 'flex';
        }

        function closeOverlay() {
            document.getElementById('qrOverlay').style.display = 'none';
        }
    </script>
</body>

</html>
