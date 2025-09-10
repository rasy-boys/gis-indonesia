@extends('layouts.admin')

@section('content')
<!-- Dashboard Selamat Datang -->
<div class="mb-4 text-center">
    <h2 class="fw-bold">Selamat Datang, {{ auth()->user()->name }}</h2>
    <p class="text-muted">Ini adalah ringkasan aktivitas dan data terbaru di sistem.</p>
</div>

<!-- Card Statistik -->
<div class="row justify-content-center">
    @php
        $cards = [
            ['title'=>'Berita', 'icon'=>'fa-newspaper', 'count'=>$totalBerita ?? 0, 'route'=>route('admin.berita.index'), 'color'=>'success', 'bg'=>'linear-gradient(135deg, #28a745, #218838)'],
            ['title'=>'Galeri', 'icon'=>'fa-image', 'count'=>$totalGaleri ?? 0, 'route'=>route('admin.galeri.index'), 'color'=>'primary', 'bg'=>'linear-gradient(135deg, #007bff, #0056b3)'],
            ['title'=>'Teams', 'icon'=>'fa-users', 'count'=>$totalTeams ?? 0, 'route'=>route('admin.teams.index'), 'color'=>'warning', 'bg'=>'linear-gradient(135deg, #ffc107, #e0a800)'],
            ['title'=>'Pamflets', 'icon'=>'fa-chalkboard-teacher', 'count'=>$totalPamflets ?? 0, 'route'=>route('admin.pamflets.index'), 'color'=>'info', 'bg'=>'linear-gradient(135deg, #17a2b8, #117a8b)'],
        ];
    @endphp

    @foreach($cards as $card)
    <div class="col-lg-3 col-md-6 mb-4 d-flex justify-content-center">
        <div class="card text-white shadow card-hover w-100" style="background: {{ $card['bg'] }}; border-radius: 15px; transition: all 0.3s;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center text-center p-4">
                <div class="icon-circle mb-3">
                    <i class="fas {{ $card['icon'] }} fa-3x"></i>
                </div>
                <h5 class="card-title fw-bold mb-2">{{ $card['title'] }}</h5>
                <p class="mb-3 fs-5">{{ $card['count'] }} {{ $card['title'] == 'Teams' ? 'anggota' : 'items' }}</p>
                <a href="{{ $card['route'] }}" class="btn btn-light btn-sm shadow-sm">Kelola</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<style>
.card-hover:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 15px 35px rgba(0,0,0,0.25);
}
.icon-circle {
    width: 70px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    transition: background 0.3s, transform 0.3s;
}
.icon-circle:hover {
    background: rgba(255,255,255,0.4);
    transform: scale(1.2);
}
</style>
@endsection
