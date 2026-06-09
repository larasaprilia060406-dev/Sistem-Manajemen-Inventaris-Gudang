@extends('layouts.app')

@section('content')

<h2>Dashboard Inventaris Gudang</h2>

<div class="card mt-3">
    <div class="card-body">
        Total Barang : {{ $totalBarang }}
    </div>
</div>

<a href="/items" class="btn btn-primary mt-3">
    Data Barang
</a>

@endsection