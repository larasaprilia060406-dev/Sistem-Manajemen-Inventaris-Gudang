@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>📦 Data Barang</h2>

    <a href="{{ route('items.create') }}" class="btn btn-primary">
        + Tambah Barang
    </a>
</div>

<div class="card shadow border-0">

    <div class="card-header bg-primary text-white">
        Daftar Barang
    </div>

    <div class="card-body">

        <div class="mb-3">
            <input type="text"
                   id="searchInput"
                   class="form-control"
                   placeholder="Cari nama barang...">
        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle" id="barangTable">

                <thead class="table-dark">
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Min</th>
                    <th>Max</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
                </thead>

                <tbody>

                @foreach($items as $item)

                <tr>

                    <td>{{ $item->item_code }}</td>

                    <td>
                        <strong>{{ $item->name }}</strong>
                    </td>

                    <td>
                        <span class="badge bg-info">
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

                    <td>{{ $item->min_stock }}</td>

                    <td>{{ $item->max_stock }}</td>

                    <td>{{ $item->location }}</td>

                    <td>

                        <a href="{{ route('items.edit',$item->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('items.destroy',$item->id) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Yakin hapus data?')"
                                class="btn btn-danger btn-sm">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

<script>
document.getElementById("searchInput").addEventListener("keyup", function() {

    let filter = this.value.toLowerCase();

    let rows = document.querySelectorAll("#barangTable tbody tr");

    rows.forEach(row => {

        let text = row.textContent.toLowerCase();

        row.style.display =
        text.includes(filter) ? "" : "none";

    });

});
</script>

@endsection