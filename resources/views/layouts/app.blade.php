<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Gym Management')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #212529; color: #f8f9fa; }
        .sidebar {
            height: 100vh;
            background: #343a40;
            position: fixed;
            top: 0; left: 0;
            width: 220px;
            padding-top: 60px;
        }
        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
        }
        .sidebar a:hover {
            background: #495057;
            color: #fff;
        }
        .content { margin-left: 220px; padding: 20px; }
        .navbar { margin-left: 220px; }
        .card { background: #2c3034; color: #fff; border: none; }
        .table { color: #fff; }
    </style>
</head>
<body>

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-dark bg-dark shadow-sm fixed-top">
        <div class="container-fluid">
            <span class="navbar-brand">Majamanis Gym</span>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <span class="nav-link">{{ session('username') }} ({{ session('role') }})</span>
                </li>
                <li class="nav-item">
                    <a href="" class="btn btn-danger btn-sm">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <h5 class="text-center text-white">Menu</h5>
        @if(session('role') === 'admin')
            <a href="{{ route('dashboard.admin') }}">Dashboard</a>
            <a href="{{ route('member.index') }}">Data Member</a>
            <a href="{{ route('laporan.index') }}">Laporan Pengunjung</a>
            <a href="{{ route('kasir.index') }}">Kelola Kasir</a>
        @elseif(session('role') === 'kasir')
            <a href="{{ route('dashboard.kasir') }}">Dashboard</a>
            <a href="{{ route('member.index') }}">Data Member</a>
            <a href="{{ route('laporan.index') }}">Laporan Pengunjung</a>
        @elseif(session('role') === 'member')
            <a href="{{ route('dashboard.member') }}">Dashboard</a>
        @endif
    </div>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

</body>
</html>
