<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Inventaris Gudang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }

        .sidebar{
            width:250px;
            height:100vh;
            background:#1e293b;
            position:fixed;
            left:0;
            top:0;
        }

        .sidebar h3{
            color:white;
            padding:20px;
            text-align:center;
        }

        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            padding:15px 20px;
        }

        .sidebar a:hover{
            background:#334155;
        }

        .content{
            margin-left:250px;
            padding:20px;
        }

        .card-dashboard{
            border:none;
            border-radius:15px;
            color:white;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h3>📦 Inventaris</h3>

    <a href="/">Dashboard</a>
    <a href="/items">Data Barang</a>
    <a href="#">Stok Masuk</a>
    <a href="#">Stok Keluar</a>
    <a href="#">Laporan</a>
</div>

<div class="content">

    <nav class="navbar bg-white shadow-sm rounded mb-4">
        <div class="container-fluid">
            <span class="navbar-brand">
                Sistem Manajemen Inventaris Gudang
            </span>
        </div>
    </nav>

    @yield('content')

</div>

</body>
</html>