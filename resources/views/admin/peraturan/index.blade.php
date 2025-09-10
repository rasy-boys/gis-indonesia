<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Peraturan</title>
    <script src="https://cdn.tailwindcss.com"></script>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">

    <x-navadmin></x-navadmin>
    <main class="p-6">
<div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-green-700 mb-6">Daftar Peraturan</h1>
    </div>
        <a href="{{ route('admin.peraturan.create') }}" class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Peraturan</a>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Judul</th>
                    <th class="border p-2">Deskripsi</th>
                    <th class="border p-2">File</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peraturans as $item)
                    <tr>
                        <td class="border p-2">{{ $item->judul }}</td>
                        <td class="border p-2">{{ $item->deskripsi }}</td>
                        <td class="border p-2">
                            <a href="{{ asset('storage/' . $item->file) }}" target="_blank" class="text-blue-500 hover:underline">Unduh PDF</a>
                        </td>
                        <td class="border p-2 space-x-2">
                            <a href="{{ route('admin.peraturan.edit', $item->id) }}" class="text-green-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.peraturan.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if($peraturans->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center p-4 text-gray-500">Belum ada peraturan ditambahkan.</td>
                    </tr>
                @endif
            </tbody>
        </table>

    </main>
    </div>
</body>
</html>
