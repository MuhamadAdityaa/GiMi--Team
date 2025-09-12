<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scan QR Member</title>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #1e1e2d;
            /* sama kayak background layout dark */
            font-family: Arial, sans-serif;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        h4 {
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        #reader {
            width: 350px;
            max-width: 90%;
        }

        .btn-back {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 6px;
            background: #28a745;
            color: #fff;
            cursor: pointer;
        }

        .btn-back:hover {
            background: #218838;
        }
    </style>
</head>

<body>
    @if (session('success'))
        <div id="alert-success" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div id="alert-error" class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
        </div>
    @endif


    <h4>📷 Scan QR Member</h4>
    <div id="reader"></div>
    <a class="btn-back" href="{{ route('dashboard') }}">⬅ Kembali</a>

    <script>
        const html5QrCode = new Html5Qrcode("reader");

        Html5Qrcode.getCameras().then(cameras => {
            if (cameras && cameras.length) {
                let cameraId = cameras[0].id;
                html5QrCode.start(
                    cameraId, {
                        fps: 15,
                        qrbox: 250
                    },
                    (decodedText) => {
                        html5QrCode.stop().then(() => {
                            window.location.href = "/kamera/laporan?token=" + decodedText;
                        });
                    },
                    (errorMessage) => {
                        console.log("QR Error:", errorMessage);
                    }
                );
            }
        }).catch(err => {
            console.error("Camera Error:", err);
        });
        @if (session('success') || session('error'))

            setTimeout(() => {
                let successAlert = document.getElementById('alert-success');
                let errorAlert = document.getElementById('alert-error');

                if (successAlert) {
                    successAlert.classList.remove('show');
                    successAlert.classList.add('fade');
                }

                if (errorAlert) {
                    errorAlert.classList.remove('show');
                    errorAlert.classList.add('fade');
                }
            }, 5000);

        @endif
        // Tunggu 5 detik, lalu sembunyikan alert
    </script>
</body>

</html>
