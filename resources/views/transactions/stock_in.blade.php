@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold">

            📥 Stok Masuk

        </h2>

        <p class="text-secondary">

            Tambahkan barang yang masuk ke gudang.

        </p>

    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form action="{{ route('stock.in.store') }}"
                  method="POST">

                @csrf


                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">

                            Barang

                        </label>

                        <select name="item_id"

                            class="form-select">

                            @foreach($items as $item)

                            <option value="{{ $item->id }}">

                                {{ $item->name }}

                            </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">

                            Jumlah

                        </label>

                        <input type="number"

                            name="quantity"

                            class="form-control"

                            required>

                    </div>

                </div>


                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">

                            Nomor Referensi

                        </label>

                        <input type="text"

                            name="reference_no"

                            class="form-control">

                    </div>


                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">

                            Catatan

                        </label>

                        <textarea

                            name="notes"

                            rows="3"

                            class="form-control"></textarea>

                    </div>

                </div>


                <div class="d-flex gap-3">

                    <button class="btn btn-success">

                        💾 Simpan Data

                    </button>

                    <a href="{{ route('dashboard') }}"

                        class="btn btn-outline-secondary">

                        ← Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection