<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Gudang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f6f9;
        }

        .sidebar{
            width:250px;
            height:100vh;
            position:fixed;
            background:#0d6efd;
            color:white;
        }

        .sidebar h3{
            text-align:center;
            padding:20px;
            border-bottom:1px solid rgba(255,255,255,.2);
        }

        .sidebar a{
            display:block;
            color:white;
            padding:15px 20px;
            text-decoration:none;
        }

        .sidebar a:hover{
            background:rgba(255,255,255,.15);
        }

        .content{
            margin-left:250px;
            padding:25px;
        }

    </style>
</head>

<body>

<div class="sidebar">

    <h3>📦 INVENTRA </h3>

    <a href="{{ route('dashboard') }}">
        🏠 Dashboard
    </a>

    <a href="{{ route('items.index') }}">
        📦 Data Barang
    </a>

    <a href="{{ route('stock.in') }}">
        📥 Stok Masuk
    </a>

    <a href="{{ route('stock.out') }}">
        📤 Stok Keluar
    </a>

    <a href="{{ route('transactions.index') }}">
        📋 Riwayat Transaksi
    </a>

    <a href="{{ route('profile.edit') }}">
        👤 Profile
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button
            class="btn btn-danger w-100 rounded-0">
            Logout
        </button>
    </form>

</div>

<div class="content">

    @yield('content')

</div>

</body>
</html>