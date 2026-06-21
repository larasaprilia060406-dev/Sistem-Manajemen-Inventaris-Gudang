@extends('layouts.app')

@section('content')

<h2 class="mb-4">Dashboard</h2>

<div class="row">

    <div class="col-md-4">
        <div class="card card-dashboard bg-primary">
            <div class="card-body">
                <h5>Total Barang</h5>
                <h2>{{ $totalItems }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-dashboard bg-success">
            <div class="card-body">
                <h5>Stok Aman</h5>
                <h2>{{ $totalItems }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-dashboard bg-danger">
            <div class="card-body">
                <h5>Stok Minimum</h5>
                <h2>0</h2>
            </div>
        </div>
    </div>

</div>

<div class="mt-4">
    <a href="/items" class="btn btn-primary">
        Kelola Barang
    </a>
</div>

@endsection