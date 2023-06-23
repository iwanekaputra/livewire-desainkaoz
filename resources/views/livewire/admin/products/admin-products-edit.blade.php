<div>
    <h1>Edit Produk</h1>
    <hr>
    <div class="row mt-5">
        <div class="col-lg-6">
            <form wire:submit.prevent="update" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="title-product" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" wire:model="name">
                        </div>
                        <div class="mb-3">
                            <label for="code-product" class="form-label">Kode Produk</label>
                            <input type="text" class="form-control" wire:model="code">
                        </div>
                        <div class="mb-3">
                            <label for="weight-product" class="form-label">Berat</label>
                            <input type="number" class="form-control" wire:model="weight">
                        </div>
                        <div class="mb-3">
                            <label for="price-product" class="form-label">Harga Produk</label>
                            <input type="number" class="form-control" wire:model="price">
                        </div>
                        <div class="mb-3">
                            <label for="strikethrough-price" class="form-label">Harga Coret</label>
                            <input type="number" class="form-control" wire:model="strikethrough_price">
                        </div>
                        <div class="mb-3">
                            <label for="preorder" class="form-label">Pre Order</label>
                            <input type="text" class="form-control" wire:model="preorder">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="reseller-price" class="form-label">Harga Reseller</label>
                            <input type="number" class="form-control" wire:model="reseller_price">
                        </div>
                        <div class="mb-3">
                            <label for="agent-price" class="form-label">Harga Agen</label>
                            <input type="number" class="form-control" wire:model="agent_price">
                        </div>
                        <div class="mb-3">
                            <label for="agentsp-price" class="form-label">Harga agen sp</label>
                            <input type="number" class="form-control" wire:model="agentsp_price">
                        </div>
                        <div class="mb-3">
                            <label for="distribution-price" class="form-label">Harga Distribution</label>
                            <input type="number" class="form-control" wire:model="distribution_price">
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stok</label>
                            <input type="number" class="form-control" wire:model="stock">
                        </div>
                        <label for="category" class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" wire:model="category_id" required>
                            <option>Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Image Upload</label>
                            @if ($images)
                            <div class="row">
                                @foreach ($images as $image)
                                <div class="col-3 card me-1 mb-1">
                                    <img src="{{ $image->temporaryUrl() }}" height="60px">
                                </div>
                                @endforeach
                            </div>
                            @endif
                            <input type="file" class="form-control" wire:model="images" multiple>

                            @if ($productImages)
                            <div class="row mt-2">
                                @foreach ($productImages as $productImage)
                                    <div class="col-3 card me-1 mb-1">
                                        <img src="{{ asset('storage/images/' .  $productImage->name ) }}" height="60px" width="40">
                                        <i class="fa fa-times position-absolute float-end top-0 end-0" wire:click="deleteImage({{ $productImage->id }})" aria-hidden="true"></i>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                            {{-- <div wire:loading wire:target="images">Uploading...</div> --}}
                            @error('images.*') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" rows="3" wire:model="description"></textarea>
                          </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-dark w-100 mt-3">Update</button>
            </form>
        </div>
    </div>

    </div>
