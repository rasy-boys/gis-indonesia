{{-- resources/views/profile/partials/update-profile-information-form.blade.php --}}

<div>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        {{-- Input Name --}}
        <div class="form-group mb-3">
            <label for="name" class="form-label font-weight-bold">Name</label>
            <input 
                id="name" 
                name="name" 
                type="text" 
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}" 
                required 
                autofocus 
                autocomplete="name"
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Input Email --}}
        <div class="form-group mb-3">
            <label for="email" class="form-label font-weight-bold">Email</label>
            <input 
                id="email" 
                name="email" 
                type="email" 
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email) }}" 
                required 
                autocomplete="username"
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            {{-- Email verification --}}
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="alert alert-warning mt-2">
                    <p class="mb-1">Your email address is unverified.</p>
                    <button type="submit" form="send-verification" class="btn btn-link p-0">
                        Click here to re-send the verification email.
                    </button>
                </div>

                @if (session('status') === 'verification-link-sent')
                    <div class="alert alert-success mt-2">
                        A new verification link has been sent to your email address.
                    </div>
                @endif
            @endif
        </div>

        {{-- Save Button --}}
        <div class="d-flex align-items-center gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save
            </button>

            @if (session('status') === 'profile-updated')
                <span class="text-success small ms-2">
                    <i class="fas fa-check-circle"></i> Saved.
                </span>
            @endif
        </div>
    </form>
</div>
