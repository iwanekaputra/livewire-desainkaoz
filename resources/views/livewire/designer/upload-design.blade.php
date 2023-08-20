<div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-transparent border-0">
                <div class="spinner"></div>
                <div class="modal-body"></div>
                <h5 class="text-center " style="color: #fff">Loading.....</h5>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="row mt-5">
            <div class="col-lg-4" id="upload-design" style="background-color: #9da19e">
                <h3 class="text-center mt-2" style="font-family: 'Myriad-Pro Bold';">Upload Design</h3>
            </div>
            <div class="col-lg-4" id="harga" style="background-color: silver">
                <h3 class="text-center mt-2" style="font-family: 'Myriad-Pro Bold';">Harga</h3>
            </div>
            <div class="col-lg-4" id="publish" style="background-color: silver">
                <h3 class="text-center mt-2" style="font-family: 'Myriad-Pro Bold';">Publish</h3>
            </div>
        </div>
    </div>

    {{-- step 1 --}}
    <div class="main step1">
        <div class="row mt-4 justify-content-center">
            <div class="col-lg-4">
                <div style="width : 300px; height: 300px; border : 1px dashed black"
                    class="d-flex align-items-center justify-content-center">
                    <img wire:ignore.self id="design-image" style="width:100%;height:100%;">
                </div>
                <h1 style="margin-left: 4.5rem"><button class="btn btn-warning rounded-0 ms-3"
                        onclick="document.querySelector('.file_input').click()">Upload Image</button></h1>
                <input type="file" class="file_input" style="display: none" wire:model="imageDesign">
            </div>
        </div>

        {{-- navbar step 1 --}}
        <div class="row mt-5">
            <div class="col-lg-12">
                <ul class="nav nav-tabs w-100 justify-content-evenly border-0" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="{{ $products[0]->name }}-tab" data-bs-toggle="tab"
                                data-bs-target="#{{ $products[0]->name }}-tab-pane" type="button" role="tab"
                                aria-controls="{{ $products[0]->name }}-tab-pane" aria-selected="true">
                                <img src="{{ asset('storage/produk/' . $products[0]->category->image) }}" alt="" width="75">
                            </button>
                        </li>

                        @foreach ($products->skip(1) as $product)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="{{ $product->name }}-tab" data-bs-toggle="tab"
                                    data-bs-target="#{{ $product->name }}-tab-pane" type="button" role="tab"
                                    aria-controls="{{ $product->name }}-tab-pane" aria-selected="true">
                                    <img src="{{ asset('storage/produk/' . $product->category->image) }}" alt="" width="75">
                                </button>
                            </li>
                        @endforeach

                </ul>
            </div>
        </div>

        {{-- tab step 1 --}}
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="{{ $products[0]->name }}-tab-pane" role="tabpanel"
                aria-labelledby="{{ $products[0]->name }}-tab" tabindex="0">
                <div class="row mt-5">
                    <div class="col-lg-7">
                        <div id="tshirt-capture" style="width : 500px; height : 500px">
                            <div style="width : 500px; height : 500px; background-image : url('{{ asset('uploads/imageProductVariant/' . $products[0]->productvariants->first()->image) }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                class="{{ $products[0]->name }}-main-image">
                                <div class="layer-{{ $products[0]->id }} position-relative"
                                    style="width : 200px; top : 40px; left : 150px; height : 380px; border : 1px dashed black">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-5">
                        <h6 class="mt-3 ms-1">Style :</h6>

                        {{-- style product step 1 --}}
                        <select class="form-select style" id="style-{{ $products[0]->name }}" aria-label="Default select example" data-name="{{ $products[0]->name }}">
                            @foreach ($products[0]->productvariants->groupBy('style.name') as $productVariant  => $value)
                                <option value="{{ $productVariant }}" data-name="{{ $products[0]->name }}">{{ $productVariant }}</option>
                            @endforeach
                        </select>

                        <hr>
                        <div class="d-flex justify-content-between">
                            @forelse ($products[0]->productvariants->groupBy('view') as $productVariant => $value)
                                <button class="btn btn-dark rounded-0 {{ strtolower($productVariant) }}-image" style="width : 45%" data-id="{{ $products[0]->id }}" data-name="{{ $products[0]->name }}" data-view="{{ $productVariant }}">{{ $productVariant }}</button>
                            @empty

                            @endforelse
                        </div>

                        {{-- color product step 1 --}}
                        <div class="mt-4">
                            <h6>Color : </h6>
                            <div class="mt-3 d-flex gap-2 colorr" id="{{ $products[0]->name }}-color">
                                @foreach ($products[0]->productvariants->where('view', 'front')->groupBy('style.name')->first() as $productVariant)
                                <div style="width : 40px; height : 40px; background-color : {{ $productVariant->color }}; border : 2px solid silver"
                                    class="color" id="{{ $products[0]->name }}" data-color="{{ $productVariant->color }}" data-id="{{ $productVariant->id }}" data-idProduct="{{ $products[0]->id }}" data-image="{{ $productVariant->image }}" data-name="{{ $products[0]->name }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mt-4">
                            <button class="btn btn-dark rounded-0" style="width : 45%"
                                id="vertical">Vertical</button>
                            <button class="btn btn-dark rounded-0" style="width : 45%">Horizontal</button>
                        </div>
                        <div class="mt-5">
                            <h6>Harga Dasar</h6>
                            <input style="background-color: #c0c0c0" type="text" class="w-100 text-dark"
                                value="{{ $products[0]->price }}" disabled>
                        </div>
                        <hr>
                        <button class="btn btn-dark rounded-0 step-1" style="width : 45%"
                            type="button" disabled wire:ignore.self>Next</button>
                    </div>
                </div>
            </div>
            @foreach ($products->skip(1) as $product)
                    <div class="tab-pane fade" id="{{ $product->name }}-tab-pane" role="tabpanel"
                    aria-labelledby="{{ $product->name }}-tab" tabindex="0">
                    @if ($product->category_id == '6')
                        <div class="row mt-5">
                            <div class="col-lg-7">
                                <div id="tshirt-capture" style="width : 500px; height : 500px">
                                    <div style="width : 500px; height : 500px; background-repeat : no-repeat; background-size : 100% 100%"
                                        class="main-image">
                                        <div class="sticker-layer position-relative" id="container"
                                            style="width : 200px; top : 40px; left : 150px; height : 380px; ">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <h6 class="mt-3 ms-1">Style :</h6>

                                {{-- style product step 1 --}}
                                <select class="form-select style">
                                    <option>Sticker Vinyl Putih</option>
                                </select>

                                <div class="mt-5">
                                    <h6>Harga Dasar</h6>
                                    <input style="background-color: #c0c0c0" type="text" class="w-100 text-dark"
                                        value="{{ $product->price }}" disabled>
                                </div>
                                <hr>
                                <button class="btn btn-dark rounded-0 step-1" style="width : 45%"
                                    type="button" disabled wire:ignore.self>Next</button>
                            </div>
                        </div>
                    @else
                        <div class="row mt-5">
                            <div class="col-lg-7">
                                <div id="tshirt-capture" style="width : 500px; height : 500px">
                                    <div style="width : 500px; height : 500px; background-image : url('{{ asset('uploads/imageProductVariant/' . $product->productvariants->first()->image) }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                        class="{{ $product->name }}-main-image">
                                        <div class="layer-{{ $product->id }} position-relative"
                                            style="width : 200px; top : 40px; left : 150px; height : 380px; border : 1px dashed black">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-5">
                                <h6 class="mt-3 ms-1">Style :</h6>

                                <select class="form-select style" id="style-{{ $product->name }}" aria-label="Default select example" data-name="{{ $product->name }}">
                                    @foreach ($product->productvariants->groupBy('style.name') as $productVariant  => $value)
                                        <option value="{{ $productVariant }}" data-name="{{ $product->name }}">{{ $productVariant }}</option>
                                    @endforeach
                                </select>

                                <hr>
                                <div class="d-flex justify-content-between">
                                    @forelse ($product->productvariants->groupBy('view') as $productVariant => $value)
                                        <button class="btn btn-dark rounded-0 {{ strtolower($productVariant) }}-image" style="width : 45%" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-view="{{ $productVariant }}">{{ $productVariant }}</button>
                                    @empty

                                    @endforelse
                                </div>

                                <div class="mt-4">
                                    <h6>Color : </h6>
                                    <div class="mt-3 d-flex gap-2 colorr" id="{{ $product->name }}-color">
                                        @foreach ($product->productvariants->where('view', 'front')->groupBy('style.name')->first() as $productVariant)
                                        <div style="width : 40px; height : 40px; background-color : {{ $productVariant->color }}; border : 2px solid silver"
                                            class="color" id="{{ $product->name }}" data-color="{{ $productVariant->color }}" data-id="{{ $productVariant->id }}" data-idProduct="{{ $product->id }}" data-image="{{ $productVariant->image }}" data-name="{{ $product->name }}">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mt-4">
                                    <button class="btn btn-dark rounded-0" style="width : 45%"
                                        id="vertical">Vertical</button>
                                    <button class="btn btn-dark rounded-0" style="width : 45%">Horizontal</button>
                                </div>
                                <div class="mt-5">
                                    <h6>Harga Dasar</h6>
                                    <input style="background-color: #c0c0c0" type="text" class="w-100 text-dark"
                                        value="{{ $product->price }}" disabled>
                                </div>
                                <hr>
                                <button class="btn btn-dark rounded-0 step-1" style="width : 45%"
                                    type="button" disabled wire:ignore.self>Next</button>
                            </div>
                        </div>
                    @endif
                    </div>

            @endforeach

        </div>
    </div>
    {{-- end step 1 --}}

    {{-- step 2 --}}
    <div class="main step2 d-none">
        {{-- navbar step 2 --}}
        <div class="row mt-2">
            <div class="col-lg-12">
                <ul class="nav nav-tabs w-100 justify-content-evenly border-0" id="myTab" role="tablist"
                    wire:ignore>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="{{ $products[0]->name }}-tab-step-2" data-bs-toggle="tab"
                            data-bs-target="#{{ $products[0]->name }}-tab-pane-step-2" type="button" role="tab"
                            aria-controls="{{ $products[0]->name }}-tab-pane-step-2" aria-selected="true">
                            <img src="{{ asset('storage/produk/' . $products[0]->category->image) }}" alt="" width="75">
                        </button>
                    </li>
                    @foreach ($products->skip(1) as $product)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="{{ $product->name }}-tab-step-2" data-bs-toggle="tab"
                            data-bs-target="#{{ $product->name }}-tab-pane-step-2" type="button" role="tab"
                            aria-controls="{{ $product->name }}-tab-pane-step-2" aria-selected="true">
                            <img src="{{ asset('storage/produk/' . $product->category->image) }}" alt="" width="75">
                        </button>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>

        {{-- tab step 2 --}}
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="{{ $products[0]->name }}-tab-pane-step-2" role="tabpanel" aria-labelledby="{{ $products[0]->name }}-tab"
                tabindex="0" wire:ignore.self>
                <div class="row mt-5">
                    <div class="col-lg-6" id="preview-image">
                        <div id="tshirt-capture" style="width : 500px; height : 500px">
                            <div style="width : 500px; height : 500px; background-image : url('{{ asset('uploads/imageProductVariant/' . $products[0]->productvariants->first()->image) }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                class="{{ $products[0]->name }}-main-image-2">
                                <div class="layer-step-2-{{ $products[0]->id }} position-relative"
                                    style="width : 200px; top : 40px; left : 150px; height : 380px; ">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>{{ $products[0]->name }}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mt-2"><strong>Profit Estimator for: </strong></p>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-select" aria-label="Default select example" id="style-step-2">
                                    @foreach ($products[0]->productvariants->groupBy('style.name') as $productVariant  => $value)
                                        <option value="{{ $productVariant }}" data-name="{{ $products[0]->name }}">{{ $productVariant }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <p><strong>Harga Dasar: </strong></p>
                            </div>
                            <div class="col-lg-6">
                                <p id="{{ $products[0]->name }}-harga-dasar">{{ $products[0]->price }}</p>
                            </div>
                            <div class="col-lg-6">
                                <p><strong>Royalti Desain </strong></p>
                            </div>
                            <div class="col-lg-6">
                                <input type="number" name="price[]" class="price" id="price-{{ $products[0]->name }}" data-product="{{ $products[0]->name }}">
                            </div>
                            <div class="col-lg-6">
                                <p><strong>Harga Jual: </strong></p>
                            </div>

                        </div>
                        <div class="mt-6">
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td scope="col">10 items</td>
                                            <td id="{{ $products[0]->name }}-10-items" scope="col" class="text-end">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="col">100 items</td>
                                            <td id="{{ $products[0]->name }}-100-items" scope="col" class="text-end"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">250 items</td>
                                            <td id="{{ $products[0]->name }}-250-items" scope="col" class="text-end"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">500 items</td>
                                            <td id="{{ $products[0]->name }}-500-items" scope="col" class="text-end"></td>
                                        </tr>
                                        <tr class="bg-warning">
                                            <td scope="col">1000 items</td>
                                            <td id="{{ $products[0]->name }}-1000-items" scope="col" class="text-end"></td>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                            <div class="row">
                                <div class="d-flex justify-content-between mt-4">
                                    <button class="btn btn-dark rounded-0 back-step-1" style="width : 45%"><i
                                            class="fa fa-arrow-left" aria-hidden="true"></i>
                                        Back</button>
                                    <button class="btn btn-dark rounded-0 step-2" style="width : 45%">Next <i
                                            class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($products->skip(1) as $product)
            <div class="tab-pane fade" id="{{ $product->name }}-tab-pane-step-2" role="tabpanel" aria-labelledby="{{ $product->name }}-tab"
                tabindex="0" wire:ignore.self>
                @if ($product->category_id == '6')
                <div class="row mt-5">
                    <div class="col-lg-6" id="preview-image">
                        <div id="tshirt-capture" style="width : 500px; height : 500px">
                            <div style="width : 500px; height : 500px; background-repeat : no-repeat; background-size : 100% 100%"
                                class="main-image">
                                <div class="sticker-layer-step-2 position-relative" id="container-2"
                                    style="width : 200px; top : 40px; left : 150px; height : 380px; ">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>{{ $product->name }}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mt-2"><strong>Profit Estimator for: </strong></p>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-select" aria-label="Default select example" id="style-step-2">
                                    <option value="" data-name="{{ $product->name }}">Sticker Vinyl Putih</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <p><strong>Harga Dasar: </strong></p>
                            </div>
                            <div class="col-lg-6">
                                <p id="{{ $product->name }}-harga-dasar">{{ $product->price }}</p>
                            </div>
                            <div class="col-lg-6">
                                <p><strong>Royalti Desain </strong></p>
                            </div>
                            <div class="col-lg-6">
                                <input type="number" class="price" id="price-{{ $product->name }}" data-product="{{ $product->name }}">
                            </div>
                            <div class="col-lg-6">
                                <p><strong>Harga Jual: </strong></p>
                            </div>

                        </div>
                        <div class="mt-6">
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td scope="col">10 items</td>
                                            <td id="{{ $product->name }}-10-items" scope="col" class="text-end">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="col">100 items</td>
                                            <td id="{{ $product->name }}-100-items" scope="col" class="text-end"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">250 items</td>
                                            <td id="{{ $product->name }}-250-items" scope="col" class="text-end"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">500 items</td>
                                            <td id="{{ $product->name }}-500-items" scope="col" class="text-end"></td>
                                        </tr>
                                        <tr class="bg-warning">
                                            <td scope="col">1000 items</td>
                                            <td id="{{ $product->name }}-1000-items" scope="col" class="text-end"></td>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                            <div class="row">
                                <div class="d-flex justify-content-between mt-4">
                                    <button class="btn btn-dark rounded-0 back-step-1" style="width : 45%"><i
                                            class="fa fa-arrow-left" aria-hidden="true"></i>
                                        Back</button>
                                    <button class="btn btn-dark rounded-0 step-2" style="width : 45%">Next <i
                                            class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row mt-5">
                    <div class="col-lg-6" id="preview-image">
                        <div id="tshirt-capture" style="width : 500px; height : 500px">
                            <div style="width : 500px; height : 500px; background-image : url('{{ asset('uploads/imageProductVariant/' . $product->productvariants->first()->image) }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                class="{{ $product->name }}-main-image-2">
                                <div class="layer-step-2-{{ $product->id }} position-relative"
                                    style="width : 200px; top : 40px; left : 150px; height : 380px; ">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>{{ $product->name }}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mt-2"><strong>Profit Estimator for: </strong></p>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-select" aria-label="Default select example" id="style-step-2">
                                    @foreach ($product->productvariants->groupBy('style.name') as $productVariant  => $value)
                                        <option value="{{ $productVariant }}" data-name="{{ $product->name }}">{{ $productVariant }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <p><strong>Harga Dasar: </strong></p>
                            </div>
                            <div class="col-lg-6">
                                <p id="{{ $product->name }}-harga-dasar">{{ $product->name }}</p>
                            </div>
                            <div class="col-lg-6">
                                <p><strong>Royalti Desain </strong></p>
                            </div>
                            <div class="col-lg-6">
                                <input type="number" name="price[]" class="price" id="price-{{ $product->name }}" data-product="{{ $product->name }}">
                            </div>
                            <div class="col-lg-6">
                                <p><strong>Harga Jual: </strong></p>
                            </div>

                        </div>
                        <div class="mt-6">
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td scope="col">10 items</td>
                                            <td id="{{ $product->name }}-10-items" scope="col" class="text-end">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="col">100 items</td>
                                            <td id="{{ $product->name }}-100-items" scope="col" class="text-end"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">250 items</td>
                                            <td id="{{ $product->name }}-250-items" scope="col" class="text-end"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">500 items</td>
                                            <td id="{{ $product->name }}-500-items" scope="col" class="text-end"></td>
                                        </tr>
                                        <tr class="bg-warning">
                                            <td scope="col">1000 items</td>
                                            <td id="{{ $product->name }}-1000-items" scope="col" class="text-end"></td>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                            <div class="row">
                                <div class="d-flex justify-content-between mt-4">
                                    <button class="btn btn-dark rounded-0 back-step-1" style="width : 45%"><i
                                            class="fa fa-arrow-left" aria-hidden="true"></i>
                                        Back</button>
                                    <button class="btn btn-dark rounded-0 step-2" style="width : 45%">Next <i
                                            class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
            @endforeach

        </div>
    </div>
    {{-- end step 2 --}}

    {{-- step 3 --}}
    <div class="main step3 d-none">
        <div class="row mt-4">
            <div class="col-lg-7">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="categort" class="form-label">Pilih Kategori</label>
                        <select class="form-select" id="designCategoryId" aria-label="Default select example"
                            required>
                            <option>---Pilih Kategori---</option>
                            @foreach ($designCategories as $designCategory)
                                <option value="{{ $designCategory->id }}">{{ $designCategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags</label>
                        <input type="text" class="form-control" id="tags" required>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">URL</label>
                        <input type="text" class="form-control" id="url" value="{{ url($link->first_name) }}" disabled>
                    </div>
                    <button class="btn btn-dark mt-4 rounded-0" id="back-step-2">Back</button>
                    <button class="btn btn-dark mt-4 rounded-0" id="submit">Publish</button>

            </div>
        </div>
    </div>
    {{-- end step 3 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"
        integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"
        integrity="sha512-wUa0ktp10dgVVhWdRVfcUO4vHS0ryT42WOEcXjVVF2+2rcYBKTY7Yx7JCEzjWgPV+rj2EDUr8TwsoWF6IoIOPg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://unpkg.com/konva@7.0.0/konva.min.js"></script> --}}
    <script src="https://unpkg.com/konva@9.2.0/konva.min.js"></script>


    <script>

            let tes = @js($products);

            let stage = [];
            tes.forEach(element => {
                if(element.category_id == '6') {
                    return;
                }
                let stage = new Konva.Stage({
                    container: `.layer-${element.id}`,
                    width: 200,
                    height: 380,
                });

                var layer = new Konva.Layer();
                stage.add(layer);
            });

            //sticker
            var stage6 = new Konva.Stage({
                container: 'container',
                width: 400,
                height: 400,
            });

            var layer6 = new Konva.Layer();
            stage6.add(layer6);



            let urlImage;
            let theImg;
            $(".file_input").change(function(e) {


                var URL = window.webkitURL || window.URL;
                var url = URL.createObjectURL(e.target.files[0]);
                var img = new Image();
                img.src = url;
                urlImage = url;



                $('#design-image').attr('src', url);
                $('.step-1').removeAttr('disabled');


                img.onload = function() {

                    // now load the Konva image
                    if(theImg) {

                        theImg.destroy();

                        deleteImage(img)
                        settingImage(img);
                        stickerImage(url, 'container');


                        } else {
                            settingImage(img);
                            stickerImage(url, 'container');
                        }

                }
            });



            function deleteImage(img) {
            tes.forEach(element => {
                if(element.category_id == '6') {
                    return;
                }
                let staging = new Konva.Stage({
                    container: `.layer-${element.id}`,
                    width: 200,
                    height: 380,
                });

                var layer = new Konva.Layer();
                staging.add(layer);

                theImg = new Konva.Image({
                    id: `rect-${element.id}`,
                    name : 'rect',
                    image: img,
                    x: 26,
                    y: 10,
                    width: 150,
                    height: 150,
                    draggable: true,
                    rotation: 0,
                });

                layer.add(theImg);
                staging.add(layer);
                staging.id = element.id;


                var tr = new Konva.Transformer();
                layer.add(tr);

                // by default select all shapes


                // at this point basic demo is finished!!
                // we just have several transforming nodes
                layer.draw();

                // add a new feature, lets add ability to draw selection rectangle
                var selectionRectangle = new Konva.Rect({
                    fill: 'rgba(0,0,255,0.5)',
                });
                layer.add(selectionRectangle);

                var x1, y1, x2, y2;
                staging.on('mousedown touchstart', (e) => {
                    // do nothing if we mousedown on eny shape
                    if (e.target !== staging) {
                        return;
                    }
                    x2 = staging.getPointerPosition().x;
                    x1 = staging.getPointerPosition().x;
                    y1 = staging.getPointerPosition().y;
                    y2 = staging.getPointerPosition().y;


                    selectionRectangle.visible(true);
                    selectionRectangle.width(0);
                    selectionRectangle.height(0);
                    layer.draw();
                });



                staging.on('mousemove touchmove', () => {
                    // no nothing if we didn't start selection
                    if (!selectionRectangle.visible()) {
                        return;
                    }
                    x2 = staging.getPointerPosition().x;
                    y2 = staging.getPointerPosition().y;


                    selectionRectangle.setAttrs({
                        x: Math.min(x1, x2),
                        y: Math.min(y1, y2),
                        width: Math.abs(x2 - x1),
                        height: Math.abs(y2 - y1),
                    });
                    layer.batchDraw();
                });

                staging.on('mouseup touchend', () => {
                    // no nothing if we didn't start selection
                    if (!selectionRectangle.visible()) {
                        return;
                    }
                    // update visibility in timeout, so we can check it in click event
                    setTimeout(() => {
                        selectionRectangle.visible(false);
                        layer.batchDraw();
                    });

                    var shapes = staging.find('.rect').toArray();
                    var box = selectionRectangle.getClientRect();
                    var selected = shapes.filter((shape) =>
                        Konva.Util.haveIntersection(box, shape.getClientRect())
                    );
                    tr.nodes(selected);
                    layer.batchDraw();
                });

                // clicks should select/deselect shapes
                staging.on('click tap', function(e) {
                    // if we are selecting with rect, do nothing
                    if (selectionRectangle.visible()) {
                        return;
                    }

                    // if click on empty area - remove all selections
                    if (e.target === staging) {
                        tr.nodes([]);
                        layer.draw();
                        return;
                    }

                    // do nothing if clicked NOT on our rectangles
                    if (!e.target.hasName('rect')) {
                        return;
                    }

                    // do we pressed shift or ctrl?
                    const metaPressed = e.evt.shiftKey || e.evt.ctrlKey || e.evt.metaKey;
                    const isSelected = tr.nodes().indexOf(e.target) >= 0;

                    if (!metaPressed && !isSelected) {
                        // if no key pressed and the node is not selected
                        // select just one
                        tr.nodes([e.target]);
                    } else if (metaPressed && isSelected) {
                        // if we pressed keys and node was selected
                        // we need to remove it from selection:
                        const nodes = tr.nodes().slice(); // use slice to have new copy of array
                        // remove node from array
                        nodes.splice(nodes.indexOf(e.target), 1);
                        tr.nodes(nodes);
                    } else if (metaPressed && !isSelected) {
                        // add the node into selection
                        const nodes = tr.nodes().concat([e.target]);
                        tr.nodes(nodes);
                    }
                    layer.draw();
                });

                stage.push(staging)

                stage = []


                layer.destroy();
                staging.destroy()
            });
        }

        function stickerImage(url, cl) {
            var stage6 = new Konva.Stage({
                container: cl,
                width: 400,
                height: 400,
            });

            var layer6 = new Konva.Layer();
            stage6.add(layer6);

            Konva.Image.fromURL(url, function (image) {
                layer6.add(image);
                image.setAttrs({
                x: 50,
                y: 50,
                borderSize: 5,
                borderColor: '#e3e6e4',
                width: 180,
                height: 180,
                });

                image.filters([Border]);
                image.cache();
            });

            // now we will define our border filter

            var canvas = document.createElement('canvas');
            var tempCanvas = document.createElement('canvas');

            // make all pixels opaque 100% (except pixels that 100% transparent)
            function removeTransparency(canvas) {
                var ctx = canvas.getContext('2d');

                var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                var nPixels = imageData.data.length;
                for (var i = 3; i < nPixels; i += 4) {
                if (imageData.data[i] > 0) {
                    imageData.data[i] = 255;
                }
                }
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.putImageData(imageData, 0, 0);
                return canvas;
            }

            function Border(imageData) {
                var nPixels = imageData.data.length;

                var size = this.getAttr('borderSize') || 0;

                // - first set correct dimensions for canvases
                canvas.width = imageData.width;
                canvas.height = imageData.height;

                tempCanvas.width = imageData.width;
                tempCanvas.height = imageData.height;

                // - the draw original shape into temp canvas
                tempCanvas.getContext('2d').putImageData(imageData, 0, 0);

                // - then we need to remove alpha chanel, because it will affect shadow (transparent shapes has smaller shadow)
                removeTransparency(tempCanvas);

                var ctx = canvas.getContext('2d');
                var color = this.getAttr('borderColor') || 'black';

                // 3. we will use shadow as border
                // so we just need apply shadow on the original image
                ctx.save();
                ctx.shadowColor = color;
                ctx.shadowBlur = size;
                ctx.drawImage(tempCanvas, 0, 0);
                ctx.restore();

                // - Then we will dive in into image data of [original image + shadow]
                // and remove transparency from shadow
                var tempImageData = ctx.getImageData(0, 0, canvas.width, canvas.height);

                var SMOOTH_MIN_THRESHOLD = 3;
                var SMOOTH_MAX_THRESHOLD = 10;

                let val, hasValue;

                var offset = 3;

                for (var i = 3; i < nPixels; i += 4) {
                // skip opaque pixels
                if (imageData.data[i] === 255) {
                    continue;
                }

                val = tempImageData.data[i];
                hasValue = val !== 0;
                if (!hasValue) {
                    continue;
                }
                if (val > SMOOTH_MAX_THRESHOLD) {
                    val = 255;
                } else if (val < SMOOTH_MIN_THRESHOLD) {
                    val = 0;
                } else {
                    val =
                    ((val - SMOOTH_MIN_THRESHOLD) /
                        (SMOOTH_MAX_THRESHOLD - SMOOTH_MIN_THRESHOLD)) *
                    255;
                }
                tempImageData.data[i] = val;
                }

                // draw resulted image (original + shadow without opacity) into canvas
                ctx.putImageData(tempImageData, 0, 0);

                // then fill whole image with color (after that shadow is colored)
                ctx.save();
                ctx.globalCompositeOperation = 'source-in';
                ctx.fillStyle = color;
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                ctx.restore();

                // then we need to copy colored shadow into original imageData
                var newImageData = ctx.getImageData(0, 0, canvas.width, canvas.height);

                var indexesToProcess = [];
                for (var i = 3; i < nPixels; i += 4) {
                var hasTransparentOnTop =
                    imageData.data[i - imageData.width * 4 * offset] === 0;
                var hasTransparentOnTopRight =
                    imageData.data[i - (imageData.width * 4 + 4) * offset] === 0;
                var hasTransparentOnTopLeft =
                    imageData.data[i - (imageData.width * 4 - 4) * offset] === 0;
                var hasTransparentOnRight = imageData.data[i + 4 * offset] === 0;
                var hasTransparentOnLeft = imageData.data[i - 4 * offset] === 0;
                var hasTransparentOnBottom =
                    imageData.data[i + imageData.width * 4 * offset] === 0;
                var hasTransparentOnBottomRight =
                    imageData.data[i + (imageData.width * 4 + 4) * offset] === 0;
                var hasTransparentOnBottomLeft =
                    imageData.data[i + (imageData.width * 4 - 4) * offset] === 0;
                var hasTransparentAround =
                    hasTransparentOnTop ||
                    hasTransparentOnRight ||
                    hasTransparentOnLeft ||
                    hasTransparentOnBottom ||
                    hasTransparentOnTopRight ||
                    hasTransparentOnTopLeft ||
                    hasTransparentOnBottomRight ||
                    hasTransparentOnBottomLeft;

                // if pixel presented in original image - skip it
                // because we need to change only shadow area
                if (
                    imageData.data[i] === 255 ||
                    (imageData.data[i] && !hasTransparentAround)
                ) {
                    continue;
                }
                if (!newImageData.data[i]) {
                    // skip transparent pixels
                    continue;
                }
                indexesToProcess.push(i);
                }

                for (var index = 0; index < indexesToProcess.length; index += 1) {
                var i = indexesToProcess[index];

                var alpha = imageData.data[i] / 255;

                if (alpha > 0 && alpha < 1) {
                    var aa = 1 + 1;
                }
                imageData.data[i] = newImageData.data[i];
                imageData.data[i - 1] =
                    newImageData.data[i - 1] * (1 - alpha) +
                    imageData.data[i - 1] * alpha;
                imageData.data[i - 2] =
                    newImageData.data[i - 2] * (1 - alpha) +
                    imageData.data[i - 2] * alpha;
                imageData.data[i - 3] =
                    newImageData.data[i - 3] * (1 - alpha) +
                    imageData.data[i - 3] * alpha;

                if (newImageData.data[i] < 255 && alpha > 0) {
                    var bb = 1 + 1;
                }
                }
            }
        }

        function settingImage(img) {
            tes.forEach(element => {
                if(element.category_id == '6') {
                    return;
                }
                let staging = new Konva.Stage({
                    container: `.layer-${element.id}`,
                    width: 200,
                    height: 380,
                });

                var layer = new Konva.Layer();
                staging.add(layer);

                theImg = new Konva.Image({
                    id: `rect-${element.id}`,
                    name : 'rect',
                    image: img,
                    x: 26,
                    y: 10,
                    width: 150,
                    height: 150,
                    draggable: true,
                    rotation: 0,
                });

                layer.add(theImg);
                staging.add(layer);
                staging.id = element.id;


                var tr = new Konva.Transformer();
                layer.add(tr);

                // by default select all shapes


                // at this point basic demo is finished!!
                // we just have several transforming nodes
                layer.draw();

                // add a new feature, lets add ability to draw selection rectangle
                var selectionRectangle = new Konva.Rect({
                    fill: 'rgba(0,0,255,0.5)',
                });
                layer.add(selectionRectangle);

                var x1, y1, x2, y2;
                staging.on('mousedown touchstart', (e) => {
                    // do nothing if we mousedown on eny shape
                    if (e.target !== staging) {
                        return;
                    }
                    x2 = staging.getPointerPosition().x;
                    x1 = staging.getPointerPosition().x;
                    y1 = staging.getPointerPosition().y;
                    y2 = staging.getPointerPosition().y;


                    selectionRectangle.visible(true);
                    selectionRectangle.width(0);
                    selectionRectangle.height(0);
                    layer.draw();
                });



                staging.on('mousemove touchmove', () => {
                    // no nothing if we didn't start selection
                    if (!selectionRectangle.visible()) {
                        return;
                    }
                    x2 = staging.getPointerPosition().x;
                    y2 = staging.getPointerPosition().y;


                    selectionRectangle.setAttrs({
                        x: Math.min(x1, x2),
                        y: Math.min(y1, y2),
                        width: Math.abs(x2 - x1),
                        height: Math.abs(y2 - y1),
                    });
                    layer.batchDraw();
                });

                staging.on('mouseup touchend', () => {
                    // no nothing if we didn't start selection
                    if (!selectionRectangle.visible()) {
                        return;
                    }
                    // update visibility in timeout, so we can check it in click event
                    setTimeout(() => {
                        selectionRectangle.visible(false);
                        layer.batchDraw();
                    });

                    var shapes = staging.find('.rect').toArray();
                    var box = selectionRectangle.getClientRect();
                    var selected = shapes.filter((shape) =>
                        Konva.Util.haveIntersection(box, shape.getClientRect())
                    );
                    tr.nodes(selected);
                    layer.batchDraw();
                });

                // clicks should select/deselect shapes
                staging.on('click tap', function(e) {
                    // if we are selecting with rect, do nothing
                    if (selectionRectangle.visible()) {
                        return;
                    }

                    // if click on empty area - remove all selections
                    if (e.target === staging) {
                        tr.nodes([]);
                        layer.draw();
                        return;
                    }

                    // do nothing if clicked NOT on our rectangles
                    if (!e.target.hasName('rect')) {
                        return;
                    }

                    // do we pressed shift or ctrl?
                    const metaPressed = e.evt.shiftKey || e.evt.ctrlKey || e.evt.metaKey;
                    const isSelected = tr.nodes().indexOf(e.target) >= 0;

                    if (!metaPressed && !isSelected) {
                        // if no key pressed and the node is not selected
                        // select just one
                        tr.nodes([e.target]);
                    } else if (metaPressed && isSelected) {
                        // if we pressed keys and node was selected
                        // we need to remove it from selection:
                        const nodes = tr.nodes().slice(); // use slice to have new copy of array
                        // remove node from array
                        nodes.splice(nodes.indexOf(e.target), 1);
                        tr.nodes(nodes);
                    } else if (metaPressed && !isSelected) {
                        // add the node into selection
                        const nodes = tr.nodes().concat([e.target]);
                        tr.nodes(nodes);
                    }
                    layer.draw();
                });

                stage.push(staging)
            });
        }


        let imageDefaultColor = [];
        $(document).on('click', '.color' , function () {
            // imageDefaultColor.push({$(this).attr('data-id')});
            let dataIdProductVariant = $(this).attr('data-id');
            let image = $(this).attr('data-image');
            let dataIdProduct = $(this).attr('data-idProduct');

            if(imageDefaultColor.length) {

                const usersMale = imageDefaultColor.filter((user) => user.dataIdProduct !== dataIdProduct);

                usersMale.push({dataIdProduct, dataIdProductVariant, image});
                imageDefaultColor = usersMale;

            }

            if(!imageDefaultColor.length) {
                imageDefaultColor.push({dataIdProduct, dataIdProductVariant, image});
            }

            let name = $(this).attr('data-name');
            let color = $(this).attr('data-color');
            document.querySelector(`.${name}-main-image`).style.backgroundImage =
                `url('{{ asset('uploads/imageProductVariant/${image}') }}')`;
                document.querySelector(`.${name}-main-image-2`).style.backgroundImage =
                `url('{{ asset('uploads/imageProductVariant/${image}') }}')`;

            $('#style-step-2').attr('data-color', color);
        })



        $('.back-step-1').click(function() {
            $('.step1').removeClass('d-none');
            $('.step2').addClass('d-none');
            $('.step3').addClass('d-none');

            $('#upload-design').css("background-color", '#9da19e')
            $('#harga').css("background-color", 'silver')
            $('#publish').css("background-color", 'silver')

            if(theImg2) {
                theImg2.position({
                    x : theImg.absolutePosition().x,
                    y : theImg.absolutePosition().y
                })
            }

        })

        $('#back-step-2').click(function() {
            $('.step2').removeClass('d-none');
            $('.step1').addClass('d-none');
            $('.step3').addClass('d-none');

            $('#upload-design').css("background-color", 'silver')
            $('#harga').css("background-color", '#9da19e')
            $('#publish').css("background-color", 'silver')
        })

        $('.price').on('input', function() {
            let product = $(this).attr('data-product')
            let items1 = $(`#price-${product}`).val() * 10;
            let items2 = $(`#price-${product}`).val() * 100;
            let items3 = $(`#price-${product}`).val() * 250;
            let items4 = $(`#price-${product}`).val() * 500;
            let items5 = $(`#price-${product}`).val() * 1000;

            let hargaDasar = parseInt($(`#${product}-harga-dasar`).text()) + parseInt($('#price-tshirt').val());
            console.log(hargaDasar);
            $('#tshirt-harga-jual').text('Rp. '+ hargaDasar.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'))



            $(`#${product}-10-items`).text( 'Rp. '+ items1.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $(`#${product}-100-items`).text( 'Rp. '+ items2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $(`#${product}-250-items`).text( 'Rp. '+ items3.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $(`#${product}-500-items`).text( 'Rp. '+ items4.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $(`#${product}-1000-items`).text( 'Rp. '+ items5.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
        })

        $('.step-1').click(function() {

            $('.step1').addClass('d-none')
            $('.step2').removeClass('d-none')
            $('.step3').addClass('d-none')

            $('#harga').css("background-color", '#9da19e')
            $('#upload-design').css("background-color", 'silver')
            $('#publish').css("background-color", 'silver')

            var img = new Image();
            img.src = urlImage;
            stage.forEach(element => {
                getImg(`.layer-step-2-${element.id}`, 200, 380, urlImage, element.find(`#rect-${element.id}`)[0].absolutePosition().x, element.find(`#rect-${element.id}`)[0].absolutePosition().y, element.find(`#rect-${element.id}`)[0].width() * element.find(`#rect-${element.id}`)[0].scaleX(), element.find(`#rect-${element.id}`)[0].height() * element.find(`#rect-${element.id}`)[0].scaleY(), element.find(`#rect-${element.id}`)[0].getAbsoluteRotation());
            });

            stickerImage(urlImage, 'container-2');

            })

        let theImg2;
        function getImg(cl, width, height, image, sumbuX, sumbuY, widthLogo, heightLogo, rotation) {
                var stage = new Konva.Stage({
                            container: cl,
                            width: width,
                            height: height,
                        });

                    var layer = new Konva.Layer();
                    stage.add(layer);

                    var img = new Image();
                    img.src = image;


                // now load the Konva image
                theImg2 = new Konva.Image({
                                    name: 'rect',
                                    image: img,
                                    x: sumbuX,
                                    y: sumbuY,
                                    width: widthLogo,
                                    height: heightLogo,
                                    rotation: rotation
                                });



                        layer.add(theImg2);
                        layer.draw();

            }


        $('.step-2').click(function() {

            var prices = $('input[name^=price]').map(function(idx, elem) {
                return $(elem).val();
            }).get();

            let checkPrice = prices.filter(el => el == '');

            if(checkPrice.length || $('#price-Sticker').val() == '') {
                alert('harap diisin semua harga')
            } else {
                $('.step1').addClass('d-none')
                $('.step2').addClass('d-none')
                $('.step3').removeClass('d-none')

                $('#harga').css("background-color", 'silver')
                $('#upload-design').css("background-color", 'silver')
                $('#publish').css("background-color", '#9da19e')
            }



        })

        $('.style').change(function() {

            let name = $(this).find(':selected').attr('data-name');
            let color = $(this).find(':selected').attr('data-color');
            let value = $(this).val();
            let products = @js($products).filter(el => el.name == name);
            let productVariants = products.map(el => {
                return el.productvariants.filter(e => e.style.name == value && e.view == 'front')
            });

            console.log(productVariants);


            document.querySelector(`.${name}-main-image`).style.backgroundImage = `url('{{ asset('uploads/imageProductVariant/${productVariants[0][0].image}') }}')`;


            $(`#${name}-color`).html(productVariants[0].map(el => {
                    return `<div style="width : 40px; height : 40px; background-color : ${el.color}; border : 2px solid silver"
                                class="color" id="${value}" data-image="${el.image}" data-name="${name}">
                            </div>`
            }))

        })

        $('#style-step-2').change(function() {
            let name = $(this).find(':selected').attr('data-name');
            let value = $(this).val();
            let color = $(this).attr('data-color');
            let products = @js($products).filter(el => el.name == name);
            let productVariants = products.map(el => {
                if(color) {
                    return el.productvariants.filter(e => e.style.name == value && e.color == color)
                } else {
                    return el.productvariants.filter(e => e.style.name == value)

                }


            });

            document.querySelector(`.${name}-main-image-2`).style.backgroundImage = `url('{{ asset('uploads/imageProductVariant/${productVariants[0][0].image}') }}')`;


            $(`#${name}-color`).html(productVariants[0].map(el => {
                    return `<div style="width : 40px; height : 40px; background-color : ${el.color}; border : 2px solid silver"
                                class="color" id="${value}" data-image="${el.image}" data-name="${name}">
                            </div>`
            }))

        })

        $('.front-image').on('click', function() {
            let idProduct = $(this).attr('data-id');
            let view = $(this).attr('data-view');
            let name = $(this).attr('data-name');
            let style = $(`#style-${name}`).find(':selected').val();
            let products = @js($products).filter(element => element.id == idProduct);
            let productVariants = products[0].productvariants.filter(el => el.view == view && el.style.name == style)

            document.querySelector(`.${name}-main-image `).style.backgroundImage = `url('{{ asset('uploads/imageProductVariant/${productVariants[0].image}') }}')`;

            $(`#${name}-color`).html(productVariants.map(el => {
                    return `<div style="width : 40px; height : 40px; background-color : ${el.color}; border : 2px solid silver"
                                class="color" id="${style}" data-image="${el.image}" data-name="${name}">
                            </div>`
            }))
        })

        $('.back-image').on('click', function() {
            let idProduct = $(this).attr('data-id');
            let view = $(this).attr('data-view');
            let name = $(this).attr('data-name');
            let style = $(`#style-${name}`).find(':selected').val();

            let products = @js($products).filter(element => element.id == idProduct);
            let productVariants = products[0].productvariants.filter(el => el.view == view && el.style.name == style)


                document.querySelector(`.${name}-main-image `).style.backgroundImage = `url('{{ asset('uploads/imageProductVariant/${productVariants[0]?.image}') }}')`;

                $(`#${name}-color`).html(productVariants.map(el => {
                    return `<div style="width : 40px; height : 40px; background-color : ${el.color}; border : 2px solid silver"
                                class="color" id="${style}" data-image="${el.image}" data-name="${name}">
                            </div>`
            }))


        })



        $('#submit').click(function() {
            var prices = $('input[name^=price]').map(function(idx, elem) {
                return $(elem).val();
            }).get();

            let count = 0;
            let title = $('#title').val();
            let description = $('#description').val();
            let designCategoryId = $('#designCategoryId').val();
            let tags = $('#tags').val();
            let url = $('#url').val();





            stage.map(function(element) {
                let productVariant = imageDefaultColor.find(el => el.dataIdProduct == element.id);
                let products = @js($products).filter(el => el.id == element.id);


                window.livewire.emit('submitForm', {
                    'title' : title,
                    'description' : description,
                    'designCategoryId' : designCategoryId,
                    'imageDefaultColor' : productVariant ? productVariant.dataIdProductVariant : products[0].productvariants[0].id,
                    'productId' : element.id,
                    'tags' : tags,
                    'url' : url,
                    'width' : element.find(`#rect-${element.id}`)[0].width() * element.find(`#rect-${element.id}`)[0].scaleX(),
                    'height' : element.find(`#rect-${element.id}`)[0].height() * element.find(`#rect-${element.id}`)[0].scaleY(),
                    'sumbu_x' : element.find(`#rect-${element.id}`)[0].absolutePosition().x,
                    'sumbu_y' : element.find(`#rect-${element.id}`)[0].absolutePosition().y,
                    'rotation' : element.find(`#rect-${element.id}`)[0].getAbsoluteRotation(),
                    'price' : prices[count++]
                });
            })

            window.livewire.emit('submitForm', {
                    'title' : title,
                    'description' : description,
                    'designCategoryId' : designCategoryId,
                    'imageDefaultColor' : '1',
                    'productId' : 6,
                    'tags' : tags,
                    'url' : url,
                    'width' : 0,
                    'height' : 0,
                    'sumbu_x' : 0,
                    'sumbu_y' : 0,
                    'rotation' : 0,
                    'price' : $('#price-Sticker').val()
                });
        })
    </script>

    <script>
        $('#title').on('change', function() {
            $('#url').val($('#url').val() + '/' +$('#title').val());
        })
    </script>

</div>


