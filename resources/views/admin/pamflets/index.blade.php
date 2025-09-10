{{-- resources/views/admin/pamflets/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<section class="content-header mb-3">
    <h1>Daftar Pamflet</h1>
    <div class="mb-3">
        <a href="{{ route('admin.pamflets.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Pamflet
        </a>
    </div>

</section>

<section class="content">
    

            <table id="myTable" class="table table-bordered table-hover text-center">
                <thead class="bg-success text-white">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th style="width: 150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pamflets as $pamflet)
                        <tr>
                            <td></td>
                            <td>
                                <img src="{{ asset('storage/' . $pamflet->gambar) }}" 
                                     alt="{{ $pamflet->judul }}" 
                                     class="img-thumbnail" style="max-width: 100px;">
                            </td>
                            <td>{{ $pamflet->judul }}</td>
                            <td>
                                {{ $pamflet->tanggal_mulai ? \Carbon\Carbon::parse($pamflet->tanggal_mulai)->format('d M Y') : '-' }}
                                s/d
                                {{ $pamflet->tanggal_selesai ? \Carbon\Carbon::parse($pamflet->tanggal_selesai)->format('d M Y') : '-' }}
                            </td>
                            <td>
                                <a href="{{ route('admin.pamflets.edit', $pamflet) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.pamflets.destroy', $pamflet) }}" method="POST" class="deletePamfletForm d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm btnDelete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- <div class="mt-4 pt-3 border-top d-flex justify-content-center">
                {{ $pamflets->links('vendor.pagination.tailwind-green') }}
            </div> --}}
       
</section>
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
    // DataTables
    var t = $('#myTable').DataTable({
        "columnDefs": [
            { "orderable": false, "targets": 4 } // Kolom aksi tidak bisa di-sort
        ]
    });

    // Nomor urut otomatis
    t.on('order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    // SweetAlert Hapus
    $('.btnDelete').on('click', function(){
        const form = $(this).closest('.deletePamfletForm');
        Swal.fire({
            title: 'Yakin menghapus pamflet?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
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
