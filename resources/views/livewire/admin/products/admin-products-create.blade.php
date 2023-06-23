<div>
<h1>Tambah Produk</h1>
<hr>
<form wire:submit.prevent="store" method="POST" enctype="multipart/form-data">
<div class="row mt-5">
    <div class="col-lg-6">
        <h3>Produk</h3>
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
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" wire:model="category_id" required>
                            <option>Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>


                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="style" class="form-label">Style</label>
                        <select class="form-select" aria-label="Default select example" wire:model="style_id" required>
                            <option>Pilih Style</option>
                            @foreach ($styles as $style)
                                <option value="{{ $style->id }}">{{ $style->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Ukuran</label>
                        <div wire:ignore>
                            <select id="size-dropdown" class="form-control" multiple wire:model="sizes_id">
                                @foreach($sizes as $size)
                                    <option value="{{$size->number}}">{{ $size->number }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
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

        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h3>Produk Variant</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="color" class="form-label">Warna</label>
                <select class="form-select" aria-label="Default select example" wire:model="color" required>
                    <option>Pilih Warna</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->name }}">{{ $color->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Image Produk Variant</label>
                @if ($imageProductVariant)
                <div class="row">
                    <div class="col-3 card me-1 mb-3">
                        <img src="{{ $imageProductVariant->temporaryUrl() }}" height="60px">
                    </div>
                </div>
                @endif
                <input type="file" class="form-control" wire:model="imageProductVariant">
                {{-- <div wire:loading wire:target="images">Uploading...</div> --}}
                @error('imageProductVariant.*') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-dark w-100 mt-3 tes">Tambah</button>

</form>



    <script>
        $(document).ready(function () {
            $('#size-dropdown').select2();
            $('#size-dropdown').on('change', function (e) {
                let data = $(this).val();
                 @this.set('sizes_id', data);
            });
            window.livewire.on('productStore', () => {
                $('#size-dropdown').select2();
            });
        });
    </script>
</div>
