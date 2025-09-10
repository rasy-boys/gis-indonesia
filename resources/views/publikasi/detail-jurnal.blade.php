<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $jurnal->judul }} | GIS Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800">

    <x-navuser></x-navuser>
    
    <!-- Header -->
    <header class="bg-green-700 text-white py-6 shadow">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-2xl font-bold">Detail junal</h1>
        </div>
    </header>

    <!-- Main -->
    <main class="max-w-7xl mx-auto py-10 px-4 grid grid-cols-1 lg:grid-cols-3 gap-10">
        
        <!-- KONTEN BERITA -->
        <div class="lg:col-span-2">

               <!-- Judul -->
               <h2 class="text-3xl font-bold text-green-800 mb-6">{{ $jurnal->judul }}</h2>

               <p class="text-sm text-gray-500 mb-2 flex items-center gap-1">
                <i class="far fa-calendar-alt text-green-700"></i> 
                {{ \Carbon\Carbon::parse($jurnal->tanggal)->translatedFormat('d F Y') }}
            </p>

            <!-- Gambar Utama -->
            <img src="{{ asset('storage/' . $jurnal->gambar) }}" alt="{{ $jurnal->judul }}"
                 class="rounded-xl shadow-lg mb-6 w-full object-cover max-h-[450px]">

            <!-- Tanggal -->
          
         

            <!-- Konten Berita -->
            <div class="text-lg leading-relaxed text-gray-700 space-y-4">
                @foreach (explode("\n", $jurnal->konten) as $paragraf)
                    <p>{{ $paragraf }}</p>
                @endforeach
            </div>

            <!-- Dokumentasi Gambar Tambahan -->
            @if ($jurnal->images->count())
                <div class="mt-12 space-y-6">
                    <h3 class="text-xl font-semibold text-green-700 mb-4">Dokumentasi Terkait</h3>
                    @foreach ($jurnal->images as $img)
                        <div>
                            <img src="{{ asset('storage/' . $img->gambar) }}"
                                 alt="Foto Tambahan"
                                 class="w-full h-96 object-cover rounded-xl shadow">
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Tombol Kembali -->
            <a href="{{ route('publikasi.jurnal') }}" class="inline-block mt-12 text-green-700 hover:underline text-sm">
                &larr; Kembali ke daftar berita
            </a>
        </div>

        <!-- SIDEBAR -->
        <aside class="space-y-8">
            <!-- RECENT POSTS -->
            <div>
                <h3 class="text-xl font-bold text-green-700 mb-4 border-b pb-2">Postingan Terbaru</h3>
                @foreach ($recentPosts as $recent)
                    <a href="{{ route('publikasi.detail-jurnal', $recent->slug) }}"
                       class="flex items-start gap-4 bg-white p-3 rounded-xl shadow hover:shadow-md transition hover:bg-green-50">
                        <img src="{{ asset('storage/' . $recent->gambar) }}"
                             alt="{{ $recent->judul }}"
                             class="w-16 h-16 object-cover rounded-md shadow-sm">
                        <div>
                            <p class="text-sm font-semibold text-green-800 leading-snug">{{ Str::limit($recent->judul, 50) }}</p>
                            <p class="text-xs text-gray-500 mt-1">
                                <i class="far fa-calendar-alt mr-1"></i>{{ \Carbon\Carbon::parse($recent->tanggal)->translatedFormat('d M Y') }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        
            <!-- KATEGORI -->
            <div>
                <h3 class="text-xl font-bold text-green-700 mb-4 border-b pb-2">Kategori</h3>
                <ul class="text-sm space-y-2">
                    <li>
                        <a href="{{ route('aktivitas.index') }}" class="text-gray-700 hover:text-green-700 hover:underline">
                            Kegiatan / Aktivitas
                        </a>
                    </li>
                </ul>
            </div>
        
            <!-- ARCHIVES -->
            <div>
                <h3 class="text-xl font-bold text-green-700 mb-4 border-b pb-2">Arsip</h3>
                <ul class="text-sm space-y-2">
                    @foreach ($archiveYears as $year)
                        <li>
                            <a href="{{ route('publikasi.jurnal.archive', ['year' => $year]) }}"
                               class="text-gray-700 hover:text-green-700 hover:underline">
                                {{ $year }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>

    </main>

   




</main>

<!-- Footer -->
<footer class="bg-gray-200 text-center py-4 mt-12 text-sm text-gray-600">
&copy; {{ date('Y') }} GIS Indonesia. All rights reserved.
</footer>

</body>
</html>
