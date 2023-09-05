<div>
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
        <div class="row mt-4 justify-content-center image-front" wire:ignore>
            <div class="col-lg-4">
                
                <div style="background-size: cover;background-image: url({{ asset('assets/admin/images/background.jpg')}}); width : 300px; height: 300px; border : 1px dashed black"
                    class="d-flex align-items-center justify-content-center">
                    <img wire:ignore.self id="design-image" style="width:100%;height:100%;">
                </div>
                <h1 style="margin-left: 4.5rem"><button class="btn btn-warning rounded-0 ms-3"
                        onclick="document.querySelector('.file_input').click()">Upload Image</button></h1>
                <input type="file" class="file_input" style="display: none" wire:model="imageDesign">
            </div>
        </div>
        <div class="row mt-4 justify-content-center image-back d-none" wire:ignore>
            <div class="col-lg-4">
                <div style="background-size: cover;background-image: url({{ asset('assets/admin/images/background.jpg')}}); width : 300px; height: 300px; border : 1px dashed black"
                    class="d-flex align-items-center justify-content-center">
                    <img wire:ignore.self id="design-image-back" style="width:100%;height:100%;">
                </div>
                <h1 style="margin-left: 4.5rem"><button class="btn btn-warning rounded-0 ms-3"
                        onclick="document.querySelector('.file_input_back').click()">Upload Image</button></h1>
                <input type="file" class="file_input_back" style="display: none" wire:model="imageDesignBack">
            </div>
        </div>

        {{-- navbar step 1 --}}
        <div class="row mt-5 navbar-front" wire:ignore>
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
        <div class="tab-content tab-front" id="myTabContent" wire:ignore>
            <div class="tab-pane fade show active" id="{{ $products[0]->name }}-tab-pane" role="tabpanel"
                aria-labelledby="{{ $products[0]->name }}-tab" tabindex="0">
                <div class="row mt-4">
                    <div class="col-lg-7">
                        <h5>Geser, Rotasi, dan Sekala Desain</h5>
                        <div id="tshirt-capture" style="width : 600px; height : 600px" class="text-center">
                            <div style="border: 0.1px solid black; width : 600px; height : 600px; background-image : url('{{ asset('uploads/imageProductVariant/' . $products[0]->productvariants->first()->image) }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                class="{{ $products[0]->name }}-main-image">
                                <div class="layer-{{ $products[0]->id }} position-relative"
                                    style="width : {{ $products[0]->mockup->width_canvas }}px; top : {{ $products[0]->mockup->top_canvas }}px; left : {{ $products[0]->mockup->left_canvas }}px; height : {{ $products[0]->mockup->height_canvas }}px; border : 1px dashed black">
                                </div>
                            </div>
                        </div>
                        <p class="text-center fs-6">Format file PNG transparan</p>
                        <p class="text-center fs-6" style="margin-top: -20px">Minimal resolusi desain 2500px dan maksimal resolusi desain</p>
                    </div>


                    <div class="col-lg-5">
                        <h6 class="mt-3 ms-1">Style :</h6>

                        {{-- style product step 1 --}}
                        <select class="form-select style" id="style-{{ $products[0]->name }}" aria-label="Default select example" data-name="{{ $products[0]->name }}" data-idProduct="{{ $products[0]->id }}">
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
                            <input id="{{ $products[0]->name }}-harga" style="background-color: #c0c0c0" type="text" class="w-100 text-dark"
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
                                <div id="tshirt-capture" style="width : 600px; height : 600px">
                                    <div style="border: 0.1px solid black; width : 600px; height : 600px; background-repeat : no-repeat; background-size : 100% 100%"
                                        class="main-image">
                                        <div class="sticker-layer position-relative" id="container"
                                            style="width : 200px; top : 40px; left : 100px; height : 380px; ">
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
                                    <input id="{{ $product->name }}-harga" style="background-color: #c0c0c0" type="text" class="w-100 text-dark"
                                        value="{{ $product->price }}" disabled>
                                </div>
                                <hr>
                                <button class="btn btn-dark rounded-0 step-1" style="width : 45%"
                                    type="button" disabled wire:ignore.self>Next</button>
                            </div>
                        </div>
                    @else
                        <div class="row mt-4">
                            <div class="col-lg-7">
                                <h5>Geser, Rotasi, dan Sekala Desain</h5>

                                <div id="tshirt-capture" style="width : 600px; height : 600px">
                                    <div style="border: 0.1px solid black; width : 600px; height : 600px; background-image : url('{{ asset('uploads/imageProductVariant/' . $product->productvariants->first()->image) }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                        class="{{ $product->name }}-main-image">
                                        <div class="layer-{{ $product->id }} position-relative"
                                            style="width : {{ $product->mockup->width_canvas }}px; top : {{ $product->mockup->top_canvas }}px; left : {{ $product->mockup->left_canvas }}px; height : {{ $product->mockup->height_canvas }}px; border : 1px dashed black">
                                        </div>
                                    </div>
                                </div>
                                <p class="text-center fs-6">Format file PNG transparan</p>
                                <p class="text-center fs-6" style="margin-top: -20px">Minimal resolusi desain 2500px dan maksimal resolusi desain</p>
                            </div>


                            <div class="col-lg-5">
                                <h6 class="mt-3 ms-1">Style :</h6>

                                <select class="form-select style" id="style-{{ $product->name }}" aria-label="Default select example" data-name="{{ $product->name }}" data-idProduct="{{ $product->id }}">
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
                                    <input id="{{ $product->name }}-harga" style="background-color: #c0c0c0" type="text" class="w-100 text-dark"
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

        <div class="row mt-5 navbar-back d-none" wire:ignore>
            <div class="col-lg-12">
                <ul class="nav nav-tabs w-100 justify-content-evenly border-0" id="myTab" role="tablist">
                    @if ($products[0]->productvariants->where('view', 'front')->first())
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="{{ $products[0]->name }}-tab-back" data-bs-toggle="tab"
                                data-bs-target="#{{ $products[0]->name }}-tab-pane-back" type="button" role="tab"
                                aria-controls="{{ $products[0]->name }}-tab-pane-back" aria-selected="true">
                                <img src="{{ asset('storage/produk/' . $products[0]->category->image) }}" alt="" width="75">
                            </button>
                        </li>

                        @foreach ($products->skip(1) as $product)
                            @if ($product->productvariants->where('view', 'Back')->first())
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="{{ $product->name }}-tab-back" data-bs-toggle="tab"
                                        data-bs-target="#{{ $product->name }}-tab-pane-back" type="button" role="tab"
                                        aria-controls="{{ $product->name }}-tab-pane-back" aria-selected="true">
                                        <img src="{{ asset('storage/produk/' . $product->category->image) }}" alt="" width="75">
                                    </button>
                                </li>
                            @endif
                        @endforeach
                    @endif


                </ul>
            </div>
        </div>
        <div class="tab-content tab-back d-none" id="myTabContent" wire:ignore>
            <div class="tab-pane fade show active" id="{{ $products[0]->name }}-tab-pane-back" role="tabpanel"
                aria-labelledby="{{ $products[0]->name }}-tab-back" tabindex="0">
                <div class="row mt-4">
                    <div class="col-lg-7">
                        <h5>Geser, Rotasi, dan Sekala Desain</h5>

                        <div id="tshirt-capture" style="width : 600px; height : 600px">
                            <div style="border: 0.1px solid black; width : 600px; height : 600px; background-image : url('{{ asset('uploads/imageProductVariant/' . $products[0]->productvariants->where('view', 'Back')->first()->image) }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                class="{{ $products[0]->name }}-main-image-back">
                                <div class="layer-{{ $products[0]->id }}-back position-relative"
                                    style="width : {{ $products[0]->mockup->width_canvas }}px; top : {{ $products[0]->mockup->top_canvas }}px; left : {{ $products[0]->mockup->left_canvas }}px; height : {{ $products[0]->mockup->height_canvas }}px; border : 1px dashed black">
                                </div>
                            </div>
                        </div>

                        <p class="text-center fs-6">Format file PNG transparan</p>
                        <p class="text-center fs-6" style="margin-top: -20px">Minimal resolusi desain 2500px dan maksimal resolusi desain</p>
                    </div>


                    <div class="col-lg-5">
                        <h6 class="mt-3 ms-1">Style :</h6>

                        {{-- style product step 1 --}}
                        <select class="form-select style" id="style-{{ $products[0]->name }}" aria-label="Default select example" data-name="{{ $products[0]->name }}" data-idProduct="{{ $products[0]->id }}">
                            @foreach ($products[0]->productvariants->where('view', 'Back')->groupBy('style.name') as $productVariant  => $value)
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
                                @foreach ($products[0]->productvariants->where('view', 'Back')->groupBy('style.name')->first() as $productVariant)
                                <div style="width : 40px; height : 40px; background-color : {{ $productVariant->color }}; border : 2px solid silver"
                                    class="color-back" id="{{ $products[0]->name }}" data-color="{{ $productVariant->color }}" data-id="{{ $productVariant->id }}" data-idProduct="{{ $products[0]->id }}" data-image="{{ $productVariant->image }}" data-name="{{ $products[0]->name }}">
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
                            <input id="{{ $products[0]->name }}-harga-back" style="background-color: #c0c0c0" type="text" class="w-100 text-dark"
                                value="{{ $products[0]->price }}" disabled>
                        </div>
                        <hr>
                        <button class="btn btn-dark rounded-0 step-1" style="width : 45%"
                            type="button" disabled wire:ignore.self>Next</button>
                    </div>
                </div>
            </div>
            @foreach ($products->skip(1) as $product)
                    <div class="tab-pane fade" id="{{ $product->name }}-tab-pane-back" role="tabpanel"
                    aria-labelledby="{{ $product->name }}-tab-back" tabindex="0">
                    @if ($product->category_id == '6')
                        <div class="row mt-5">
                            <div class="col-lg-7">
                                <div id="tshirt-capture" style="width : 600px; height : 600px">
                                    <div style="width : 600px; height : 600px; background-repeat : no-repeat; background-size : 100% 100%"
                                        class="main-image">
                                        <div class="sticker-layer-back position-relative" id="container"
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
                    @php
                        $tes = $product->productvariants->where('view', 'Back')->first() ? $product->productvariants->where('view', 'Back')->first()->image : '';
                    @endphp
                        <div class="row mt-4">
                            <div class="col-lg-7">
                                <h5>Geser, Rotasi, dan Sekala Desain</h5>

                                <div id="tshirt-capture" style="width : 600px; height : 600px">
                                    <div style="border: 0.1px solid black; width : 600px; height : 600px; background-image : url('{{ asset('uploads/imageProductVariant/' . $tes) }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                        class="{{ $product->name }}-main-image-back">
                                        <div class="layer-{{ $product->id }}-back position-relative"
                                            style="width : {{ $product->mockup->width_canvas }}px; top : {{ $product->mockup->top_canvas }}px; left : {{ $product->mockup->left_canvas }}px; height : {{ $product->mockup->height_canvas }}px; border : 1px dashed black">
                                        </div>
                                    </div>
                                </div>

                                <p class="text-center fs-6">Format file PNG transparan</p>
                                <p class="text-center fs-6" style="margin-top: -20px">Minimal resolusi desain 2500px dan maksimal resolusi desain</p>
                            </div>


                            <div class="col-lg-5">
                                <h6 class="mt-3 ms-1">Style :</h6>

                                <select class="form-select style" id="style-{{ $product->name }}" aria-label="Default select example" data-name="{{ $product->name }}" data-idProduct="{{ $product->id }}">
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
                                        @if ($product->productvariants->where('view', 'Back')->groupBy('style.name')->first())
                                            @foreach ($product->productvariants->where('view', 'Back')->groupBy('style.name')->first() as $productVariant)
                                            <div style="width : 40px; height : 40px; background-color : {{ $productVariant->color }}; border : 2px solid silver"
                                                class="color-back" id="{{ $product->name }}" data-color="{{ $productVariant->color }}" data-id="{{ $productVariant->id }}" data-idProduct="{{ $product->id }}" data-image="{{ $productVariant->image }}" data-name="{{ $product->name }}">
                                            </div>
                                            @endforeach
                                        @endif

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
                                    <input id="{{ $product->name }}-harga-back" style="background-color: #c0c0c0" type="text" class="w-100 text-dark"
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
                    <div class="col-lg-7" id="preview-image">

                        <div id="tshirt-capture" style="width : 600px; height : 600px">
                            <div style="border: 0.1px solid black; width : 600px; height : 600px; background-image : url('{{ asset('uploads/imageProductVariant/' . $products[0]->productvariants->first()->image) }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                class="{{ $products[0]->name }}-main-image-2">
                                <div class="layer-step-2-{{ $products[0]->id }} position-relative"
                                    style="width : {{ $products[0]->mockup->width_canvas }}px; top : {{ $products[0]->mockup->top_canvas }}px; left : {{ $products[0]->mockup->left_canvas }}px; height : {{ $products[0]->mockup->height_canvas }}px; ">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-5">
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
                                <input type="text" id="{{ $products[0]->name }}-harga-dasar" value="{{ $products[0]->price }}" class="border-0" disabled>
                                {{-- <p id="{{ $products[0]->name }}-harga-dasar">{{ $products[0]->price }}</p> --}}
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
                            <div class="col-lg-6">
                                <p id="{{ $products[0]->name }}-harga-jual"></p>
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
                    <div class="col-lg-7" id="preview-image">
                        <div id="tshirt-capture" style="width : 600px; height : 600px">
                            <div style="border: 0.1px solid black; width : 600px; height : 600px; background-repeat : no-repeat; background-size : 100% 100%"
                                class="main-image">
                                <div class="sticker-layer-step-2 position-relative" id="container-2"
                                    style="width : 200px; top : 40px; left : 150px; height : 380px; ">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-5">
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
                                <input type="text" id="{{ $product->name }}-harga-dasar" value="{{ $product->price }}" class="border-0" disabled>
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
                            <div class="col-lg-6">
                                <p id="{{ $product->name }}-harga-jual"></p>
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
                    <div class="col-lg-7" id="preview-image">
                        <div id="tshirt-capture" style="width : 600px; height : 600px">
                            <div style="border: 0.1px solid black; width : 600px; height : 600px; background-image : url('{{ asset('uploads/imageProductVariant/' . $product->productvariants->first()->image) }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                class="{{ $product->name }}-main-image-2">
                                <div class="layer-step-2-{{ $product->id }} position-relative"
                                    style="width : {{ $product->mockup->width_canvas }}px; top : {{ $product->mockup->top_canvas }}px; left : {{ $product->mockup->left_canvas }}px; height : {{ $product->mockup->height_canvas }}px; ">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-5">
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
                                <input type="text" id="{{ $product->name }}-harga-dasar" value="{{ $product->price }}" class="border-0" disabled>
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
                            <div class="col-lg-6">
                                <p id="{{ $product->name }}-harga-jual"></p>
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
                        <input type="text" class="form-control" id="url" value="" disabled>
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
    {{-- <script src="{{ asset('assets/js/upload-design.js') }}"></script> --}}

    <script>
            let tes = @js($products);

            // front
            let stage = [];
            tes.forEach(element => {
                if(element.category_id == '6') {
                    return;
                }
                let stage = new Konva.Stage({
                    container: `.layer-${element.id}`,
                    width: element.mockup.width_canvas,
                    height: element.mockup.height_canvas,
                });

                var layer = new Konva.Layer();
                stage.add(layer);
            });


            //sticker
            var stage6 = new Konva.Stage({
                container: 'container',

            });

            var layer6 = new Konva.Layer();
            stage6.add(layer6);


            // back
            let stageBack = [];
            tes.forEach(element => {
                if(element.category_id == '6') {
                    return;
                }
                let stage = new Konva.Stage({
                    container: `.layer-${element.id}-back`,
                    width: element.mockup.width_canvas,
                    height: element.mockup.height_canvas,
                });

                var layer = new Konva.Layer();
                stage.add(layer);
            });

            //sticker
            var stage6 = new Konva.Stage({
                container: 'container',
            });

            var layer6 = new Konva.Layer();
            stage6.add(layer6);


            // file input front
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


            //file input back
            let urlImageBack;
            let theImgBack;
            $(".file_input_back").change(function(e) {


                var URL = window.webkitURL || window.URL;
                var url = URL.createObjectURL(e.target.files[0]);
                var img = new Image();
                img.src = url;
                urlImageBack = url;


                $('#design-image-back').attr('src', url);
                $('.step-1').removeAttr('disabled');


                img.onload = function() {

                    // now load the Konva image
                    if(theImgBack) {

                        theImgBack.destroy();

                        deleteImage(img)
                        settingImage(img);
                        stickerImage(url, 'container');


                        } else {
                            let data = tes.filter(el => {
                                let d = el.productvariants.filter(e => e.view == 'Back');

                                return el.id == d[0]?.product_id;
                            })

                            data.forEach(el => {
                                $(`#${el.name}-harga`).val(parseInt(el.price) + 10000)
                                $(`#${el.name}-harga-back`).val(parseInt(el.price) + 10000)
                                console.log($(`#${el.name}-harga-dasar`).val(parseInt(el.price) + 10000))
                            })
                            settingImageBack(img);

                            // stickerImage(url, 'container');
                        }

                }
            });


