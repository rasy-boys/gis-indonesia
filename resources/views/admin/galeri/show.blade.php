@extends('layouts.admin')

@section('content')
<section class="content-header mb-3 d-flex justify-content-between align-items-center">
    <h1 class="mb-0">
        {{ $album->nama }} 
        <small class="text-muted">({{ $album->tahun }})</small>
    </h1>
    <a href="{{ route('admin.galeri.create', ['album_id' => $album->id]) }}" class="btn btn-success shadow-sm">
        <i class="fas fa-plus"></i> Tambah Galeri
    </a>
</section>

<section class="content">
    
    @if($galeris->isEmpty())
        <div class="alert alert-info text-center p-4 rounded shadow-sm">
            <i class="fas fa-image fa-2x mb-2"></i>
            <p class="mb-0">Belum ada galeri di album ini. Yuk tambahkan foto atau video!</p>
        </div>
    @else
        <div class="row g-3">
            @foreach($galeris as $item)
                <div class="col-6 col-md-3">
                    <div class="card h-100 shadow-sm border-0 hover-shadow">
                        @if($item->kategori_id == 1)
                            <img src="{{ asset('storage/' . $item->foto) }}" 
                                 class="card-img-top rounded-top" 
                                 style="height:150px; object-fit:cover;">
                        @elseif($item->kategori_id == 2)
                            @php
                                $videoUrl = $item->video_link;
                                preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/', $videoUrl, $matches);
                                $youtubeId = $matches[1] ?? null;
                            @endphp
                            @if($youtubeId)
                                <iframe width="100%" height="150" 
                                        src="https://www.youtube.com/embed/{{ $youtubeId }}" 
                                        frameborder="0" allowfullscreen 
                                        class="rounded-top"></iframe>
                            @else
                                <a href="{{ $videoUrl }}" target="_blank" class="d-block text-center p-4">
                                    <i class="fas fa-video fa-2x text-secondary"></i>
                                    <p class="small mb-0">{{ $videoUrl }}</p>
                                </a>
                            @endif
                        @endif

                        <div class="card-body p-3">
                            <small class="text-muted d-block mb-1">
                                <i class="far fa-calendar-alt"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                            </small>
                            <p class="mb-2">{{ $item->deskripsi }}</p>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.galeri.edit', $item->id) }}" 
                                   class="btn btn-sm btn-warning text-white">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form id="deleteForm{{ $item->id }}" action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $item->id }})">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
       {{-- Pagination --}}
<div class="mt-4">
    {{ $galeris->links('pagination.custom-bootstrap-5') }}
</div>
    @endif

</section>

@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Hapus Item?',
        text: "Apakah kamu yakin ingin menghapus item ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deleteForm'+id).submit();
        }
    });
}
</script>
@endpush