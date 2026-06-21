@extends('layouts.admin')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-danger text-white">
            <h4>Stok Keluar</h4>
        </div>

        <div class="card-body">

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('stock.out.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Barang</label>

                    <select name="item_id" class="form-control" required>

                        <option value="">Pilih Barang</option>

                        @foreach($items as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                                (Stok: {{ $item->current_stock }})
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Keluar</label>
                    <input type="number"
                           name="quantity"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Referensi</label>
                    <input type="text"
                           name="reference_no"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Catatan</label>
                    <textarea name="notes"
                              class="form-control"></textarea>
                </div>

                <button type="submit"
                        class="btn btn-danger">
                    Simpan
                </button>

                <a href="{{ route('items.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection