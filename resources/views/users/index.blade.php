@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Manajemen User</h3>

        <a href="{{ route('users.create') }}"
           class="btn btn-primary">
            + Tambah User
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($users as $user)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>

                            @if($user->role == 'admin')
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

                            <a href="{{ route('users.edit',$user->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('users.destroy',$user->id) }}"
                                  method="POST"
                                  style="display:inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus user ini?')">
                                    Hapus
                                </button>

                            </form>

                        </td>
                    </tr>

                    @empty

                    <tr>
                        <td colspan="5" class="text-center">
                            Tidak ada data user
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection