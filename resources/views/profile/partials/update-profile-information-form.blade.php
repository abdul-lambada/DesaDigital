<section>
    <h5 class="card-header p-0 mb-3">Profile Information</h5>
    <p class="mb-4 text-muted">Update your account's profile information and email address.</p>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="row">
        @csrf
        @method('patch')

        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Name</label>
            <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 col-md-6">
            <label for="email" class="form-label">Email</label>
            <input class="form-control" type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @error('email')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="alert alert-warning mt-2" role="alert">
                    <div class="d-flex">
                        <i class="bx bx-error me-2"></i>
                        <div>
                            Your email address is unverified.
                            <button form="send-verification" class="btn btn-link p-0 m-0 align-baseline">
                                Click here to re-send the verification email.
                            </button>
                        </div>
                    </div>
                </div>

                @if (session('status') === 'verification-link-sent')
                    <div class="alert alert-success mt-2" role="alert">
                        <div class="d-flex">
                            <i class="bx bx-check me-2"></i>
                            <div>A new verification link has been sent to your email address.</div>
                        </div>
                    </div>
                @endif
            @endif
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>

            @if (session('status') === 'profile-updated')
                <div class="text-success mt-2" role="alert"
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)">
                    <i class="bx bx-check me-1"></i> Saved successfully
                </div>
            @endif
        </div>
    </form>
</section>
