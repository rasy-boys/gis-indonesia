<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Peraturan | GIS Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Navbar -->
    <x-navuser></x-navuser>

    <!-- Header -->
    <header class="bg-green-700 text-white py-6 shadow">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-2xl md:text-3xl font-bold"><i class="fas fa-book mr-2"></i>Publikasi - Peraturan</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto py-12 px-6">
        <h2 class="text-3xl font-bold text-green-700 mb-10 text-center">Daftar Peraturan Terkait</h2>

        <div class="space-y-10">
            <!-- Kategori Peraturan -->
            <section>
                <h3 class="text-2xl font-semibold text-green-800 mb-6 border-b pb-2">
                    <i class="fas fa-gavel mr-2 text-green-600"></i>Peraturan Perundang-undangan
                </h3>

                <!-- Daftar Peraturan -->
                @forelse ($peraturans as $peraturan)
                    <div class="bg-white p-6 rounded-xl border shadow hover:shadow-lg transition duration-300 space-y-3">
                        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                            <!-- Judul -->
                            <div class="flex-1">
                                <h4 class="text-xl font-bold text-green-800">{{ $peraturan->judul }}</h4>
                            </div>
                        
                            <!-- Tombol Download -->
                            <div class="mt-7 md:mt-6 self-start md:self-center">
                                <a href="{{ asset('storage/' . $peraturan->file) }}" download
                                   class="inline-flex items-center text-sm text-green-700 hover:underline">
                                    <i class="fas fa-download mr-2"></i>Download Dokumen
                                </a>
                            </div>
                        </div>
                        
                        
                        <p class="text-gray-600 leading-relaxed">{{ $peraturan->deskripsi }}</p>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada peraturan yang tersedia.</p>
                @endforelse
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 text-center py-4 mt-16 text-sm text-gray-600">
        &copy; {{ date('Y') }} GIS Indonesia. All rights reserved.
    </footer>

</body>
</html>
