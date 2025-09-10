{{-- resources/views/profile/partials/update-password-form.blade.php --}}

<div>
    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        {{-- Current Password --}}
        <div class="form-group mb-3">
            <label for="update_password_current_password" class="form-label font-weight-bold">
                Current Password
            </label>
            <input 
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                autocomplete="current-password"
            >
            @error('current_password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- New Password --}}
        <div class="form-group mb-3">
            <label for="update_password_password" class="form-label font-weight-bold">
                New Password
            </label>
            <input 
                id="update_password_password"
                name="password"
                type="password"
                class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                autocomplete="new-password"
            >
            @error('password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div class="form-group mb-4">
            <label for="update_password_password_confirmation" class="form-label font-weight-bold">
                Confirm Password
            </label>
            <input 
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                autocomplete="new-password"
            >
            @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Save Button --}}
        <div class="d-flex align-items-center">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Save
            </button>

            @if (session('status') === 'password-updated')
                <span class="text-success small ms-3">
                    <i class="fas fa-check-circle"></i> Password updated successfully.
                </span>
            @endif
        </div>
    </form>
</div>
