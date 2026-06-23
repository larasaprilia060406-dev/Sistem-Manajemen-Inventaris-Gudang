@extends('layouts.admin')

@section('content')

<h1 class="mb-4">

👋 Dashboard User

</h1>

<div class="row">

<div class="col-md-4">

<div class="card shadow border-0">

<div class="card-body">

<h5>Total Barang</h5>

<h2>

{{ $totalItems }}

</h2>

</div>

</div>

</div>


<div class="col-md-4">

<div class="card shadow border-0">

<div class="card-body">

<h5>Total Barang Masuk</h5>

<h2>

{{ $stockIn }}

</h2>

</div>

</div>

</div>


<div class="col-md-4">

<div class="card shadow border-0">

<div class="card-body">

<h5>Total Barang Keluar</h5>

<h2>

{{ $stockOut }}

</h2>

</div>

</div>

</div>

</div>

@endsection