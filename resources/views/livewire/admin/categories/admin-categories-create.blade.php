<div>
    <h3 class="mt-3">Tambah Kategori</h3>
    <hr>
    <div class="row">
        <form action="" wire:submit.prevent="store">
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="name" wire:model="name">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Icon</label>
                    @if ($icon)
                        <div class="mb-2">
                            <img src="{{ $icon->temporaryUrl() }}" alt="" width="150">
                        </div>
                    @endif
                    <input class="form-control" type="file" id="formFile" wire:model="icon">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Gambar</label>
                    @if ($image)
                        <div class="mb-2">
                            <img src="{{ $image->temporaryUrl() }}" alt="" width="150">
                        </div>
                    @endif
                    <input class="form-control" type="file" id="formFile" wire:model="image">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Sub Kategori</label>
                    <select class="form-select" aria-label="Default select example" wire:model="subCategoryId">
                        <option>---Pilih Sub Kategori---</option>
                        @foreach ($subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                        @endforeach
                      </select>
                </div>
                <button class="btn btn-dark w-100" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
