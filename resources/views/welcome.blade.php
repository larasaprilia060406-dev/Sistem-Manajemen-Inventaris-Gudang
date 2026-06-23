<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>INVENTRA</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<style>

body{
margin:0;
font-family:'Segoe UI',sans-serif;
background:#f5f7fb;
}

.navbar{
padding:18px 80px;
background:white;
box-shadow:0 2px 15px rgba(0,0,0,.08);
}

.logo{
font-size:32px;
font-weight:700;
color:#0b1d39;
}

.logo span{
color:#2563eb;
}

.hero{
min-height:90vh;
display:flex;
align-items:center;
justify-content:space-between;
padding:0 80px;
}

.hero-left{
width:50%;
}

.hero-left h1{
font-size:60px;
font-weight:700;
color:#0b1d39;
}

.hero-left p{
font-size:20px;
color:#6b7280;
line-height:35px;
margin:25px 0;
}

.btn-login{

background:#2563eb;

color:white;

padding:15px 35px;

border-radius:12px;

text-decoration:none;

font-weight:600;
}

.btn-login:hover{
background:#1748b7;
}

.hero-right{
width:45%;
}

.hero-right img{
width:100%;
}

.features{

display:grid;

grid-template-columns:repeat(4,1fr);

gap:25px;

padding:0 80px 80px;

}

.feature-card{

background:white;

padding:30px;

border-radius:18px;

text-align:center;

box-shadow:0 10px 30px rgba(0,0,0,.08);

}

.feature-card i{

font-size:40px;

color:#2563eb;

margin-bottom:15px;

}

.feature-card h4{

font-weight:700;

}

footer{

padding:25px;

text-align:center;

background:#0b1d39;

color:white;

}

@media(max-width:992px){

.hero{

flex-direction:column;

text-align:center;

padding:50px 30px;

}

.hero-left,

.hero-right{

width:100%;

}

.features{

grid-template-columns:1fr;

padding:30px;

}

.hero-left h1{

font-size:40px;

}

}

</style>

</head>

<body>

<nav class="navbar d-flex justify-content-between">

<div class="logo">

📦 INVENT<span>RA</span>

</div>

<div>

<a href="{{ route('login') }}"
class="btn btn-primary">

Masuk

</a>

</div>

</nav>

<section class="hero">

<div class="hero-left">

<h1>

Sistem Inventaris Gudang Modern

</h1>

<p>

Kelola barang masuk, barang keluar,

stok gudang, dan transaksi secara

mudah, cepat, dan efisien.

</p>

<a href="{{ route('login') }}"
class="btn-login">

Masuk ke Sistem

</a>

</div>

<div class="hero-right">

<img src="https://cdn-icons-png.flaticon.com/512/3050/3050525.png">

</div>

</section>

<section class="features">

<div class="feature-card">

<i class="fa-solid fa-chart-line"></i>

<h4>Dashboard</h4>

<p>Monitoring data gudang realtime.</p>

</div>

<div class="feature-card">

<i class="fa-solid fa-box"></i>

<h4>Data Barang</h4>

<p>Kelola semua data inventaris.</p>

</div>

<div class="feature-card">

<i class="fa-solid fa-arrow-right-arrow-left"></i>

<h4>Transaksi</h4>

<p>Pantau barang masuk dan keluar.</p>

</div>

<div class="feature-card">

<i class="fa-solid fa-users"></i>

<h4>Multi User</h4>

<p>Mendukung Admin dan User.</p>

</div>

</section>

<footer>

© 2026 INVENTRA - Inventory Management System

</footer>

</body>
</html>