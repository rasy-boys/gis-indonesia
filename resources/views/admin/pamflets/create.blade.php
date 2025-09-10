{{-- resources/views/admin/pamflets/create.blade.php --}}
@extends('layouts.admin')

@section('content')
<section class="content-header mb-3">
    <h1>Tambah Pamflet</h1>
</section>

<section class="content">
    <div class="card card-success">
        <div class="card-body">
            <form id="formPamflet" action="{{ route('admin.pamflets.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Judul Pamflet <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label>Gambar <span class="text-danger">*</span></label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    {{-- Quill editor --}}
                    <div id="editor" style="height: 200px;">{!! old('deskripsi') !!}</div>
                    <input type="hidden" name="deskripsi" id="deskripsi">
                </div>

                <button type="button" id="btnSubmit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('admin.pamflets.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    // Init Quill
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    document.getElementById('btnSubmit').addEventListener('click', function(e) {
        // copy quill content to hidden input
        document.getElementById('deskripsi').value = quill.root.innerHTML;

        Swal.fire({
            title: 'Simpan Pamflet?',
            text: "Pastikan data sudah benar sebelum disimpan.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formPamflet').submit();
            }
        })
    });
</script>
@endpush
