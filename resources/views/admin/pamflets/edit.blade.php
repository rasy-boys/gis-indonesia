@extends('layouts.admin')

@section('content')
<section class="content-header mb-3">
    <h1>Edit Pamflet</h1>
</section>

<section class="content">
    <div class="card card-success">
        <div class="card-body">
            <form id="editPamfletForm" action="{{ route('admin.pamflets.update', $pamflet) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Judul Pamflet <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $pamflet->judul) }}" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Tanggal Mulai</label>
                        <input type="date" 
                               name="tanggal_mulai" 
                               class="form-control" 
                               value="{{ old('tanggal_mulai', \Carbon\Carbon::parse($pamflet->tanggal_mulai)->format('Y-m-d')) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Selesai</label>
                        <input type="date" 
                               name="tanggal_selesai" 
                               class="form-control" 
                               value="{{ old('tanggal_selesai', \Carbon\Carbon::parse($pamflet->tanggal_selesai)->format('Y-m-d')) }}">
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Gambar</label><br>
                    @if($pamflet->gambar)
                        <img src="{{ asset('storage/' . $pamflet->gambar) }}" alt="{{ $pamflet->judul }}" class="img-thumbnail mb-2" style="max-width: 150px;">
                    @endif
                    <input type="file" name="gambar" class="form-control">
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <!-- Hidden textarea -->
                    <textarea name="deskripsi" id="deskripsi" class="form-control d-none">{{ old('deskripsi', $pamflet->deskripsi) }}</textarea>
                    
                    <!-- Quill editor container -->
                    <div id="quill-editor" style="height: 200px;">{!! old('deskripsi', $pamflet->deskripsi) !!}</div>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="{{ route('admin.pamflets.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</section>
@endsection

@push('styles')
    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Init Quill
        var quill = new Quill('#quill-editor', {
            theme: 'snow',
            placeholder: 'Tulis deskripsi di sini...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });

        // Sync Quill ke textarea saat submit
        document.getElementById('editPamfletForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // ambil html quill
            document.getElementById('deskripsi').value = quill.root.innerHTML;

            Swal.fire({
                title: 'Update Pamflet?',
                text: "Perubahan akan disimpan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.target.submit();
                }
            });
        });
    </script>
@endpush
