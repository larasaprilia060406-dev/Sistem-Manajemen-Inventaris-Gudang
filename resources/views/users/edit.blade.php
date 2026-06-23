@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-warning">
            Edit User
        </div>

        <div class="card-body">

            <form action="{{ route('users.update',$user->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama</label>

                    <input type="text"
                           name="name"
                           value="{{ $user->name }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label>Email</label>

                    <input type="email"
                           name="email"
                           value="{{ $user->email }}"
                           class="form-control">
                </div>

                <div class="mb-3">

                    <label>Role</label>

                    <select name="role"
                            class="form-control">

                        <option value="admin"
                        {{ $user->role == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="user"
                        {{ $user->role == 'user' ? 'selected' : '' }}>
                            User
                        </option>

                    </select>

                </div>

                <button class="btn btn-success">
                    Update
                </button>

                <a href="{{ route('users.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection