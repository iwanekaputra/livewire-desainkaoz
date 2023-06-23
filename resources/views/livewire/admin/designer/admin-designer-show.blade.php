<div>
    {{-- Be like water. --}}
    <div class="row mt-5">
        <div class="col-lg-7">
            <table class="table mt-5">
                <thead>
                  <tr>
                    <th scope="col">No Id</th>
                    <th scope="col">:</th>
                    <th scope="col">{{ $productDesign->id }}</th>
                  </tr>
                  <tr>
                    <th scope="col">Kategori</th>
                    <th scope="col">:</th>
                    <th scope="col">{{ $productDesign->designCategory->name }}</th>
                  </tr>
                  <tr>
                    <th scope="col">Judul</th>
                    <th scope="col">:</th>
                    <th scope="col">{{ $productDesign->title }}</th>
                  </tr>
                  <tr>
                    <th scope="col">Harga Design</th>
                    <th scope="col">:</th>
                    <th scope="col">Rp. {{ number_format($productDesign->price_design, 0, ',','.') }}</th>
                  </tr>
                  <tr>
                    <th scope="col">Total Harga</th>
                    <th scope="col">:</th>
                    <th scope="col">Rp. {{ number_format($productDesign->total_price, 0, ',','.') }}</th>
                  </tr>
                </thead>
            </table>
            <div class="px-2 mt-2">
                <p class="fw-bold">Deskripsi : </p>
                <p>{{ $productDesign->description }}</p>
            </div>
        </div>
        <div class="col-lg-3">
            <img src="{{ $productDesign->image }}" alt="">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-2">
        <button class="btn btn-success" wire:click="alertConfirm({{ $productDesign->id }})">Approve Design</button>
    </div>
    </div>
</div>
