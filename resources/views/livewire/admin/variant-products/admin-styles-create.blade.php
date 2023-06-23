<div>
    <h1>Tambah Style</h1>
    <hr>
    <div class="row">
        <div class="col-lg-4">
            <form action="" method="POST" wire:submit.prevent="store">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Style</label>
                    <input type="text" class="form-control" id="name" wire:model="name" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Simpan</button>
                  </div>
            </form>
        </div>
    </div>

</div>
