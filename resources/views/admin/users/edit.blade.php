@extends('layouts.admin')

@section('title', 'Edit Data User')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold text-success mb-0">
            <i class="fas fa-user-edit me-2"></i> Edit User
        </h1>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="card shadow-sm">
        <div class="card-body">
            <form id="editUserForm" action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="user" {{ (old('role', $user->role ?? '') == 'user') ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ (old('role', $user->role ?? '') == 'admin') ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password (kosongkan jika tidak diganti)</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-success" id="btnUpdate">
                    <i class="fas fa-save me-1"></i> Update
                </button>
            </form>
        </div>
        <!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('editUserForm').addEventListener('submit', function(e){
    e.preventDefault(); // hentikan submit default

    Swal.fire({
        title: 'Yakin mengupdate data?',
        text: "Pastikan semua data sudah benar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Update!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit(); // submit form jika konfirmasi
        }
    });
});
</script>

    </div>
</div>
@endsection



