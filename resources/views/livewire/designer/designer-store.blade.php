<div>
    <div class="container">
        <form wire:submit.prevent="store">
        <div class="row">
            <h5>Avatar Toko</h5>
            <div class="d-flex gap-4">
                {{-- @if (optional($this->store)->image)
                    <img src="{{ asset('uploads/images/' . optional($this->store)->image) }}" alt="" class="rounded-circle" width="100">
                @endif --}}
                @if ($image_update || $image)
                    @if ($image_update)
                        <img src="{{ $image_update->temporaryUrl() }}" alt="" class="rounded-circle" width="100">
                    @elseif ($image)
                        <img src="{{ asset("uploads/images/" . $image) }}" alt="" class="rounded-circle" width="100">
                    @endif
                @else
                    <img src="{{ asset('icon/penjualan.png') }}" alt="" class="rounded-circle" width="100">
                @endif
                <div class="div">
                    <button type="button" class="btn btn-dark rounded-0" id="loadFileXml" onclick="document.getElementById('file').click();">Pilih Foto</button>
                    <input type="file" style="display:none;" id="file" name="file" wire:model="image_update" />
                    <p>Foto maksimal 300 x 300 piksel dalam format jpg</p>
                </div>
            </div>
        </div>

        <hr>
        <div class="row mt-5">
            <div class="col">
                <h5>Cover Toko</h5>
                @if ($cover_update || $cover)
                    @if ($cover_update)
                        <div class="mb-2">
                            <img src="{{ $cover_update->temporaryUrl() }}" alt="" width="100">
                        </div>
                    @elseif ($cover)
                        <div class="mb-2">
                            <img src="{{ asset("uploads/images/" . $cover) }}" alt="" width="100">
                        </div>
                    @endif
                @else
                    <img src="{{ asset('icon/penjualan.png') }}" alt="" width="100">
                @endif


                <button type="button" class="btn btn-dark rounded-0" id="loadFileXml" onclick="document.getElementById('imageCover').click();">Pilih Gambar</button>
                    <input type="file" style="display:none;" id="imageCover" name="image" wire:model="cover_update" />
                    <p>Gambar harus berukuran lebar 1250px dan tinggi 392px dan dalam format JPEG atau PNG</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h5>Gambar Depan</h5>
                @if ($front_update || $front)
                    @if ($front_update)
                        <div class="mb-2">
                            <img src="{{ $front_update->temporaryUrl() }}" alt="" width="100">
                        </div>
                    @elseif ($front)
                        <div class="mb-2">
                            <img src="{{ asset("uploads/images/" . $front) }}" alt="" width="100">
                        </div>
                    @endif
                @else
                    <img src="{{ asset('icon/penjualan.png') }}" alt="" width="100">
                @endif


                <button type="button" class="btn btn-dark rounded-0" id="loadFileXml" onclick="document.getElementById('front').click();">Pilih Gambar</button>
                    <input type="file" style="display:none;" id="front" name="image" wire:model="front_update" />
                    <p>Gambar harus berukuran lebar 500px dan tinggi 500px dan dalam format JPEG atau PNG</p>
            </div>
        </div>
        <div class="row">
            <label for="exampleFormControlInput1" class="form-label">Nama Toko</label>
            <div class="col-lg-10">
                <div class="mb-3">
                    <input type="text" class="form-control" id="exampleFormControlInput1" wire:model="name" value="{{ $name }}">
                </div>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-dark rounded-0">Edit</button>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">AlamatURL Toko</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" wire:model="url" value="{{ $url }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Bio / Deskripsi</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="description" value="{{ $description }}"></textarea>
            </div>
        </div>

        <button class="btn btn-dark rounded-0" type="submit">Save All Changes</button>
    </form>
    </div>
</div>
