@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <h1 class="m-0 text-dark">Daftar Testimoni</h1>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Testimoni
        </a>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        <!-- Alert Sukses -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

      
         
                <table id="myTable" class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 50px">No</th>
                            <th style="width: 100px">Gambar</th>
                            <th style="width: 150px">Nama</th>
                            <th style="width: 150px">Jabatan</th>
                            <th style="width: 100px">Rating</th>
                            <th style="width: 180px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($testimonials as $i => $t)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>
                                    @if($t->gambar)
                                        <img src="{{ asset('storage/' . $t->gambar) }}" 
                                             class="img-thumbnail" style="width:60px; height:60px; object-fit:cover;">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $t->nama }}</td>
                                <td>{{ $t->jabatan }}</td>
                                <td>
                                    <span class="badge badge-warning">{{ $t->rating }} ⭐</span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.testimonials.edit', $t->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.testimonials.destroy', $t->id) }}" 
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Hapus testimoni ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada testimoni</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
  

    </div>
</section>
@endsection

@push('scripts')
<!-- DataTables JS -->
 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <!-- DataTables CSS & JS -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
 <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            responsive: true,
            autoWidth: false,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                paginate: {
                    first: "Awal",
                    last: "Akhir",
                    next: "›",
                    previous: "‹"
                },
                zeroRecords: "Tidak ada data yang cocok",
                infoEmpty: "Tidak ada data tersedia",
                infoFiltered: "(disaring dari total _MAX_ data)"
            }
        });
    });
</script>
@endpush
