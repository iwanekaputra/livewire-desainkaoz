<div>
    <h1>Tambah Variasi Warna</h1>
    <hr>
    <div class="row">
        <div class="col-lg-4">
            <form action="" method="POST" wire:submit.prevent="store">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" wire:model="name" required>
                </div>
                <p class="text-danger">*Mohon menggunakan bahasa inggris</p>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Simpan</button>
                  </div>
            </form>
        </div>
    </div>

</div>
