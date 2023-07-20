<div class="container">
    <div class="row justify-content-center mt-5">
        <h2 class="text-center mb-4">Login</h2>
        <div class="col-md-6">
            <form action="" id="login" wire:submit.prevent="login">
                @error('email')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
                @error('password')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" wire:model="email">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Password" wire:model="password">
                    <label for="password">Password</label>
                </div>
                <button type="submit" class="btn btn-dark w-100 mt-3">Login</button>
            </form>
        </div>
    </div>
</div>


