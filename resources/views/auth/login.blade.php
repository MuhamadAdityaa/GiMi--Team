<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login - Majamanis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url("{{ asset('images/bg_login.png') }}") no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .login-box {
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 15px;
            width: 400px;
        }

        .login-box h1 {
            font-weight: bold;
        }

        .form-control {
            background: transparent;
            border: 2px solid #fff;
            border-radius: 10px;
            color: #fff;
        }

        .form-control::placeholder {
            color: #ddd;
        }

        .btn-login {
            background: #343a40;
            border: none;
            border-radius: 10px;
            padding: 10px;
            width: 100%;
            font-weight: bold;
            color: white;
        }

        .btn-login:hover {
            background: #495057;
        }

        .logo {
            font-size: 40px;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="login-box text-center">
        <div class="logo">🏋️</div>
        <h1>Selamat Datang di Majamanis</h1>
        <p>Silahkan Login terlebih dahulu</p>
        <form method="POST" action="{{ route('login.process') }}">
            @csrf
            <div class="mb-3 text-start">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required>
                    <span class="input-group-text bg-transparent text-white" style="cursor:pointer;"
                        onclick="togglePassword()">
                        👁️
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-login">Login</button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById("password");
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>
</body>

</html>
