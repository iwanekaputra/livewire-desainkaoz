<div class="container">
    <div class="row justify-content-center mt-5">
        <h3 class="text-center">Register</h3>
        <div class="col-md-6 card px-3 py-3 shadow">
            <form action="" method="POST" wire:submit.prevent="register">
                <div class="form-group mb-3">
                    <label>First Name</label>
                    <input type="text" wire:model="first_name"
                        class="form-control @error('first_name') is-invalid @enderror" required>
                    @error('first_name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Last Name</label>
                    <input type="text" wire:model="last_name"
                        class="form-control @error('last_name') is-invalid @enderror" required>
                    @error('last_name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror"
                        required>
                    @error('email')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" wire:model="password"
                        class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Konfirmasi Password</label>
                    <input type="password" wire:model="password_confirmation"
                        class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3 d-flex justify-content-around fs-5">
                    <img src="{{ asset('assets/img/icon-user.svg') }}" alt="" srcset=""
                        style="width:7%;filter:invert(100%);">
                    <img src="{{ asset('assets/img/icon-profile.svg') }}" alt="" srcset=""
                        style="width:8%;">
                </div>
                <div class="mb-3 d-flex justify-content-around">
                    <div class="form-check">

                        <input class="form-check-input" wire:model="role_id" type="radio" name="role" checked
                            value="3" required>
                        <label class="form-check-label" for="role">
                            User
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" wire:model="role_id" type="radio" name="role"value="2"
                            required>
                        <label class="form-check-label" for="role">
                            Designer
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark w-100 mb-2">Register</button>
            </form>
        </div>
    </div>
</div>
