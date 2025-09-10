{{-- resources/views/admin/galeri/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<section class="content-header mb-3 d-flex justify-content-between align-items-center">
    <h1 class="mb-0">Galeri Per Album</h1>
    <div class="d-flex">
        <a href="{{ route('admin.albums.index') }}" class="btn btn-primary btn-sm shadow-sm me-2">
            <i class="fas fa-folder-open"></i> Kelola Album
        </a>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-success btn-sm shadow-sm">
            <i class="fas fa-plus"></i> Tambah Galeri
        </a>
    </div>
</section>

<style>
    .content-header .btn {
    margin-left: 8px; /* jarak antar tombol */
}

.content-header .btn:first-child {
    margin-left: 0; /* tombol pertama tetap mepet kiri */
}

</style>


<!-- Album grid 4 kolom -->

<div class="row g-4 mb-4">
    @foreach($albums as $album)
        @php
            // Ambil cover foto
            $cover = $album->galeris->firstWhere('kategori_id', 1);
            $coverUrl = $cover ? asset('storage/' . $cover->foto) : null;

            // Kalau nggak ada foto, coba ambil video
            if (!$cover) {
                $video = $album->galeris->firstWhere('kategori_id', 2);
                if ($video && $video->video_link) {
                    preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/', $video->video_link, $matches);
                    $youtubeId = $matches[1] ?? null;
                    if ($youtubeId) {
                        $coverUrl = "https://img.youtube.com/vi/{$youtubeId}/hqdefault.jpg";
                    }
                }
            }
        @endphp

        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="{{ route('admin.galeri.album.show', $album->id) }}" 
               class="card h-100 text-decoration-none text-dark border rounded shadow-sm"
               style="transition: transform 0.3s ease, box-shadow 0.3s ease;">

                <!-- Cover dengan rasio sama -->
            <!-- Cover dengan rasio sama -->
            <div class="ratio ratio-16x9 bg-light d-flex align-items-center justify-content-center">
                @if($album->nama === 'Tanpa Album')
                    <img src="{{ asset('images/image.png') }}" 
                         alt="Tanpa Album" 
                         class="img-fluid rounded"
                         style="object-fit: contain; max-width: 90%; max-height: 90%;">
                @elseif($coverUrl)
                    <img src="{{ $coverUrl }}" 
                         alt="Cover" 
                         class="img-fluid rounded"
                         style="object-fit: contain; max-width: 90%; max-height: 90%;">
                @else
                    <img src="{{ asset('images/placeholder.png') }}" 
                         alt="No image" 
                         class="img-fluid rounded"
                         style="object-fit: contain; max-width: 70%; max-height: 70%; opacity: 0.7;">
                @endif
            </div>
            
            

                

                <div class="card-body text-center d-flex flex-column align-items-center">
                    <!-- Label Tahun -->
                    <small class="text-muted mb-1">{{ $album->tahun }}</small>

                    <!-- Judul album -->
                    <h6 class="card-title mb-2 fw-bold">{{ $album->nama }}</h6>

                    <!-- Badge jumlah -->
                    <div class="d-flex gap-1">
                        <span class="badge bg-primary">
                            <i class="fas fa-image"></i> {{ $album->galeris->where('kategori_id', 1)->count() }}
                        </span>
                        <span class="badge bg-danger">
                            <i class="fas fa-video"></i> {{ $album->galeris->where('kategori_id', 2)->count() }}
                        </span>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>

<!-- Hover effect -->
<style>
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.15) !important;
}
</style>

@endsection
