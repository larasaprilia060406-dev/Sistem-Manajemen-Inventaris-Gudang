@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">

                📋 Riwayat Transaksi

            </h2>

            <p class="text-secondary mb-0">

                Monitoring seluruh aktivitas stok barang.

            </p>

        </div>

    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body">


            <div class="row mb-4">

                <div class="col-md-4">

                    <input type="text"

                        id="searchInput"

                        class="form-control"

                        placeholder="🔍 Cari transaksi...">

                </div>

            </div>


            <div class="table-responsive">

                <table class="table table-hover align-middle"

                    id="trxTable">

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

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                <strong>

                                    {{ $trx->item->name }}

                                </strong>

                            </td>

                            <td>

                                @if($trx->transaction_type == 'in')

                                <span class="badge bg-success">

                                    📥 Masuk

                                </span>

                                @else

                                <span class="badge bg-danger">

                                    📤 Keluar

                                </span>

                                @endif

                            </td>

                            <td>

                                {{ $trx->quantity }}

                            </td>

                            <td>

                                {{ $trx->balance_after }}

                            </td>

                            <td>

                                {{ $trx->operator_name }}

                            </td>

                            <td>

                                {{ $trx->transaction_date }}

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


<script>

document.getElementById('searchInput')

.addEventListener('keyup',function(){

let filter=this.value.toLowerCase();

let rows=document.querySelectorAll('#trxTable tbody tr');

rows.forEach(row=>{

let text=row.textContent.toLowerCase();

row.style.display=

text.includes(filter)?'':'none';

});

});

</script>

@endsection