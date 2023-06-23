<div>
    <h1>Tambah Variasi Warna</h1>
    <hr>
    <div class="row">
        <div class="col-lg-4">
            <form action="" method="POST" wire:submit.prevent="store">
                <div class="mb-3">
                    <label for="number" class="form-label">Number</label>
                    <input type="text" class="form-control" id="number" wire:model="number" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Simpan</button>
                  </div>
            </form>
        </div>
    </div>

</div>
