@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">

                📦 Data Barang

            </h2>

            <p class="text-secondary mb-0">

                Kelola seluruh data inventaris gudang.

            </p>

        </div>

        <a href="{{ route('items.create') }}"
           class="btn btn-primary">

            <i class="fa-solid fa-plus"></i>

            Tambah Barang

        </a>

    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="row mb-4">

                <div class="col-md-4">

                    <input type="text"

                        id="searchInput"

                        class="form-control"

                        placeholder="🔍 Cari nama barang...">

                </div>

            </div>


            <div class="table-responsive">

                <table class="table align-middle table-hover"

                       id="barangTable">

                    <thead>

                        <tr>

                            <th>Kode</th>

                            <th>Nama Barang</th>

                            <th>Kategori</th>

                            <th>Stok</th>

                            <th>Min</th>

                            <th>Max</th>

                            <th>Lokasi</th>

                            <th width="160">

                                Aksi

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($items as $item)

                        <tr>

                            <td>

                                {{ $item->item_code }}

                            </td>

                            <td>

                                <strong>

                                    {{ $item->name }}

                                </strong>

                            </td>

                            <td>

                                <span class="badge bg-primary">

                                    {{ $item->category }}

                                </span>

                            </td>

                            <td>

                                @if($item->current_stock <= $item->min_stock)

                                <span class="badge bg-danger">

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

                            <td>

                                <div class="d-flex gap-2">

                                    <a href="{{ route('items.edit',$item->id) }}"

                                       class="btn btn-warning btn-sm">

                                        ✏️ Edit

                                    </a>


                                    <form action="{{ route('items.destroy',$item->id) }}"

                                          method="POST">

                                        @csrf

                                        @method('DELETE')

                                        <button

                                            onclick="return confirm('Yakin hapus data?')"

                                            class="btn btn-danger btn-sm">

                                            🗑️

                                        </button>

                                    </form>

                                </div>

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

let rows=document.querySelectorAll('#barangTable tbody tr');

rows.forEach(row=>{

let text=row.textContent.toLowerCase();

row.style.display=

text.includes(filter)?'':'none';

});

});

</script>
@endsection