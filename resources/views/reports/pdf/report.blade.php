<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Laporan Inventaris</title>

<style>

body{
    font-family: DejaVu Sans, sans-serif;
    font-size:12px;
}

h2{
    text-align:center;
    margin-bottom:0;
}

p{
    text-align:center;
    margin-top:2px;
    color:#555;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:15px;
}

table th,
table td{
    border:1px solid #000;
    padding:6px;
    font-size:11px;
}

table th{
    background:#e9ecef;
}

.section-title{
    margin-top:20px;
    font-size:15px;
    font-weight:bold;
}

.summary{
    margin-top:20px;
}

.summary td{
    border:none;
    padding:4px;
}

.footer{
    position:fixed;
    bottom:0;
    left:0;
    right:0;
    text-align:right;
    font-size:11px;
}

</style>

</head>

<body>

<h2>INVENTRA</h2>

<p>Laporan Inventaris Gudang</p>

<hr>

<table class="summary">

<tr>
    <td width="200"><strong>Total Barang</strong></td>
    <td>: {{ $totalBarang }}</td>
</tr>

<tr>
    <td><strong>Total Stok</strong></td>
    <td>: {{ $totalStok }}</td>
</tr>

<tr>
    <td><strong>Total Transaksi</strong></td>
    <td>: {{ $totalTransaksi }}</td>
</tr>

<tr>
    <td><strong>Barang Menipis</strong></td>
    <td>: {{ $barangMenipis }}</td>
</tr>

<tr>
    <td><strong>Tanggal Cetak</strong></td>
    <td>: {{ now()->format('d-m-Y H:i') }}</td>
</tr>

</table>

<div class="section-title">
Daftar Barang
</div>

<table>

<thead>

<tr>

<th>No</th>

<th>Kode</th>

<th>Nama</th>

<th>Kategori</th>

<th>Stok</th>

<th>Lokasi</th>

</tr>

</thead>

<tbody>

@foreach($items as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $item->item_code }}</td>

<td>{{ $item->name }}</td>

<td>{{ $item->category }}</td>

<td>{{ $item->current_stock }}</td>

<td>{{ $item->location }}</td>

</tr>

@endforeach

</tbody>

</table>

<div class="section-title">
Riwayat Transaksi
</div>

<table>

<thead>

<tr>

<th>No</th>

<th>Barang</th>

<th>Jenis</th>

<th>Qty</th>

<th>Stok Setelah</th>

<th>Operator</th>

<th>Tanggal</th>

</tr>

</thead>

<tbody>

@foreach($transactions as $trx)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $trx->item->name }}</td>

<td>{{ strtoupper($trx->transaction_type) }}</td>

<td>{{ $trx->quantity }}</td>

<td>{{ $trx->balance_after }}</td>

<td>{{ $trx->operator_name }}</td>

<td>{{ \Carbon\Carbon::parse($trx->transaction_date)->format('d-m-Y') }}</td>

</tr>

@endforeach

</tbody>

</table>

<div class="footer">

Dicetak oleh :
{{ Auth::user()->name }}

</div>

</body>

</html>