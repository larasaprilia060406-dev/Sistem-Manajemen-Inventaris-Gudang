@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">
        Profil Pengguna
    </h2>

    <div class="row">

        <div class="col-md-8">

            <!-- Informasi Profil -->
            <div class="card shadow mb-4">

                <div class="card-header bg-primary text-white">
                    Informasi Profil
                </div>

                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>

            </div>

            <!-- Ubah Password -->
            <div class="card shadow mb-4">

                <div class="card-header bg-warning text-dark">
                    Ubah Password
                </div>

                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>

            </div>

            <!-- Hapus Akun -->
            <div class="card shadow">

                <div class="card-header bg-danger text-white">
                    Hapus Akun
                </div>

                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>

            </div>

        </div>

    </div>

</div>

@endsection