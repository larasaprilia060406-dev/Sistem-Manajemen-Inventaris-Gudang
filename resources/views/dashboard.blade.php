@extends('layouts.admin')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">
        Dashboard Inventaris Gudang
    </h2>

    <div class="row">

        <div class="col-md-3">

            <div class="card text-white bg-primary mb-3">

                <div class="card-body">

                    <h5>Total Barang</h5>

                    <h2>
                        {{ $totalItems }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card text-white bg-success mb-3">

                <div class="card-body">

                    <h5>Barang Masuk</h5>

                    <h2>
                        {{ $stockIn }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card text-white bg-danger mb-3">

                <div class="card-body">

                    <h5>Barang Keluar</h5>

                    <h2>
                        {{ $stockOut }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card text-white bg-warning mb-3">

                <div class="card-body">

                    <h5>Stok Menipis</h5>

                    <h2>
                        {{ $lowStock }}
                    </h2>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection