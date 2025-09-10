<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Peraturan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow">
    <h1 class="text-2xl font-bold text-green-700 mb-6">Edit Peraturan</h1>

    <form action="{{ route('admin.peraturan.update', $peraturan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Judul</label>
            <input type="text" name="judul" value="{{ $peraturan->judul }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Deskripsi Singkat</label>
            <textarea name="deskripsi" rows="3" class="w-full border p-2 rounded" required>{{ $peraturan->deskripsi }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">File PDF Baru (opsional)</label>
            <input type="file" name="file" accept="application/pdf" class="w-full border p-2 rounded">
            @if ($peraturan->file)
                <p class="mt-2 text-sm">File saat ini: <a href="{{ asset('storage/' . $peraturan->file) }}" target="_blank" class="text-blue-600 hover:underline">Lihat PDF</a></p>
            @endif
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">Perbarui</button>
        <a href="{{ route('admin.peraturan.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
</body>
</html>
