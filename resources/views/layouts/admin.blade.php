<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>INVENTRA</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
background:#f5f7fb;
overflow-x:hidden;
}

.sidebar{

width:260px;

height:100vh;

position:fixed;

left:0;

top:0;

background:#111827;

color:white;

}

.logo{

padding:25px;

font-size:28px;

font-weight:700;

border-bottom:1px solid rgba(255,255,255,.1);

}

.logo small{

display:block;

font-size:14px;

font-weight:400;

color:#cbd5e1;

}

.sidebar a{

display:flex;

align-items:center;

gap:12px;

padding:16px 25px;

color:#e5e7eb;

text-decoration:none;

transition:.3s;

}

.sidebar a:hover{

background:#2563eb;

color:white;

}

.topbar{

height:75px;

background:white;

padding:0 30px;

display:flex;

justify-content:space-between;

align-items:center;

box-shadow:0 2px 10px rgba(0,0,0,.05);

}

.content{

margin-left:260px;

min-height:100vh;

}

.main{

padding:30px;

}

.search-box{

width:350px;

}

.logout{

position:absolute;

bottom:20px;

width:100%;

padding:0 20px;

}

</style>

</head>

<body>

<div class="sidebar">

<div class="logo">

📦 INVENTRA

<small>Inventaris Gudang</small>

</div>

<a href="{{ route('dashboard') }}">

<i class="fa-solid fa-house"></i>

Dashboard

</a>

<a href="{{ route('items.index') }}">

<i class="fa-solid fa-box"></i>

Data Barang

</a>

<a href="{{ route('stock.in') }}">

<i class="fa-solid fa-arrow-down"></i>

Stok Masuk

</a>

<a href="{{ route('stock.out') }}">

<i class="fa-solid fa-arrow-up"></i>

Stok Keluar

</a>

<a href="{{ route('transactions.index') }}">

<i class="fa-solid fa-clock-rotate-left"></i>

Riwayat Transaksi

</a>

<a href="{{ route('users.index') }}">

<i class="fa-solid fa-users"></i>

Manajemen User

</a>

<a href="{{ route('profile.edit') }}">

<i class="fa-solid fa-user"></i>

Profile

</a>

<div class="logout">

<form method="POST" action="{{ route('logout') }}">

@csrf

<button class="btn btn-danger w-100">

<i class="fa-solid fa-right-from-bracket"></i>

Logout

</button>

</form>

</div>

</div>

<div class="content">

<div class="topbar">

<div class="search-box">

<input type="text"

class="form-control"

placeholder="Cari sesuatu...">

</div>

<div>

👋 Halo,

<strong>{{ Auth::user()->name }}</strong>

</div>

</div>

<div class="main">

@yield('content')

</div>

</div>

</body>

</html>