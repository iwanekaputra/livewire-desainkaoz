<div>
    @foreach ($transaction->transactionDetails as $transactionDetail)
    <div class="row mt-5">
        <div class="col-lg-4">
            <img src="{{ $transactionDetail->uploadProductDesign->uploadProductDesignVariants->first()->image }}" alt="" class="w-50">
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-3 mt-3">
                    <div style="font-family:'Myriad-Pro Bold';">Warna</div>
                    <span class="btn btn-color btn-size d-flex justify-content-center align-items-center rounded-0 fw-bold border" style="width : 40px; height : 40px;background-color: {{ $transactionDetail->color }};" ></span>
                </div>
                <div class="col-lg-3 mt-3">
                    <div style="font-family:'Myriad-Pro Bold';">Style</div>
                    <div>Lengan Pendek</div>
                </div>
                <div class="col-lg-3 mt-3">
                    <div style="font-family:'Myriad-Pro Bold';">Ukuran</div>
                    <div>{{ $transactionDetail->size }}</div>
                </div>
                <div class="col-lg-3 mt-3">
                    <div style="font-family:'Myriad-Pro Bold';">Jumlah Item</div>
                    <div>1</div>
                </div>
                <div class="col-lg-3 mt-3">
                    <div style="font-family:'Myriad-Pro Bold';">Total Harga</div>
                    <div>Rp. {{ number_format($transactionDetail->price,0,',','.') }}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="row mt-5">
        <h3 style="font-family:'Myriad-Pro Bold';">Information</h3>
        <div class="col-lg-6 mt-3">
            <div style="font-family:'Myriad-Pro Bold';">Username</div>
            <div>{{ $transaction->user->first_name }}</div>
        </div>
        <div class="col-lg-6 mt-3">
            <div style="font-family:'Myriad-Pro Bold';">Total Harga</div>
            <div>Rp. {{ number_format($totalPrice,0,',','.') }}</div>
        </div>

        <div class="col-lg-6 mt-3">
            <div style="font-family:'Myriad-Pro Bold';">Provinsi</div>
            <div>aoks</div>
        </div>
        <div class="col-lg-6 mt-3">
            <div style="font-family:'Myriad-Pro Bold';">Kota</div>
            <div>aoks</div>
        </div>
        <div class="col-lg-6 mt-3">
            <div style="font-family:'Myriad-Pro Bold';">Alamat</div>
            <div>aoks</div>
        </div>
        <div class="col-lg-6 mt-3">
            <div style="font-family:'Myriad-Pro Bold';">Kurir</div>
            <div>aoks</div>
        </div>
        <div class="col-lg-6 mt-3">
            <div style="font-family:'Myriad-Pro Bold';">Status</div>
            <div>Pending</div>
        </div>
    </div>

    <form action="">
        <div class="row mt-5">
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Status</label>
                    <select class="form-select" aria-label="Default select example" wire:model="status">
                        <option value="PENDING">PENDING</option>
                        <option value="SHIPPING">SHIPPING</option>
                        <option value="SUCCESS">SUCCESS</option>
                    </select>
                </div>
            </div>


            @if ($status === "SHIPPING")
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Input resi</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>
            @endif
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="mb-3">
                    <button class="btn btn-dark">Update Resi</button>
                </div>
            </div>
        </div>
    </form>
</div>