//front delete image
function deleteImage(img) {
    tes.forEach(element => {
        if(element.category_id == '6') {
            return;
        }
        let staging = new Konva.Stage({
            container: `.layer-${element.id}`,
            width: element.mockup.width_canvas,
            height: element.mockup.height_canvas,
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

//Sticker Image
function stickerImage(url, cl) {
    var stage6 = new Konva.Stage({
        container: cl,
        width: 500,
        height: 500,
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
        width: 300,
        height: 300,
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

//front setting image
function settingImage(img) {
    tes.forEach(element => {
        if(element.category_id == '6') {
            return;
        }
        let staging = new Konva.Stage({
            container: `.layer-${element.id}`,
            width: element.mockup.width_canvas,
            height: element.mockup.height_canvas,
        });

        var layer = new Konva.Layer();
        var img_width = img.width;
        var img_height = img.height;
        staging.add(layer);

        theImg = new Konva.Image({
            id: `rect-${element.id}`,
            name : 'rect',
            image: img,
            x: 5,
            y: 5,
            width: img_width/7,
            height: img_height/7,
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

// delete image back
function deleteImageBack(img) {
    tes.forEach(element => {
        if(element.category_id == '6') {
            return;
        }
        let staging = new Konva.Stage({
            container: `.layer-${element.id}-back`,
            width: element.mockup.width_canvas,
            height: element.mockup.height_canvas,
        });

        var layer = new Konva.Layer();
        var img_width = img.width;
        var img_height = img.height;
        staging.add(layer);

        theImg = new Konva.Image({
            id: `rect-${element.id}-back`,
            name : 'rect',
            image: img,
            x: 5,
            y: 5,
            width: img_width/7,
            height: img_height/7,
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

        stageBack.push(staging)

        stageBack = []


        layer.destroy();
        staging.destroy()
    });
}

//sticker image back
function stickerImageBack(url, cl) {
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
        width: 280,
        height: 280,
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

//setting image back
function settingImageBack(img) {

    let data = tes.filter(el => {
        let d = el.productvariants.filter(e => e.view == 'Back');

        return el.id == d[0]?.product_id;
    })

    data.forEach(element => {
        if(element.category_id == '6') {
            return;
        }
        let staging = new Konva.Stage({
            container: `.layer-${element.id}-back`,
            width: element.mockup.width_canvas,
            height: element.mockup.height_canvas,
        });

        var layer = new Konva.Layer();
        var img_width = img.width;
        var img_height = img.height;
        staging.add(layer);

        theImg = new Konva.Image({
            id: `rect-${element.id}-back`,
            name : 'rect',
            image: img,
            x: 26,
            y: 10,
            width: img_width/7,
            height: img_height/7,
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

        stageBack.push(staging)
    });
}




        let imageDefaultColor = [];
        let clickColor = [];
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

            if(clickColor.length) {

                const usersMale = clickColor.filter((user) => user.dataIdProduct !== dataIdProduct);

                usersMale.push({dataIdProduct, color});
                clickColor = usersMale;

            }

            if(!clickColor.length) {
                clickColor.push({dataIdProduct, color});
            }


            document.querySelector(`.${name}-main-image`).style.backgroundImage =
            `url('{{ asset('uploads/imageProductVariant/${image}') }}')`;
            document.querySelector(`.${name}-main-image-2`).style.backgroundImage =
            `url('{{ asset('uploads/imageProductVariant/${image}') }}')`;

            $('#style-step-2').attr('data-color', color);
        })


        let imageDefaultColorBack = [];
        let clickColorBack = [];
        $(document).on('click', '.color-back' , function () {
            // imageDefaultColor.push({$(this).attr('data-id')});

            let dataIdProductVariant = $(this).attr('data-id');
            let image = $(this).attr('data-image');
            let dataIdProduct = $(this).attr('data-idProduct');


            if(imageDefaultColorBack.length) {

                const usersMale = imageDefaultColorBack.filter((user) => user.dataIdProduct !== dataIdProduct);

                usersMale.push({dataIdProduct, dataIdProductVariant, image});
                imageDefaultColorBack = usersMale;

            }

            if(!imageDefaultColorBack.length) {
                imageDefaultColorBack.push({dataIdProduct, dataIdProductVariant, image});
            }

            let name = $(this).attr('data-name');
            let color = $(this).attr('data-color');

            if(clickColorBack.length) {

                const usersMale = clickColorBack.filter((user) => user.dataIdProduct !== dataIdProduct);

                usersMale.push({dataIdProduct, color});
                clickColorBack = usersMale;

            }

            if(!clickColorBack.length) {
                clickColorBack.push({dataIdProduct, color});
            }

            if(clickColor.length) {
                let data = clickColor.filter(el => el.dataIdProduct == dataIdProduct);
                document.querySelector(`.${name}-main-image-back`).style.backgroundImage =
                `url('{{ asset('uploads/imageProductVariant/${image}') }}')`;
            }


            document.querySelector(`.${name}-main-image-back`).style.backgroundImage =
            `url('{{ asset('uploads/imageProductVariant/${image}') }}')`;
            // document.querySelector(`.${name}-main-image-2`).style.backgroundImage =
            // `url('{{ asset('uploads/imageProductVariant/${image}') }}')`;

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

            let hargaDasar = parseInt($(`#${product}-harga-dasar`).val()) + parseInt($(`#price-${product}`).val());
            $(`#${product}-harga-jual`).text(hargaDasar)




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
                tes.forEach(el => {
                    if(el.id == element.id) {
                        getImg(`.layer-step-2-${element.id}`, el.mockup.width_canvas, el.mockup.height_canvas, urlImage, element.find(`#rect-${element.id}`)[0].absolutePosition().x, element.find(`#rect-${element.id}`)[0].absolutePosition().y, element.find(`#rect-${element.id}`)[0].width() * element.find(`#rect-${element.id}`)[0].scaleX(), element.find(`#rect-${element.id}`)[0].height() * element.find(`#rect-${element.id}`)[0].scaleY(), element.find(`#rect-${element.id}`)[0].getAbsoluteRotation());
                    }
                })

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
            let idProduct = $(this).attr('data-idProduct');

            let products = @js($products).filter(el => el.name == name);
            let productVariants = products.map(el => {
                return el.productvariants.filter(e => e.style.name == value && e.view == 'front')
            });

            let colorFilter = clickColor.filter((el) => {
                return el.dataIdProduct == idProduct
            })

            if(value == 'Lengan Panjang') {
                $(".back-image").addClass('d-none')
            }

            if(value == 'Lengan Pendek') {
                $(".back-image").removeClass('d-none')
            }


            if(colorFilter.length) {
                let products = @js($products).filter(el => el.name == name);
                let productVariants = products.map(el => {
                    return el.productvariants.filter(e => e.style.name == value && e.view == 'front' && e.color == colorFilter[0].color)
                });

                document.querySelector(`.${name}-main-image`).style.backgroundImage = `url('{{ asset('uploads/imageProductVariant/${productVariants[0][0].image}') }}')`;
            } else{
                document.querySelector(`.${name}-main-image`).style.backgroundImage = `url('{{ asset('uploads/imageProductVariant/${productVariants[0][0].image}') }}')`;
            }


            const priceProduct = groupBy(productVariants[0], 'product_id');
            $(`#${name}-harga`).val(priceProduct[idProduct][0].price)

            $(`#${name}-color`).html(productVariants[0].map(el => {
                    return `<div style="width : 40px; height : 40px; background-color : ${el.color}; border : 2px solid silver"
                                class="color" id="${value}" data-image="${el.image}" data-name="${name}" data-color="${el.color}" data-idProduct="${idProduct}">
                            </div>`
            }))

        })


        let groupBy = (element, key) => {
            return element.reduce((value, x) => {
                (value[x[key]] = value[x[key]] || []).push(x);
                return value;
            }, {});
        };


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

            $(`#${name}-harga-dasar`).text(productVariants[0][0].price)

            $(`#${name}-harga-jual`).text(parseInt($(`#${name}-harga-dasar`).text()) + parseInt($(`#price-${name}`).val()))

            document.querySelector(`.${name}-main-image-2`).style.backgroundImage = `url('{{ asset('uploads/imageProductVariant/${productVariants[0][0].image}') }}')`;


            $(`#${name}-color`).html(productVariants[0].map(el => {
                    return `<div style="width : 40px; height : 40px; background-color : ${el.color}; border : 2px solid silver"
                                class="color" id="${value}" data-image="${el.image}" data-name="${name}">
                            </div>`
            }))

        })

        $('.front-image').on('click', function() {

            $('.image-front').removeClass('d-none');
            $('.navbar-front').removeClass('d-none');
            $('.tab-front').removeClass('d-none');

            $('.image-back').addClass('d-none');
            $('.navbar-back').addClass('d-none');
            $('.tab-back').addClass('d-none');

            if(clickColorBack.length) {

                console.log(clickColorBack)
                clickColorBack.forEach(el => {
                    let products = @js($products);
                    let data = products.filter(e => e.id == el.dataIdProduct);
                    let productVariants = data[0].productvariants;
                    let imageBack = productVariants.filter(e => e.view == 'front' && e.color == el.color)

                    document.querySelector(`.${data[0].name}-main-image`).style.backgroundImage = `url('{{ asset('uploads/imageProductVariant/${imageBack[0].image}') }}')`;
                });

                }
            // let idProduct = $(this).attr('data-id');
            // let view = $(this).attr('data-view');
            // let name = $(this).attr('data-name');
            // let style = $(`#style-${name}`).find(':selected').val();
            // let products = @js($products).filter(element => element.id == idProduct);
            // let productVariants = products[0].productvariants.filter(el => el.view == view && el.style.name == style)

            // let color = clickColor.filter((el) => {
            //     return el.dataIdProduct == idProduct
            // })

            // if(color.length) {
            //     let products = @js($products).filter(element => element.id == idProduct);
            //     let productVariants = products[0].productvariants.filter(el => el.view == view && el.style.name == style && el.color == color[0].color)

            //     document.querySelector(`.${name}-main-image `).style.backgroundImage = `url('{{ asset('uploads/imageProductVariant/${productVariants[0].image}') }}')`;

            // } else {
            //     document.querySelector(`.${name}-main-image `).style.backgroundImage = `url('{{ asset('uploads/imageProductVariant/${productVariants[0].image}') }}')`;

            // }


            // $(`#${name}-color`).html(productVariants.map(el => {
            //         return `<div style="width : 40px; height : 40px; background-color : ${el.color}; border : 2px solid silver"
            //                     class="color" id="${style}" data-image="${el.image}" data-name="${name}" data-color="${el.color}" data-idProduct="${idProduct}">
            //                 </div>`
            // }))
        })

        $('.back-image').on('click', function() {
            $('.image-back').removeClass('d-none');
            $('.navbar-back').removeClass('d-none');
            $('.tab-back').removeClass('d-none');

            $('.image-front').addClass('d-none');
            $('.navbar-front').addClass('d-none');
            $('.tab-front').addClass('d-none');

            let name = $(this).attr('data-name');

            if(clickColor.length) {


                clickColor.forEach(el => {
                    let products = @js($products);
                    let data = products.filter(e => e.id == el.dataIdProduct);
                    let productVariants = data[0].productvariants;
                    let imageBack = productVariants.filter(e => e.view == 'Back' && e.color == el.color)

                    document.querySelector(`.${data[0].name}-main-image-back`).style.backgroundImage = `url('{{ asset('uploads/imageProductVariant/${imageBack[0].image}') }}')`;
                });

            }
            // let idProduct = $(this).attr('data-id');
            // let view = $(this).attr('data-view');
            // let style = $(`#style-${name}`).find(':selected').val();

            // let products = @js($products).filter(element => element.id == idProduct);
            // let productVariants = products[0].productvariants.filter(el => el.view == view && el.style.name == style)

            // let color = clickColor.filter((el) => {
            //     return el.dataIdProduct == idProduct
            // })


            // if(color.length) {
            //     let products = @js($products).filter(element => element.id == idProduct);
            //     let productVariants = products[0].productvariants.filter(el => el.view == view && el.style.name == style && el.color == color[0].color)

            //     document.querySelector(`.${name}-main-image `).style.backgroundImage = `url('{{ asset('uploads/imageProductVariant/${productVariants[0]?.image}') }}')`;

            // } else {
            //     document.querySelector(`.${name}-main-image `).style.backgroundImage = `url('{{ asset('uploads/imageProductVariant/${productVariants[0]?.image}') }}')`;
            // }




            //     $(`#${name}-color`).html(productVariants.map(el => {
            //         return `<div style="width : 40px; height : 40px; background-color : ${el.color}; border : 2px solid silver"
            //                     class="color" id="${style}" data-image="${el.image}" data-name="${name}" data-color="${el.color}" data-idProduct="${idProduct}">
            //                 </div>`
            // }))


        })



        $('#submit').click(function() {

            // kasih harga di step harga
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
                let productsBack = stageBack.filter(el => el.id == element.id);

                window.livewire.emit('submitForm', {
                    'title' : title,
                    'description' : description,
                    'designCategoryId' : designCategoryId,
                    'imageDefaultColor' : productVariant ? productVariant.dataIdProductVariant : products[0].productvariants[0].id,
                    'productId' : element.id,
                    'tags' : tags,
                    'slug' : title,
                    'width' : element.find(`#rect-${element.id}`)[0].width() * element.find(`#rect-${element.id}`)[0].scaleX(),
                    'height' : element.find(`#rect-${element.id}`)[0].height() * element.find(`#rect-${element.id}`)[0].scaleY(),
                    'sumbu_x' : element.find(`#rect-${element.id}`)[0].absolutePosition().x,
                    'sumbu_y' : element.find(`#rect-${element.id}`)[0].absolutePosition().y,
                    'rotation' : element.find(`#rect-${element.id}`)[0].getAbsoluteRotation(),
                    'price' : prices[count++]
                });

                if(productsBack.length) {
                        window.livewire.emit('submitFormBack', {
                            'title' : title,
                            'description' : description,
                            'designCategoryId' : designCategoryId,
                            'productId' : element.id,
                            'tags' : tags,
                            'slug' : title,
                            'width' : productsBack[0]?.find(`#rect-${element.id}-back`)[0].width() * productsBack[0]?.find(`#rect-${element.id}-back`)[0].scaleX(),
                            'height' : productsBack[0]?.find(`#rect-${element.id}-back`)[0].height() * productsBack[0]?.find(`#rect-${element.id}-back`)[0].scaleY(),
                            'sumbu_x' : productsBack[0]?.find(`#rect-${element.id}-back`)[0].absolutePosition().x,
                            'sumbu_y' : productsBack[0]?.find(`#rect-${element.id}-back`)[0].absolutePosition().y,
                            'rotation' : productsBack[0]?.find(`#rect-${element.id}-back`)[0].getAbsoluteRotation(),
                        });
                }
            })

            window.livewire.emit('submitForm', {
                    'title' : title,
                    'description' : description,
                    'designCategoryId' : designCategoryId,
                    'imageDefaultColor' : '1',
                    'productId' : 6,
                    'tags' : tags,
                    'slug' : title,
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
        $('#title').on('keyup', function() {
            $('#url').val("{{ url($link->first_name) . '/' }}" + slug($('#title').val()));
        })

        function slug(text) {
            return text.toString().toLowerCase().replace(/\s+/g, '-') // Ganti spasi dengan -
                .replace(/[^\w\-]+/g, '') // Hapus semua karakter non-word
                .replace(/\-\-+/g, '-') // Ganti multiple - atau single -
                .replace(/^-+/, '')
                .replace(/-+$/, '');
        }

    </script>

</div>


