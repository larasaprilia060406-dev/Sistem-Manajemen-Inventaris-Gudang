@extends('layouts.app')

@section('content')

<h2>Data Barang</h2>

<a href="/items/create"
class="btn btn-success mb-3">
Tambah Barang
</a>

<table class="table table-bordered">

<tr>
    <th>Kode</th>
    <th>Nama</th>
    <th>Kategori</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

@foreach($items as $item)

<tr>

<td>{{ $item->item_code }}</td>
<td>{{ $item->name }}</td>
<td>{{ $item->category }}</td>
<td>{{ $item->current_stock }}</td>

<td>

<a href="/items/{{$item->id}}/edit"
class="btn btn-warning">
Edit
</a>

<form action="/items/{{$item->id}}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger">
Hapus
</button>

</form>

</td>

</tr>

@endforeach

</table>

@endsection