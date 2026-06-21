@extends('layouts.admin')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">
        Tambah Barang
    </div>

    <div class="card-body">

        <form action="{{ route('items.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label>Kode Barang</label>
                    <input type="text" name="item_code" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Nama Barang</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Kategori</label>
                    <input type="text" name="category" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Satuan</label>
                    <input type="text" name="unit" class="form-control" value="pcs">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Stok</label>
                    <input type="number" name="current_stock" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Minimum Stok</label>
                    <input type="number" name="min_stock" class="form-control" value="10">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Maksimum Stok</label>
                    <input type="number" name="max_stock" class="form-control" value="100">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Lokasi</label>
                    <input type="text" name="location" class="form-control">
                </div>

                <div class="col-12 mb-3">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

            </div>

            <button class="btn btn-success">
                Simpan
            </button>

            <a href="/items" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection