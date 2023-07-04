<div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8">
                <form action="">
                    <div class="row bg-white border">
                        <h2>Checkout</h2>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{ auth()->user()->email }}" disabled>
                              </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" value="{{ auth()->user()->first_name }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nohp" class="form-label">Provinsi</label>
                                <select class="form-select" aria-label="Default select example" wire:model="provinceId">
                                    <option selected>Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province['province_id'] }}">{{ $province['province'] }}</option>
                                    @endforeach
                                  </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="city" class="form-label">Kota</label>
                                <select class="form-select" aria-label="Default select example" wire:model="cityId">
                                    <option selected>Pilih Kota</option>
                                    @if($cities)
                                    @foreach ($cities as $city)
                                        <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                                    @endforeach
                                    @endif

                                  </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="courier" class="form-label">Pilih Kurir</label>
                                <select class="form-select" aria-label="Default select example" wire:model="courier">
                                    <option selected>Pilih Kurir</option>
                                    <option value="jne">JNE</option>
                                    <option value="pos">POS</option>
                                    <option value="tiki">TIKI</option>
                                  </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="city" class="form-label">Layanan</label>
                                <select class="form-select" aria-label="Default select example" wire:model="ongkir">
                                    <option selected>Pilih Layanan</option>
                                    @if($costs)
                                    @foreach ($costs as $cost)
                                        <option value="{{ $cost['cost'][0]['value'] }}">{{ $cost['service'] }} - {{ $cost['description'] }} - Rp. {{ number_format($cost['cost'][0]['value'], 0, ',','.') }}</option>
                                    @endforeach
                                    @endif

                                  </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="address"></textarea>
                              </div>
                        </div>
                    </div>

                </form>
            </div>

            <div class="col-lg-4">
                <h2>Pesanan</h2>
                <table class="table">
                    <tbody class="">
                        <tr>
                            <th>
                                <h5>Sub Total</h5>
                            </th>
                            <td>
                                Rp. {{ number_format($price,0,',','.') }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <h5>Ongkir</h5>
                            </th>
                            <td>Rp. {{ $ongkir ? number_format($ongkir, 0, ',', '.') : 0 }}</td>
                        </tr>
                        <tr>
                            <th>
                                <h5>Total</h5>
                            </th>
                            <td>Rp. {{ number_format($price + $ongkir, 0, ',','.') }}</td>
                        </tr>
                    </tbody>
                </table>

                <button class="btn btn-dark w-100" wire:click="pay">Bayar sekarang</button>

            </div>
        </div>
    </div>
</div>
