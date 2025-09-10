<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Visi & Misi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow">
    <h1 class="text-2xl font-bold text-green-700 mb-6">Edit Visi & Misi</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.visi-misi.update') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold">Visi</label>
            <textarea name="visi" rows="3" class="w-full border p-2 rounded">{{ $data->visi ?? '' }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Misi</label>
            <textarea name="misi" rows="6" class="w-full border p-2 rounded" placeholder="Pisahkan setiap misi dengan baris baru">{{ $data->misi ?? '' }}</textarea>
            <small class="text-gray-500">Contoh:
Misi pertama
Misi kedua
Misi ketiga</small>
        </div>

        <button class="bg-green-700 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>

</body>
</html>
