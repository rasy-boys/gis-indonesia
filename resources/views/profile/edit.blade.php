{{-- resources/views/profile/edit.blade.php --}}

@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    {{-- Judul Halaman --}}
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user-circle text-primary"></i> Profile
        </h1>
    </div>

    <div class="row">

        {{-- Update Profile Information --}}
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <i class="fas fa-id-card mr-2"></i>
                    <h6 class="m-0 font-weight-bold">Update Profile Information</h6>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        {{-- Update Password --}}
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-success text-white d-flex align-items-center">
                    <i class="fas fa-lock mr-2"></i>
                    <h6 class="m-0 font-weight-bold">Update Password</h6>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        {{-- Delete Account --}}
        <div class="col-lg-12 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-danger text-white d-flex align-items-center">
                    <i class="fas fa-user-times mr-2"></i>
                    <h6 class="m-0 font-weight-bold">Delete Account</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">
                        Menghapus akun akan menghapus seluruh data secara permanen. 
                        Tindakan ini tidak bisa dibatalkan.
                    </p>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
