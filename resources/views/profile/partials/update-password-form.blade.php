<form method="POST" action="{{ route('password.update') }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">
            Password Saat Ini
        </label>

        <input type="password"
               name="current_password"
               class="form-control"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">
            Password Baru
        </label>

        <input type="password"
               name="password"
               class="form-control"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">
            Konfirmasi Password Baru
        </label>

        <input type="password"
               name="password_confirmation"
               class="form-control"
               required>
    </div>

    <button type="submit" class="btn btn-warning">
        Update Password
    </button>

</form>