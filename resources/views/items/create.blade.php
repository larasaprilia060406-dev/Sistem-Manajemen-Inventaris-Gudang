@extends('layouts.app')

@section('content')

<h2>Tambah Barang</h2>

<form action="/items" method="POST">

@csrf

<input type="text"
name="item_code"
placeholder="Kode Barang"
class="form-control mb-2">

<input type="text"
name="name"
placeholder="Nama Barang"
class="form-control mb-2">

<input type="text"
name="category"
placeholder="Kategori"
class="form-control mb-2">

<input type="number"
name="current_stock"
placeholder="Stok"
class="form-control mb-2">

<button class="btn btn-primary">
Simpan
</button>

</form>

@endsection