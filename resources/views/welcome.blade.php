<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda - GIS Indonesia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    <header class="bg-blue-700 text-white p-4 shadow">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">GIS Indonesia</h1>
            <nav>
                <a href="/" class="ml-4 hover:underline">Beranda</a>
                <a href="/tentang" class="ml-4 hover:underline">Tentang</a>
                <a href="/layanan" class="ml-4 hover:underline">Layanan</a>
                <a href="/proyek" class="ml-4 hover:underline">Proyek</a>
                <a href="/kontak" class="ml-4 hover:underline">Kontak</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-5xl mx-auto py-10 px-4">
        <h2 class="text-3xl font-bold text-blue-800 mb-4"></h2>
        <p class="text-gray-700 text-lg leading-relaxed"></p>

        {{-- @if ($home->image)
            <div class="mt-6">
                <img src="{{ asset('storage/' . $home->image) }}" alt="Banner" class="rounded-xl shadow-lg w-full">
            </div>
        @endif --}}
    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 text-center py-4 mt-12 text-sm text-gray-600">
        &copy; {{ date('Y') }} GIS Indonesia. All rights reserved.
    </footer>

</body>
</html>
