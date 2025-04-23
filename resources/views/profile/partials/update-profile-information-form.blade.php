@php
    use Illuminate\Support\Facades\Storage;
@endphp

<section>
    <h5 class="card-header p-0 mb-3">Profile Information</h5>
    <p class="mb-4 text-muted">Update your account's profile information and email address.</p>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="row" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="d-flex align-items-start align-items-sm-center gap-4 mb-4">
            <img src="{{ $user->avatar ? Storage::url($user->avatar) : asset('sneat/assets/img/avatars/1.png') }}"
                alt="{{ $user->name }}'s avatar"
                class="w-px-100 h-auto"
                id="uploadedAvatar" />
            <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Upload new photo</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input
                        type="file"
                        id="upload"
                        name="avatar"
                        class="account-file-input"
                        hidden
                        accept="image/png, image/jpeg"
                        onchange="document.getElementById('uploadedAvatar').src = window.URL.createObjectURL(this.files[0])"
                    />
                </label>
                @if($user->avatar)
                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" onclick="document.getElementById('remove_avatar').value='1'; document.getElementById('uploadedAvatar').src='{{ asset('sneat/assets/img/avatars/1.png') }}'">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                    </button>
                @endif
                <input type="hidden" name="remove_avatar" id="remove_avatar" value="0">
                <p class="text-muted mb-0">Allowed JPG or PNG. Max size of 800K</p>
            </div>
        </div>

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
