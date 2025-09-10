{{-- resources/views/admin/faq/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="m-0">Daftar FAQ</h1>
            <a href="{{ route('admin.faq.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah FAQ
            </a>
        </div>

      
                <table id="myTable" class="table table-bordered table-striped mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 60px">No</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th style="width: 150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faqs as $faq)
                        <tr>
                            <td></td>
                            <td>{{ $faq->question }}</td>
                            <td>{!! $faq->answer !!}</td>

                            <td class="text-center">
                                <a href="{{ route('admin.faq.edit', $faq->id) }}" 
                                   class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.faq.destroy', $faq->id) }}" 
                                      method="POST" class="d-inline deleteFaqForm">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger btnDelete" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
          

        {{-- <div class="mt-3">
            {{ $faqs->links('pagination::bootstrap-5') }}
        </div> --}}
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
    // DataTables
    var t = $('#myTable').DataTable({
        "columnDefs": [
            { "orderable": false, "targets": 3 } // Kolom aksi tidak bisa di-sort
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
        const form = $(this).closest('.deleteFaqForm');
        Swal.fire({
            title: 'Yakin menghapus FAQ?',
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
