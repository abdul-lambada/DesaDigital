<section>
    <h5 class="card-header p-0 mb-3">Update Password</h5>
    <p class="mb-4 text-muted">Ensure your account is using a long, random password to stay secure.</p>

    <form method="post" action="{{ route('password.update') }}" class="row">
        @csrf
        @method('put')

        <div class="mb-3 col-md-6">
            <label for="current_password" class="form-label">Current Password</label>
            <input class="form-control @error('current_password') is-invalid @enderror" 
                   type="password" 
                   id="current_password" 
                   name="current_password" 
                   autocomplete="current-password" />
            @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 col-md-6">
            <label for="password" class="form-label">New Password</label>
            <input class="form-control @error('password') is-invalid @enderror" 
                   type="password" 
                   id="password" 
                   name="password" 
                   autocomplete="new-password" />
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 col-md-6">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input class="form-control @error('password_confirmation') is-invalid @enderror" 
                   type="password" 
                   id="password_confirmation" 
                   name="password_confirmation" 
                   autocomplete="new-password" />
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>

            @if (session('status') === 'password-updated')
                <div class="text-success mt-2" role="alert"
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)">
                    <i class="bx bx-check me-1"></i> Password updated successfully
                </div>
            @endif
        </div>
    </form>
</section>
