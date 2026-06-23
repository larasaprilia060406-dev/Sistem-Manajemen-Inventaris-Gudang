<form method="POST" action="{{ route('profile.destroy') }}"
      onsubmit="return confirm('Yakin ingin menghapus akun ini?')">

    @csrf
    @method('DELETE')

    <div class="mb-3">

        <label class="form-label">
            Password Konfirmasi
        </label>

        <input type="password"
               name="password"
               class="form-control"
               placeholder="Masukkan password"
               required>

    </div>

    <button type="submit" class="btn btn-danger">
        Hapus Akun
    </button>

</form>