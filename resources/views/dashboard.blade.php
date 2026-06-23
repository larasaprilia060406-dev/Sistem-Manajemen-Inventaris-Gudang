@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="row mb-4">

        <div class="col-md-8">

            <h2 class="fw-bold">

                Dashboard Inventra

            </h2>

            <p class="text-secondary">

                Kelola inventaris gudang dengan lebih mudah.

            </p>

        </div>

    </div>


    <!-- Statistik -->

    <div class="row g-4 mb-4">

        <div class="col-md-3">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <small class="text-muted">

                        Total Barang

                    </small>

                    <h2 class="fw-bold mt-2">

                        {{ $totalItems }}

                    </h2>

                </div>

            </div>

        </div>


        <div class="col-md-3">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <small class="text-muted">

                        Barang Masuk

                    </small>

                    <h2 class="fw-bold text-success mt-2">

                        {{ $stockIn }}

                    </h2>

                </div>

            </div>

        </div>


        <div class="col-md-3">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <small class="text-muted">

                        Barang Keluar

                    </small>

                    <h2 class="fw-bold text-danger mt-2">

                        {{ $stockOut }}

                    </h2>

                </div>

            </div>

        </div>


        <div class="col-md-3">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <small class="text-muted">

                        Stok Menipis

                    </small>

                    <h2 class="fw-bold text-warning mt-2">

                        {{ $lowStock }}

                    </h2>

                </div>

            </div>

        </div>

    </div>


    <!-- Baris Kedua -->

    <div class="row g-4">

        <div class="col-md-8">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h5 class="fw-bold mb-4">

                        📦 Ringkasan Inventaris

                    </h5>

                    <table class="table">

                        <tr>

                            <td>Total Barang</td>

                            <td>{{ $totalItems }}</td>

                        </tr>

                        <tr>

                            <td>Barang Masuk</td>

                            <td>{{ $stockIn }}</td>

                        </tr>

                        <tr>

                            <td>Barang Keluar</td>

                            <td>{{ $stockOut }}</td>

                        </tr>

                        <tr>

                            <td>Stok Menipis</td>

                            <td>{{ $lowStock }}</td>

                        </tr>

                    </table>

                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h5 class="fw-bold mb-4">

                        ⚡ Aktivitas Hari Ini

                    </h5>

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">

                            Barang masuk diperbarui

                        </li>

                        <li class="list-group-item">

                            Barang keluar diperbarui

                        </li>

                        <li class="list-group-item">

                            Data inventaris aktif

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection