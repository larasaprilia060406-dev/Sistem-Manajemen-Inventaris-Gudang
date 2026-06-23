@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">

                👥 Manajemen User

            </h2>

            <p class="text-secondary mb-0">

                Kelola akun pengguna sistem Inventra.

            </p>

        </div>

        <a href="{{ route('users.create') }}"

           class="btn btn-primary">

            ➕ Tambah User

        </a>

    </div>


    @if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

    @endif


    <div class="card border-0 shadow-sm">

        <div class="card-body">


            <div class="row mb-4">

                <div class="col-md-4">

                    <input type="text"

                        id="searchUser"

                        class="form-control"

                        placeholder="🔍 Cari user...">

                </div>

            </div>


            <div class="table-responsive">

                <table class="table table-hover align-middle"

                    id="userTable">

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Nama</th>

                            <th>Email</th>

                            <th>Role</th>

                            <th width="180">

                                Aksi

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($users as $user)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                <strong>

                                    {{ $user->name }}

                                </strong>

                            </td>

                            <td>

                                {{ $user->email }}

                            </td>

                            <td>

                                @if($user->role=='admin')

                                <span class="badge bg-danger">

                                    Admin

                                </span>

                                @else

                                <span class="badge bg-success">

                                    User

                                </span>

                                @endif

                            </td>

                            <td>

                                <div class="d-flex gap-2">

                                    <a href="{{ route('users.edit',$user->id) }}"

                                       class="btn btn-warning btn-sm">

                                        ✏️ Edit

                                    </a>


                                    <form action="{{ route('users.destroy',$user->id) }}"

                                          method="POST">

                                        @csrf

                                        @method('DELETE')

                                        <button

                                            onclick="return confirm('Hapus user ini?')"

                                            class="btn btn-danger btn-sm">

                                            🗑️

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"

                                class="text-center">

                                Tidak ada data user

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


<script>

document.getElementById('searchUser')

.addEventListener('keyup',function(){

let filter=this.value.toLowerCase();

let rows=document.querySelectorAll('#userTable tbody tr');

rows.forEach(row=>{

let text=row.textContent.toLowerCase();

row.style.display=

text.includes(filter)?'':'none';

});

});

</script>

@endsection