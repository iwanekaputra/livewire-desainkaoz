<div>
    <h3 class="mt-3">Tambah Sub Kategori</h3>
    <hr>
    <div class="row">
        <form action="" wire:submit.prevent="store">
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Sub Kategori</label>
                    <input type="text" class="form-control" id="name" wire:model="name">
                </div>
                <button class="btn btn-dark w-100" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
