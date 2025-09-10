<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Jurnal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 bg-gray-100">

<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow">
    <h1 class="text-2xl font-bold text-green-700 mb-6">Edit Jurnal</h1>

    <form action="{{ route('admin.jurnal.update', $jurnal->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-4">
            <label class="font-semibold">Judul</label>
            <input type="text" name="judul" value="{{ $jurnal->judul }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Tanggal</label>
            <input type="date" name="tanggal" value="{{ $jurnal->tanggal }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Deskripsi</label>
            <textarea name="deskripsi" rows="3" class="w-full border p-2 rounded">{{ $jurnal->deskripsi }}</textarea>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Konten</label>
            <textarea name="konten" rows="6" class="w-full border p-2 rounded">{{ $jurnal->konten }}</textarea>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Gambar Utama</label>
            <input type="file" name="gambar" class="block">
            @if ($jurnal->gambar)
                <img src="{{ asset('storage/' . $jurnal->gambar) }}" class="mt-2 w-64 rounded shadow">
            @endif
        </div>

        <div class="mb-4">
            <label class="font-semibold">Gambar Tambahan Baru</label>
            <input type="file" name="gambar_lain[]" multiple class="block">
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('admin.jurnal.index') }}" class="ml-4 text-gray-600 hover:underline">Kembali</a>
    </form>
</div>

</body>
</html>
