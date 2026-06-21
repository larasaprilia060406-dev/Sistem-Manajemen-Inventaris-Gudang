@extends('layouts.admin')

@section('content')

<div class="container mt-4">

```
<div class="card shadow">

    <div class="card-header bg-warning text-dark">
        <h4>Edit Data Barang</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('items.update', $item->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Kode Barang</label>
                <input type="text"
                       name="item_code"
                       class="form-control"
                       value="{{ $item->item_code }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ $item->name }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input type="text"
                       name="category"
                       class="form-control"
                       value="{{ $item->category }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Satuan</label>
                <input type="text"
                       name="unit"
                       class="form-control"
                       value="{{ $item->unit }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Stok Saat Ini</label>
                <input type="number"
                       name="current_stock"
                       class="form-control"
                       value="{{ $item->current_stock }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Minimum Stok</label>
                <input type="number"
                       name="min_stock"
                       class="form-control"
                       value="{{ $item->min_stock }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Maksimum Stok</label>
                <input type="number"
                       name="max_stock"
                       class="form-control"
                       value="{{ $item->max_stock }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text"
                       name="location"
                       class="form-control"
                       value="{{ $item->location }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description"
                          class="form-control"
                          rows="4">{{ $item->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-warning">
                Update
            </button>

            <a href="{{ route('items.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>
```

</div>

@endsection
