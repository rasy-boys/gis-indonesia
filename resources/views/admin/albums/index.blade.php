{{-- resources/views/admin/albums/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Daftar Album')

@section('content')
<section class="content-header mb-3 d-flex justify-content-between align-items-center">
    <h1 class="m-0">Daftar Album</h1>
    <a href="{{ route('admin.albums.create') }}" class="btn btn-success btn-sm shadow-sm">
        <i class="fas fa-plus"></i> Tambah Album
    </a>
</section>

<section class="content">
    @if($albums->isEmpty())
        <div class="alert alert-secondary text-center p-4 rounded shadow-sm">
            <i class="fas fa-folder-open fa-2x mb-2"></i>
            <p class="mb-0">Belum ada album. Yuk buat album baru!</p>
        </div>
    @else
        <div class="row g-4 mb-4">
            @foreach($albums as $album)
            @php
            $coverUrl = null;
        
            // Kalau bukan "Tanpa Album", ambil cover dari foto/video
            if ($album->nama !== 'Tanpa Album') {
                $cover = $album->galeris->firstWhere('kategori_id', 1);
                $coverUrl = $cover ? asset('storage/' . $cover->foto) : null;
        
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
            }
        @endphp

<div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <a href="{{ route('admin.galeri.album.show', $album->id) }}" class="text-decoration-none text-dark">
        <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
            <!-- Cover -->
            <div class="ratio ratio-16x9 bg-light d-flex align-items-center justify-content-center album-cover">
                @if($album->nama === 'Tanpa Album')
                    <img src="{{ asset('images/image.png') }}" 
                         alt="Tanpa Album" 
                         class="img-fluid p-1"
                         style="object-fit: cover; width:100%; height:100%;">
                @elseif($coverUrl)
                    <img src="{{ $coverUrl }}" 
                         class="img-fluid p-1" 
                         style="object-fit: cover; width:100%; height:100%;">
                @else
                    <img src="{{ asset('images/placeholder.png') }}" 
                         alt="No image" 
                         class="img-fluid"
                         style="object-fit: cover; width:100%; height:100%; opacity:0.8;">
                @endif
            </div>

            <div class="card-body album-card text-center">

                {{-- Tahun --}}
                @if($album->nama !== 'Tanpa Album')
                    <small class="album-year">{{ $album->tahun }}</small>
                @endif
            
                {{-- Judul Album --}}
                <h6 class="album-title">
                    {{ $album->nama }}
                </h6>
            
                {{-- Badge Foto & Video --}}
                <div class="album-badges">
                    <span class="badge bg-primary">
                        <i class="fas fa-image"></i> {{ $album->galeris->where('kategori_id', 1)->count() }}
                    </span>
                    <span class="badge bg-danger">
                        <i class="fas fa-video"></i> {{ $album->galeris->where('kategori_id', 2)->count() }}
                    </span>
                </div>
            
                {{-- Tombol Edit & Hapus --}}
                @if($album->nama !== 'Tanpa Album')
                    <div class="album-actions">
                        <a href="{{ route('admin.albums.edit', $album->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.albums.destroy', $album->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin hapus album ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                @endif
            
            </div>
                        
        </div>
    </a>
</div>


            @endforeach
        </div>
    @endif
</section>


<style>
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.15) !important;
}

.album-actions {
    gap: 8px !important;  /* atur jarak antar tombol, bisa 10px/12px sesuai selera */
}

.album-actions .btn {
    min-width: 36px;      /* biar tombol nggak terlalu kecil */
    text-align: center;
}

.album-card .album-year {
    display: block;
    font-size: 0.85rem;
    color: #6c757d; /* abu2 */
    margin-bottom: 4px;
}

.album-card .album-title {
    font-weight: 700;
    margin-bottom: 8px;
}

.album-card .album-badges {
    display: flex;
    justify-content: center;
    gap: 6px;
    margin-bottom: 12px;
}

.album-card .album-actions {
    display: flex;
    justify-content: center;
    gap: 10px;
}


</style>



@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDeleteAlbum(id) {
    Swal.fire({
        title: 'Yakin hapus album ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d'
    }).then((result) => {
        if(result.isConfirmed){
            document.getElementById('deleteAlbumForm'+id).submit();
        }
    });
}
</script>
@endpush
@endsection
