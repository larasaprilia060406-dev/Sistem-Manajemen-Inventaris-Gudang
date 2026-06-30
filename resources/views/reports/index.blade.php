@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                <i class="fa-solid fa-file-lines text-primary"></i>
                Laporan Inventaris
            </h2>

            <p class="text-muted mb-0">
                Rekap data barang dan transaksi inventaris gudang.
            </p>
        </div>

    </div>

    <!-- ================= FILTER ================= -->

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-primary text-white">

            <i class="fa-solid fa-filter"></i>

            Filter Laporan

        </div>

        <div class="card-body">

            <form method="GET"
                  action="{{ route('reports.index') }}">

                <div class="row">

                    <div class="col-md-3 mb-3">

                        <label class="form-label">

                            Tanggal Awal

                        </label>

                        <input
                            type="date"
                            name="start_date"
                            class="form-control"
                            value="{{ request('start_date') }}">

                    </div>

                    <div class="col-md-3 mb-3">

                        <label class="form-label">

                            Tanggal Akhir

                        </label>

                        <input
                            type="date"
                            name="end_date"
                            class="form-control"
                            value="{{ request('end_date') }}">

                    </div>

                    <div class="col-md-3 mb-3">

                        <label class="form-label">

                            Jenis Transaksi

                        </label>

                        <select
                            name="jenis"
                            class="form-select">

                            <option value="">Semua</option>

                            <option value="in"
                                {{ request('jenis')=='in' ? 'selected' : '' }}>

                                Barang Masuk

                            </option>

                            <option value="out"
                                {{ request('jenis')=='out' ? 'selected' : '' }}>

                                Barang Keluar

                            </option>

                            <option value="adjustment"
                                {{ request('jenis')=='adjustment' ? 'selected' : '' }}>

                                Penyesuaian

                            </option>

                        </select>

                    </div>

                    <div class="col-md-3 mb-3">

                        <label class="form-label">

                            Barang

                        </label>

                        <select
                            name="barang"
                            class="form-select">

                            <option value="">

                                Semua Barang

                            </option>

                            @foreach($items as $item)

                                <option
                                    value="{{ $item->id }}"
                                    {{ request('barang')==$item->id ? 'selected' : '' }}>

                                    {{ $item->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="mt-3">

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="fa-solid fa-magnifying-glass"></i>

                        Filter

                    </button>

                    <a href="{{ route('reports.index') }}"
                       class="btn btn-secondary">

                        Reset

                    </a>

                </div>

            </form>

        </div>

    </div>

    <!-- ================= STATISTIK ================= -->

    <div class="row g-3 mb-4">

    <div class="col-lg-3 col-md-6">
        <div class="card bg-primary text-white shadow-sm stats-card">
            <div class="card-body text-center py-3">
                <i class="fa-solid fa-cubes fa-2x mb-2"></i>
                <h6 class="mb-2">Total Barang</h6>
                <h2 class="fw-bold mb-0">{{ $totalBarang }}</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card bg-success text-white shadow-sm stats-card">
            <div class="card-body text-center py-3">
                <i class="fa-solid fa-warehouse fa-2x mb-2"></i>
                <h6 class="mb-2">Total Stok</h6>
                <h2 class="fw-bold mb-0">{{ $totalStok }}</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card bg-warning text-dark shadow-sm stats-card">
            <div class="card-body text-center py-3">
                <i class="fa-solid fa-right-left fa-2x mb-2"></i>
                <h6 class="mb-2">Total Transaksi</h6>
                <h2 class="fw-bold mb-0">{{ $totalTransaksi }}</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card bg-danger text-white shadow-sm stats-card">
            <div class="card-body text-center py-3">
                <i class="fa-solid fa-triangle-exclamation fa-2x mb-2"></i>
                <h6 class="mb-2">Barang Menipis</h6>
                <h2 class="fw-bold mb-0">{{ $barangMenipis }}</h2>
            </div>
        </div>
    </div>

</div>
    <!-- ================= DAFTAR BARANG ================= -->

<div class="card shadow-sm border-0 mb-4">

    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

        <div>
            <i class="fa-solid fa-box"></i>
            Daftar Barang
        </div>

        <span class="badge bg-light text-dark">
            Total : {{ $items->count() }} Barang
        </span>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-striped table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th width="60">No</th>

                        <th>Kode</th>

                        <th>Nama Barang</th>

                        <th>Kategori</th>

                        <th>Satuan</th>

                        <th>Stok</th>

                        <th>Min</th>

                        <th>Max</th>

                        <th>Lokasi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($items as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            <span class="badge bg-secondary">

                                {{ $item->item_code }}

                            </span>

                        </td>

                        <td>

                            <strong>

                                {{ $item->name }}

                            </strong>

                        </td>

                        <td>

                            {{ $item->category }}

                        </td>

                        <td>

                            {{ $item->unit }}

                        </td>

                        <td>

                            @if($item->current_stock <= $item->min_stock)

                                <span class="badge bg-danger">

                                    {{ $item->current_stock }}

                                </span>

                            @elseif($item->current_stock >= $item->max_stock)

                                <span class="badge bg-warning text-dark">

                                    {{ $item->current_stock }}

                                </span>

                            @else

                                <span class="badge bg-success">

                                    {{ $item->current_stock }}

                                </span>

                            @endif

                        </td>

                        <td>

                            {{ $item->min_stock }}

                        </td>

                        <td>

                            {{ $item->max_stock }}

                        </td>

                        <td>

                            {{ $item->location }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9" class="text-center text-muted py-4">

                            <i class="fa-solid fa-box-open fa-2x mb-2"></i>

                            <br>

                            Tidak ada data barang.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
<!-- ================= RIWAYAT TRANSAKSI ================= -->

<div class="card shadow-sm border-0 mb-4">

    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">

        <div>

            <i class="fa-solid fa-clock-rotate-left"></i>

            Riwayat Transaksi

        </div>

        <span class="badge bg-light text-dark">

            Total : {{ $transactions->count() }} Transaksi

        </span>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-striped table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th width="60">No</th>

                        <th>Barang</th>

                        <th>Jenis</th>

                        <th>Qty</th>

                        <th>Stok Setelah</th>

                        <th>Referensi</th>

                        <th>Operator</th>

                        <th>Tanggal</th>

                        <th>Catatan</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($transactions as $trx)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            <strong>

                                {{ $trx->item->name }}

                            </strong>

                        </td>

                        <td>

                            @if($trx->transaction_type == 'in')

                                <span class="badge bg-success">

                                    Barang Masuk

                                </span>

                            @elseif($trx->transaction_type == 'out')

                                <span class="badge bg-danger">

                                    Barang Keluar

                                </span>

                            @else

                                <span class="badge bg-warning text-dark">

                                    Adjustment

                                </span>

                            @endif

                        </td>

                        <td>

                            @if($trx->transaction_type == 'in')

                                <span class="text-success fw-bold">

                                    +{{ $trx->quantity }}

                                </span>

                            @elseif($trx->transaction_type == 'out')

                                <span class="text-danger fw-bold">

                                    -{{ $trx->quantity }}

                                </span>

                            @else

                                <span class="text-warning fw-bold">

                                    {{ $trx->quantity }}

                                </span>

                            @endif

                        </td>

                        <td>

                            <span class="badge bg-primary">

                                {{ $trx->balance_after }}

                            </span>

                        </td>

                        <td>

                            {{ $trx->reference_no ?? '-' }}

                        </td>

                        <td>

                            {{ $trx->operator_name ?? '-' }}

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($trx->transaction_date)->format('d-m-Y') }}

                        </td>

                        <td>

                            {{ $trx->notes ?? '-' }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9" class="text-center text-muted py-4">

                            <i class="fa-solid fa-folder-open fa-2x mb-2"></i>

                            <br>

                            Belum ada data transaksi.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
<!-- ================= ACTION BUTTON ================= -->

<div class="card shadow-sm border-0 mb-4">

    <div class="card-body">

        <div class="row align-items-center">

            <div class="col-md-6">

                <h5 class="mb-0">
                    <i class="fa-solid fa-chart-column text-primary"></i>
                    Laporan Inventaris
                </h5>

                <small class="text-muted">

                    Cetak dan export laporan inventaris gudang.

                </small>

            </div>

            <div class="col-md-6 text-end">

                <a href="{{ route('reports.pdf') }}"
                   class="btn btn-danger">

                    <i class="fa-solid fa-file-pdf"></i>

                    Export PDF

                </a>

                <a href="#"
                   class="btn btn-success">

                    <i class="fa-solid fa-file-excel"></i>

                    Export Excel

                </a>

                <button
                    onclick="window.print()"
                    class="btn btn-primary">

                    <i class="fa-solid fa-print"></i>

                    Print

                </button>

            </div>

        </div>

    </div>

</div>
@endsection