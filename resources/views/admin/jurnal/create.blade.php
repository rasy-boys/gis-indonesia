<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Jurnal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 bg-gray-100">

<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow">
    <h1 class="text-2xl font-bold text-green-700 mb-6">Tambah Jurnal</h1>

    <form action="{{ route('admin.jurnal.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="font-semibold">Judul</label>
            <input type="text" name="judul" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Tanggal</label>
            <input type="date" name="tanggal" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Deskripsi Singkat</label>
            <textarea name="deskripsi" rows="3" class="w-full border p-2 rounded" required></textarea>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Konten Lengkap</label>
            <textarea name="konten" rows="6" class="w-full border p-2 rounded" required></textarea>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Gambar Utama</label>
            <input type="file" name="gambar" class="block">
        </div>

        <div class="mb-4">
            <label class="font-semibold">Gambar Tambahan (bisa lebih dari satu)</label>
            <input type="file" name="gambar_lain[]" multiple class="block">
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>

</body>
</html>
