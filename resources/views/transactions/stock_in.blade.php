@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-success text-white">
        📥 Stok Masuk
    </div>

    <div class="card-body">

        <form action="/stock-in" method="POST">
            @csrf

            <div class="mb-3">
                <label>Barang</label>

                <select name="item_id" class="form-control">

                    @foreach($items as $item)

                    <option value="{{ $item->id }}">
                        {{ $item->name }}
                    </option>

                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Jumlah</label>

                <input
                    type="number"
                    name="quantity"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label>Nomor Referensi</label>

                <input
                    type="text"
                    name="reference_no"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label>Catatan</label>

                <textarea
                    name="notes"
                    class="form-control"></textarea>
            </div>

            <button class="btn btn-success">
                Simpan
            </button>

        </form>

    </div>

</div>

@endsection