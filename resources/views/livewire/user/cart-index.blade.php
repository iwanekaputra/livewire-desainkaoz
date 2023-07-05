<div>
    <div class="main">
        <div class="row mt-5">
            <h4 class="text-center mb-4" style="font-family: 'Myriad-Pro Bold';">Keranjang</h4>
            <div class="col">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($carts as $cart)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $cart->uploadProductDesign->title }}</td>
                                <td><input class="form-control" type="number" value="{{ $cart->quantity }}"
                                        aria-label="default input example"></td>
                                <td>Rp. {{ number_format($cart->total_price, 0, ',', '.') }}</td>
                                <td>
                                    <h3>
                                        <i class="fa fa-times text-danger" aria-hidden="true"
                                            wire:click="alertConfirm({{ $cart->id }})"></i>
                                    </h3>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10">
                                    <div class="alert alert-dark text-center">
                                        Tidak ada produk
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-end mt-5">
            <div class="col-lg-4">
                <div class="d-flex justify-content-between">
                    <h4>Total Harga</h4>
                    <h4>Rp. {{ number_format($total_price, 0, ',', '.') }}</h4>
                </div>
                <a href="{{ route('checkout') }}"
                    class="btn btn-dark w-100 mt-2 {{ $carts->count() === 0 ? 'disabled' : '' }}">Checkout</a>
            </div>
        </div>
    </div>

</div>
