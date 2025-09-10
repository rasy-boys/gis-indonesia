@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold text-success mb-3">
            <i class="fas fa-layer-group"></i> Kelola Ruang Lingkup
        </h1>
        

        {{-- Alert Sukses --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        {{-- Form Tambah --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-plus-circle"></i> Tambah Ruang Lingkup
            </div>
            <div class="card-body">
                <form id="formAddLingkup" action="{{ route('admin.ruang-lingkup.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row align-items-center">
                        <div class="col-md-3 mb-2">
                            <input type="file" name="icon" class="form-control" required>
                        </div>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="title" placeholder="Judul" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-2">
                            <input type="text" name="description" placeholder="Deskripsi" class="form-control" required>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button type="button" id="btnAddLingkup" class="btn btn-success w-100">
                                <i class="fas fa-plus"></i> Tambah
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- List Data --}}
        <div class="row">
            @forelse ($lingkups as $item)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 hover-card">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center mb-3">
                                <img src="{{ asset('storage/' . $item->icon) }}" alt="{{ $item->title }}" 
                                     class="rounded mr-3 border" style="width:50px; height:50px; object-fit:contain;">
                                <div>
                                    <h5 class="card-title mb-1">{{ $item->title }}</h5>
                                    <p class="card-text text-muted mb-0">{{ $item->description }}</p>
                                </div>
                            </div>
                            <div class="mt-auto d-flex justify-content-between">
                                <a href="{{ route('admin.ruang-lingkup.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.ruang-lingkup.destroy', $item->id) }}" 
                                    method="POST" class="d-inline form-delete">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> Belum ada data ruang lingkup.
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Sedikit CSS tambahan --}}
    <style>
        .hover-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
    </style>
@endsection
