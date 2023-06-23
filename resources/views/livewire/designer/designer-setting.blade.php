<div>
    <div class="container">
        <h5>Profile</h5>
        <form wire:submit.prevent="updateProfile">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" wire:model="first_name" value="{{ $first_name }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" wire:model="last_name" value="{{ $last_name }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" wire:model="address" value="{{ $address }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">No HP</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" wire:model="no_hp" value="{{ $no_hp }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" wire:model="email" value="{{ $email }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">New Password</label>
                <input type="text" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Confirm new Password</label>
                <input type="text" class="form-control" id="exampleFormControlInput1">
            </div>
        </div>
        <hr>

        <div class="row mt-5">
            <div class="d-flex justify-content-between">
                <h5>Rekening Bank</h5>
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Tambah Rekening</button>
            </div>
        </div>

        @forelse ($rekenings as $rekening)
            <div class="row mt-5 mb-5">
                <div class="col-lg-2">
                    <img src="{{ asset('bank/' .  $rekening->image)  }}" alt="" width="150">
                </div>
                <div class="col-lg-8">
                    <p>{{ $rekening->name_bank }}</p>
                    <p>{{ $rekening->no_rekening }}</p>
                    <P>{{ $rekening->user->first_name }}</P>
                </div>
            </div>
        @empty
            <div class="alert alert-dark mt-4 text-center" role="alert">
                Belum ada rekening
            </div>
        @endforelse


        <button class="btn btn-dark" type="submit">Save All Changes</button>
    </div>
</form>





  <!-- Modal rekening -->
  <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form wire:submit.prevent="storeRekening">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Bank</label>
                    <select class="form-select" aria-label="Default select example" wire:model="name_bank" required>
                        <option selected>------Pilih bank------</option>
                        @foreach ($banks as $bank)
                            <option value="{{ $bank->name }}">{{ $bank->name }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">No Rekening</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" wire:model="no_rekening" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Save changes</button>
                  </div>
            </form>
        </div>

      </div>
    </div>
  </div>
</div>
