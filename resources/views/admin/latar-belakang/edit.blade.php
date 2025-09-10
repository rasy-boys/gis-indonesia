{{-- resources/views/admin/latar-belakang/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
<section class="content-header mb-3">
    <h1>Edit Profil</h1>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.latar-belakang.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Judul -->
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="title" value="{{ $data->title ?? '' }}" class="form-control" placeholder="Masukkan judul latar belakang">
                </div>

                <!-- Deskripsi (pakai Quill) -->
                <div class="form-group">
                    <label>Deskripsi</label>
                    <div id="editor" style="min-height: 200px;">{!! $data->description ?? '' !!}</div>
                    <input type="hidden" name="description" id="description">
                </div>

                <!-- Gambar -->
                <div class="form-group">
                    <label>Gambar</label>
                    <div class="d-flex flex-wrap gap-3 align-items-start">
                        <input type="file" name="image" class="form-control-file flex-grow-1">

                        @if ($data && $data->image)
                            <div class="flex-shrink-0">
                                <img src="{{ asset('storage/' . $data->image) }}" class="img-thumbnail" style="max-width: 160px;">
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Tombol -->
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
                </div>
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
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var quill = new Quill('#editor', {
                theme: 'snow'
            });

            // Set value awal
            var hiddenInput = document.getElementById('description');
            hiddenInput.value = `{!! $data->description ?? '' !!}`;

            // Update hidden input saat form submit
            quill.on('text-change', function() {
                hiddenInput.value = quill.root.innerHTML;
            });

            document.querySelector('form').addEventListener('submit', function () {
                hiddenInput.value = quill.root.innerHTML;
            });
        });
    </script>
@endpush
