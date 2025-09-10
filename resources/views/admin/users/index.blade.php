@extends('layouts.admin')

@section('title', 'Data User')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold text-success mb-0">
            <i class="fas fa-users me-2"></i> Daftar User
        </h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-success shadow-sm">
            <i class="fas fa-plus me-1"></i> Tambah User
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table id="myTable" class="table table-hover table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td></td> <!-- Nomor akan diisi otomatis DataTables -->
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role == 'admin')
                                <span class="badge bg-danger">Admin</span>
                            @else
                                <span class="badge bg-primary">User</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline deleteUserForm">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger btnDelete">
                                    <i class="fas fa-trash"></i> Hapus
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
@endsection

@push('scripts')
<!-- jQuery & DataTables -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    var t = $('#myTable').DataTable({
        "columnDefs": [
            { "orderable": false, "targets": 4 } // Kolom aksi tidak bisa di-sort
        ]
    });

    // Nomor urut otomatis sesuai sorting/paging DataTables
    t.on('order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    // SweetAlert Hapus
    $('.btnDelete').on('click', function(){
        const form = $(this).closest('.deleteUserForm');
        Swal.fire({
            title: 'Yakin menghapus user?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if(result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@endpush
