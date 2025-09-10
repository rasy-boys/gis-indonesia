<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Jurnal</title>
    <script src="https://cdn.tailwindcss.com"></script>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">

    <x-navadmin></x-navadmin>
    <main class="p-6">
        <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-green-700 mb-6">Daftar Jurnal</h1>
            </div>

    <a href="{{ route('admin.jurnal.create') }}" class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Jurnal</a>

    @foreach ($jurnals as $jurnal)
        <div class="bg-white p-4 mb-4 rounded-xl shadow">
            <h3 class="text-xl font-semibold">{{ $jurnal->judul }}</h3>
            <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($jurnal->tanggal)->translatedFormat('d F Y') }}</p>
            <p class="text-gray-700 mt-2">{{ $jurnal->deskripsi }}</p>
            <div class="mt-4 flex gap-3">
                <a href="{{ route('admin.jurnal.edit', $jurnal->id) }}" class="text-blue-500 hover:underline">Edit</a>
                <form action="{{ route('admin.jurnal.destroy', $jurnal->id) }}" method="POST" onsubmit="return confirm('Yakin hapus jurnal ini?')">
                    @csrf @method('DELETE')
                    <button class="text-red-500 hover:underline">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach
    </main>
</body>
</html>
