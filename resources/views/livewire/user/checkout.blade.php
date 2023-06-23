<div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8">
                <form action="">
                    <div class="row bg-white border">
                        <h2>Form Checkout</h2>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                              </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nohp" class="form-label">No HP</label>
                                <input type="number" class="form-control" id="nohp">
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
                                <label for="city" class="form-label">Layanan</label>
                                <select class="form-select" aria-label="Default select example" wire:model="cityId">
                                    <option selected>Pilih Layanan</option>
                                    @if($costs)
                                    @foreach ($costs as $cost)
                                        <option value="{{ $cost['service'] }}">{{ $cost['service'] }} - {{ $cost['description'] }} - Rp. {{ number_format($cost['cost'][0]['value'], 0, ',','.') }}</option>
                                    @endforeach
                                    @endif

                                  </select>
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
                                <h5>Sub total</h5>
                            </th>
                            <td>90000</td>
                        </tr>
                        <tr>
                            <th>
                                <h5>Ongkir</h5>
                            </th>
                            <td>20000</td>
                        </tr>
                        <tr>
                            <th>
                                <h5>Total</h5>
                            </th>
                            <td>20000</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
