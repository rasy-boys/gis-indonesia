{{-- resources/views/profile/partials/delete-user-form.blade.php --}}

<div>
    <p class="text-muted mb-3">
        Once your account is deleted, all of its resources and data will be <span class="text-danger">permanently deleted</span>. 
        Please download any data or information that you wish to retain before proceeding.
    </p>

    <!-- Delete Account Button -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteAccount">
        <i class="fas fa-user-times"></i> Delete Account
    </button>

    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteAccount" tabindex="-1" aria-labelledby="confirmDeleteAccountLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="confirmDeleteAccountLabel">
                        <i class="fas fa-exclamation-triangle"></i> Confirm Deletion
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-body">
                        <p>
                            Are you sure you want to delete your account? 
                            Once deleted, <strong>all of your data will be permanently removed</strong>.
                        </p>

                        <div class="form-group mt-3">
                            <label for="delete_password" class="form-label">Password</label>
                            <input 
                                id="delete_password" 
                                name="password" 
                                type="password" 
                                class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                                placeholder="Enter your password to confirm"
                                required
                            >
                            @error('password', 'userDeletion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-user-times"></i> Delete Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
