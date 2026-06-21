@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4>Riwayat Transaksi</h4>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Jenis</th>
                        <th>Qty</th>
                        <th>Saldo Akhir</th>
                        <th>Operator</th>
                        <th>Tanggal</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($transactions as $trx)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $trx->item->name }}</td>

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

                        <td>{{ $trx->operator_name }}</td>

                        <td>{{ $trx->transaction_date }}</td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection