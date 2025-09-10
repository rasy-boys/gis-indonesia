@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="m-0">Edit FAQ</h1>
            <a href="{{ route('admin.faq.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Pertanyaan --}}
                    <div class="form-group">
                        <label for="question">Pertanyaan</label>
                        <input type="text" 
                               name="question" 
                               id="question" 
                               class="form-control @error('question') is-invalid @enderror"
                               value="{{ old('question', $faq->question) }}" 
                               required>
                        @error('question')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jawaban (pakai Quill) --}}
                    <div class="form-group">
                        <label for="answer">Jawaban</label>
                        <div id="editor-answer" style="height: 150px;"></div>
                        <input type="hidden" name="answer" id="answer">
                        @error('answer')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        // Inisialisasi Quill
        var quillAnswer = new Quill('#editor-answer', {
            theme: 'snow'
        });

        // Isi awal editor (dari DB atau old value)
        quillAnswer.root.innerHTML = `{!! old('answer', $faq->answer) !!}`;

        // Sinkronisasi ke hidden input
        function syncQuillToHidden() {
            document.getElementById('answer').value = quillAnswer.root.innerHTML.trim();
        }

        // Sync setiap kali ada perubahan
        quillAnswer.on('text-change', syncQuillToHidden);

        // Sync terakhir sebelum submit
        document.querySelector('form').addEventListener('submit', function () {
            syncQuillToHidden();
        });
    </script>
@endpush
