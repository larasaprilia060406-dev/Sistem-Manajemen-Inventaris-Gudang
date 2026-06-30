@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold">
            <i class="fa-solid fa-file-lines text-primary"></i>
            Laporan Inventaris
        </h2>

        <p class="text-muted">
            Rekap data barang dan transaksi inventaris gudang.
        </p>
    </div>

</div>

<!-- ===================== DAFTAR BARANG ===================== -->

<div class="card shadow-sm border-0 mb-4">

    <div class="card-header bg-primary text-white">
        <i class="fa-solid fa-box"></i>
        Daftar Barang
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">

                    <tr>
                        <th width="60">No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Lokasi</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($items as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->item_code }}</td>

                        <td>{{ $item->name }}</td>

                        <td>{{ $item->category }}</td>

                        <td>{{ $item->unit }}</td>

                        <td>

                            @if($item->current_stock <= 10)

                                <span class="badge bg-danger">
                                    {{ $item->current_stock }}
                                </span>

                            @else

                                <span class="badge bg-success">
                                    {{ $item->current_stock }}
                                </span>

                            @endif

                        </td>

                        <td>{{ $item->location }}</td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center">
                            Tidak ada data barang.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- ===================== RIWAYAT TRANSAKSI ===================== -->

<div class="card shadow-sm border-0">

    <div class="card-header bg-success text-white">
        <i class="fa-solid fa-clock-rotate-left"></i>
        Riwayat Transaksi
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

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

                    </tr>

                </thead>

                <tbody>

                @forelse($transactions as $trx)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            {{ $trx->item->name ?? '-' }}

                        </td>

                        <td>

                            @if($trx->transaction_type == 'in')

                                <span class="badge bg-success">
                                    Masuk
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Keluar
                                </span>

                            @endif

                        </td>

                        <td>{{ $trx->quantity }}</td>

                        <td>{{ $trx->balance_after }}</td>

                        <td>{{ $trx->reference_no }}</td>

                        <td>{{ $trx->operator_name }}</td>

                        <td>

                            {{ \Carbon\Carbon::parse($trx->transaction_date)->format('d-m-Y H:i') }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center">

                            Tidak ada data transaksi.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection