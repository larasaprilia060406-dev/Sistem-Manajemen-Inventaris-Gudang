<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')

    <div class="mb-3">
        <label class="form-label">
            Nama
        </label>

        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name', $user->name) }}"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">
            Email
        </label>

        <input type="email"
               name="email"
               class="form-control"
               value="{{ old('email', $user->email) }}"
               required>
    </div>

    <button type="submit" class="btn btn-primary">
        Simpan Perubahan
    </button>

</form>