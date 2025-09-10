<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jurnal | GIS Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <x-navuser></x-navuser>

    <main class="max-w-7xl mx-auto py-10 px-4">
        <h2 class="text-3xl font-bold text-green-700 mb-10 text-center">DAFTAR JURNAL</h2>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- KONTEN UTAMA JURNAL -->
            <div class="lg:col-span-2 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($jurnals as $jurnal)
                        <a href="{{ route('publikasi.detail-jurnal', $jurnal->slug) }}">
                            <div class="bg-white p-6 rounded-xl border shadow hover:shadow-lg transition hover:bg-green-50 flex flex-col justify-between h-full">
                                <img src="{{ asset('storage/' . $jurnal->gambar) }}" alt="{{ $jurnal->judul }}" class="w-full h-48 object-cover rounded mb-4">
                                
                                <h3 class="text-xl font-bold text-green-700 mb-2">{{ $jurnal->judul }}</h3>
                                <p class="text-sm text-gray-500 mb-1">
                                    <i class="far fa-calendar-alt mr-1"></i> {{ \Carbon\Carbon::parse($jurnal->tanggal)->translatedFormat('d F Y') }}
                                </p>
                                <p class="text-gray-700 text-sm mb-3">{{ Str::limit($jurnal->deskripsi, 100) }}</p>
                                <span class="text-green-700 hover:underline text-sm font-medium mt-auto">Baca selengkapnya</span>
                            </div>
                        </a>
                    @endforeach
                </div>


<!-- PAGINATION -->
                <div class="mt-8">
                    {{ $jurnals->links('vendor.pagination.tailwind-green') }}
                </div>
            </div>

            <!-- SIDEBAR: Recent Post -->
              <!-- SIDEBAR -->
              <aside class="space-y-8">
                <div>
                    <h3 class="text-xl font-bold text-green-700 mb-4 border-b pb-2">Jurnal Terbaru</h3>
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

                <div>
                    <h3 class="text-xl font-bold text-green-700 mb-4 border-b pb-2">Tahun Terbit</h3>
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
            
        </div>
    </main>

    <footer class="bg-gray-200 text-center py-4 mt-12 text-sm text-gray-600">
        &copy; {{ date('Y') }} GIS Indonesia. All rights reserved.
    </footer>

</body>
</html>

