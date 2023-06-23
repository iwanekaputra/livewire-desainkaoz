<div>
    <h1>Tambah Slider</h1>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <form method="POST" enctype="multipart/form-data" wire:submit.prevent="store">
                @if($image)
                    <img src="{{ $image->temporaryUrl() }}" alt="" width="500">
                @endif
                <div class="mb-3">
                    <label for="formFile" class="form-label">Gambar slider</label>
                    <input class="form-control" type="file" id="formFile" wire:model="image">
                </div>
                <button type="submit" class="btn btn-dark">Simpan</button>
            </form>
        </div>
    </div>
</div>
