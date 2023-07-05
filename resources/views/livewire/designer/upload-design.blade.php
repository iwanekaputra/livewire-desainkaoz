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
            <div class="col-lg-4 " style="{{ $step === 1 ? 'background-color: #9da19e' : 'background-color: silver' }}">
                <h3 class="text-center mt-2" style="font-family: 'Myriad-Pro Bold';">Upload Design</h3>
            </div>
            <div class="col-lg-4" style="{{ $step === 2 ? 'background-color: #9da19e' : 'background-color: silver' }}">
                <h3 class="text-center mt-2" style="font-family: 'Myriad-Pro Bold';">Harga</h3>
            </div>
            <div class="col-lg-4" style="{{ $step === 3 ? 'background-color: #9da19e' : 'background-color: silver' }}">
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
                <h1 class="text-center"><button class="btn btn-warning rounded-0 ms-3"
                        onclick="document.querySelector('.file_input').click()">Upload Image</button></h1>
                <input type="file" class="file_input" style="display: none" wire:model="imageDesign">
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-12">
                <ul class="nav nav-tabs w-100 justify-content-evenly border-0" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tshirt-tab" data-bs-toggle="tab"
                            data-bs-target="#tshirt-tab-pane" type="button" role="tab"
                            aria-controls="tshirt-tab-pane" aria-selected="true">
                            <img src="{{ asset('storage/produk/tshirt.png') }}" alt="" width="75">
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="hoodie-tab" data-bs-toggle="tab"
                            data-bs-target="#hoodie-tab-pane" type="button" role="tab"
                            aria-controls="hoodie-tab-pane" aria-selected="false">
                            <img src="{{ asset('storage/produk/hoodie.png') }}" alt="" width="75">
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="sweater-tab" data-bs-toggle="tab"
                            data-bs-target="#sweater-tab-pane" type="button" role="tab"
                            aria-controls="sweater-tab-pane" aria-selected="false">
                            <img src="{{ asset('storage/produk/sweater.png') }}" alt="" width="75">
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="hat-tab" data-bs-toggle="tab" data-bs-target="#hat-tab-pane"
                            type="button" role="tab" aria-controls="hat-tab-pane" aria-selected="false">
                            <img src="{{ asset('storage/produk/topi.png') }}" alt="" width="75">
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="bag-tab" data-bs-toggle="tab"
                            data-bs-target="#bag-tab-pane" type="button" role="tab"
                            aria-controls="bag-tab-pane" aria-selected="false">
                            <img src="{{ asset('storage/produk/bag.png') }}" alt="" width="75">
                        </button>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                    <button class="nav-link" id="sticker-tab" data-bs-toggle="tab" data-bs-target="#sticker-tab-pane" type="button" role="tab" aria-controls="sticker-tab-pane" aria-selected="false">
                        <img src="{{ asset('storage/produk/sticker.png') }}" alt="" width="100">
                    </button>
                </li> --}}

                </ul>
            </div>
        </div>

        {{-- tab tshirt --}}
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tshirt-tab-pane" role="tabpanel"
                aria-labelledby="tshirt-tab" tabindex="0">
                <div class="row mt-5">
                    <div class="col-lg-7">
                        <div id="tshirt-capture" style="width : 500px; height : 500px">
                            <div style="width : 500px; height : 500px; background-image : url('{{ asset('assets/img/tshirt-black.png') }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                id="tshirt-main-image">
                                <div class="tshirt-layer position-relative"
                                    style="width : 200px; top : 40px; left : 150px; height : 380px; ">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-5">
                        <button class="btn rounded-0 w-100 file_input" style="background-color: #c0c0c0"
                            onclick="document.querySelector('.file_input').click()">Replace Image</button>
                        <h6 class="mt-3 ms-1">Style :</h6>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Lengan Pendek</option>
                            <option value="1">Lengan Panjang</option>
                        </select>


                        <hr>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-dark rounded-0" style="width : 45%"
                                id="front-image">Front</button>
                            <button class="btn btn-dark rounded-0" style="width : 45%"
                                id="back-image">Back</button>
                        </div>

                        <div class="mt-4">
                            <h6>Color : Black</h6>
                            <div class="mt-3 d-flex gap-2">
                                <div style="width : 40px; height : 40px; background-color : #141414; border : 2px solid silver"
                                    class="tshirt-color" data-image="tshirt-black.png">
                                </div>
                                <div style="width : 40px; height : 40px; background-color : #fff; border : 2px solid silver"
                                    class="tshirt-color" data-image="tshirt-white.png">
                                </div>
                                <div style="width : 40px; height : 40px; background-color : #7b7b7b; border : 2px solid #silver"
                                    class="tshirt-color" data-image="tshirt-silver.png">
                                </div>
                                <div style="width : 40px; height : 40px; background-color : #a60707; border : 2px solid silver"
                                    class="tshirt-color" data-image="tshirt-red.png">
                                </div>
                                <div style="width : 40px; height : 40px; background-color : #4c5d34; border : 2px solid silver"
                                    class="tshirt-color" data-image="tshirt-green.png">
                                </div>
                                <div style="width : 40px; height : 40px; background-color : #252c5f; border : 2px solid silver"
                                    class="tshirt-color" data-image="tshirt-blue.png">
                                </div>
                                <div style="width : 40px; height : 40px; background-color : #e47200; border : 2px solid silver"
                                    class="tshirt-color" data-image="tshirt-yellow.png">
                                </div>
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
                                value="100000" disabled>
                        </div>
                        <hr>
                        <button class="btn btn-dark rounded-0 step-1" style="width : 45%"
                            type="button">Next</button>
                    </div>
                </div>
            </div>

            {{-- tab hoodie --}}
            <div class="tab-pane fade" id="hoodie-tab-pane" role="tabpanel" aria-labelledby="hoodie-tab"
                tabindex="0">
                <div class="row mt-5">
                    <div class="col-lg-7">
                        <div id="hoodie-capture" style="width : 500px; height : 500px">
                            <div style="width : 500px; height : 500px; background-image : url('{{ asset('assets/img/hoodie-black.jpg') }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                id="hoodie-main-image">
                                <div class="hoodie-layer position-relative"
                                    style="width : 200px; top : 100px; left : 150px; height : 240px; ">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <button class="btn rounded-0 w-100 file_input" style="background-color: #c0c0c0"
                            onclick="document.querySelector('.file_input').click()">Replace Image</button>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-dark rounded-0" style="width : 45%"
                                id="front-image">Front</button>
                            <button class="btn btn-dark rounded-0" style="width : 45%"
                                id="back-image">Back</button>
                        </div>
                        <div class="mt-4">
                            <h6>Color : Black</h6>
                            <div class="mt-3 d-flex gap-2">
                                <div style="width : 40px; height : 40px; background-color : #2f2f2f; border : 2px solid silver"
                                    class="hoodie-color" data-image="hoodie-black.jpg"></div>
                                <div style="width : 40px; height : 40px; background-color : #f0f0f0; border : 2px solid silver"
                                    class="hoodie-color" data-image="hoodie-white.jpg"></div>
                                <div style="width : 40px; height : 40px; background-color : #995f2f; border : 2px solid silver"
                                    class="hoodie-color" data-image="hoodie-chocolate.png"></div>
                                <div style="width : 40px; height : 40px; background-color : #44672f; border : 2px solid silver"
                                    class="hoodie-color" data-image="hoodie-green.jpg"></div>
                                <div style="width : 40px; height : 40px; background-color : #ad322d; border : 2px solid silver"
                                    class="hoodie-color" data-image="hoodie-red.jpg"></div>
                                <div style="width : 40px; height : 40px; background-color : #3d4367; border : 2px solid silver"
                                    class="hoodie-color" data-image="hoodie-navy.jpg"></div>
                                <div style="width : 40px; height : 40px; background-color : #ab7a2b; border : 2px solid silver"
                                    class="hoodie-color" data-image="hoodie-yellow.jpg"></div>
                                <div style="width : 40px; height : 40px; background-color : #6e6e6e; border : 2px solid silver"
                                    class="hoodie-color" data-image="hoodie-silver.jpg"></div>
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
                                value="100000" disabled>
                        </div>
                        <hr>
                        <button class="btn btn-dark rounded-0 step-1" style="width : 45%"
                            type="button">Next</button>
                    </div>
                </div>
            </div>

            {{-- tab sweater --}}
            <div class="tab-pane fade" id="sweater-tab-pane" role="tabpanel" aria-labelledby="sweater-tab"
                tabindex="0">
                <div class="row mt-5">
                    <div class="col-lg-7">
                        <div id="sweater-capture" style="width : 500px; height : 500px">
                            <div style="width : 500px; height : 500px; background-image : url('{{ asset('assets/img/sweater-black.png') }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                id="sweater-main-image">
                                <div class="sweater-layer position-relative"
                                    style="width : 200px; top : 40px; left : 150px; height : 380px; ">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <button class="btn rounded-0 w-100 file_input" style="background-color: #c0c0c0"
                            onclick="document.querySelector('.file_input').click()">Replace Image</button>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-dark rounded-0" style="width : 45%"
                                id="front-image">Front</button>
                            <button class="btn btn-dark rounded-0" style="width : 45%"
                                id="back-image">Back</button>
                        </div>
                        <div class="mt-4">
                            <h6>Color : Black</h6>
                            <div class="mt-3 d-flex gap-2">
                                <div style="width : 40px; height : 40px; background-color : #242220; border : 2px solid silver"
                                    class="sweater-color" data-image="sweater-black.png"></div>
                                <div style="width : 40px; height : 40px; background-color : #f0f0f0; border : 2px solid silver"
                                    class="sweater-color" data-image="sweater-white.png"></div>
                                <div style="width : 40px; height : 40px; background-color : #828282; border : 2px solid silver"
                                    class="sweater-color" data-image="sweater-silver.png"></div>
                                <div style="width : 40px; height : 40px; background-color : #2d4821; border : 2px solid silver"
                                    class="sweater-color" data-image="sweater-green.png"></div>
                                <div style="width : 40px; height : 40px; background-color : #851d1d; border : 2px solid silver"
                                    class="sweater-color" data-image="sweater-red.png"></div>
                                <div style="width : 40px; height : 40px; background-color : #212f49; border : 2px solid silver"
                                    class="sweater-color" data-image="sweater-navy.png"></div>
                                <div style="width : 40px; height : 40px; background-color : #c47d21; border : 2px solid silver"
                                    class="sweater-color" data-image="sweater-yellow.png"></div>

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
                                value="100000" disabled>
                        </div>
                        <hr>
                        <button class="btn btn-dark rounded-0 step-1" style="width : 45%"
                            type="button">Next</button>
                    </div>
                </div>
            </div>


            {{-- tab hat --}}
            <div class="tab-pane fade" id="hat-tab-pane" role="tabpanel" aria-labelledby="hat-tab"
                tabindex="0">
                <div class="row mt-5">
                    <div class="col-lg-7">
                        <div id="hat-capture" style="width : 500px; height : 500px">
                            <div style="width : 500px; height : 500px; background-image : url('{{ asset('assets/img/hat-black.png') }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                id="hat-main-image">
                                <div class="hat-layer position-relative"
                                    style="width : 200px; top : 100px; left : 150px; height : 200px; ">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <button class="btn rounded-0 w-100 file_input" style="background-color: #c0c0c0"
                            onclick="document.querySelector('.file_input').click()">Replace Image</button>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-dark rounded-0" style="width : 45%"
                                id="front-image">Front</button>
                            <button class="btn btn-dark rounded-0" style="width : 45%"
                                id="back-image">Back</button>
                        </div>
                        <div class="mt-4">
                            <h6>Color : Black</h6>
                            <div class="mt-3 d-flex gap-2">
                                <div style="width : 40px; height : 40px; background-color : #000; border : 2px solid silver"
                                    class="hat-color" data-image="hat-black.png"></div>
                                <div style="width : 40px; height : 40px; background-color : #fff; border : 2px solid silver"
                                    class="hat-color" data-image="hat-white.png"></div>
                                <div style="width : 40px; height : 40px; background-color : #395b22; border : 2px solid silver"
                                    class="hat-color" data-image="hat-green.png"></div>
                                <div style="width : 40px; height : 40px; background-color : #ad0000; border : 2px solid silver"
                                    class="hat-color" data-image="hat-red.png"></div>
                                <div style="width : 40px; height : 40px; background-color : #324a6f; border : 2px solid silver"
                                    class="hat-color" data-image="hat-blue.png"></div>
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
                                value="100000" disabled>
                        </div>
                        <hr>
                        <button class="btn btn-dark rounded-0 step-1" style="width : 45%"
                            type="button">Next</button>
                    </div>
                </div>
            </div>

            {{-- tab bag --}}
            <div class="tab-pane fade" id="bag-tab-pane" role="tabpanel" aria-labelledby="bag-tab"
                tabindex="0">
                <div class="row mt-5">
                    <div class="col-lg-7">
                        <div id="bag-capture" style="width : 500px; height : 500px">
                            <div style="width : 500px; height : 500px; background-image : url('{{ asset('assets/img/bag-black.png') }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                id="bag-main-image">
                                <div class="bag-layer position-relative"
                                    style="width : 270px; top : 240px; left : 120px; height : 220px; ">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <button class="btn rounded-0 w-100 file_input" style="background-color: #c0c0c0"
                            onclick="document.querySelector('.file_input').click()">Replace Image</button>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-dark rounded-0" style="width : 45%"
                                id="front-image">Front</button>
                            <button class="btn btn-dark rounded-0" style="width : 45%"
                                id="back-image">Back</button>
                        </div>
                        <div class="mt-4">
                            <h6>Color : Black</h6>
                            <div class="mt-3 d-flex gap-2">
                                <div style="width : 40px; height : 40px; background-color : #000; border : 2px solid silver"
                                    class="bag-color" data-image="bag-black.png"></div>
                                <div style="width : 40px; height : 40px; background-color : #fff; border : 2px solid silver"
                                    class="bag-color" data-image="bag-white.png"></div>


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
                                value="100000" disabled>
                        </div>
                        <hr>
                        <button class="btn btn-dark rounded-0 step-1" style="width : 45%"
                            type="button">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end step 1 --}}

    {{-- step 2 --}}
    <div class="main step2 d-none">
        <div class="row mt-2">
            <div class="col-lg-12">
                <ul class="nav nav-tabs w-100 justify-content-evenly border-0" id="myTab" role="tablist"
                    wire:ignore>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tshirt-tab-step-2" data-bs-toggle="tab"
                            data-bs-target="#tshirt-tab-pane-step-2" type="button" role="tab"
                            aria-controls="tshirt-tab-pane-step-2" aria-selected="true">
                            <img src="{{ asset('storage/produk/tshirt.png') }}" alt="" width="75">
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="hoodie-tab-step-2" data-bs-toggle="tab"
                            data-bs-target="#hoodie-tab-pane-step-2" type="button" role="tab"
                            aria-controls="hoodie-tab-pane-step-2" aria-selected="false">
                            <img src="{{ asset('storage/produk/hoodie.png') }}" alt="" width="75">
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="sweater-tab-step-2" data-bs-toggle="tab"
                            data-bs-target="#sweater-tab-pane-step-2" type="button" role="tab"
                            aria-controls="sweater-tab-pane-step-2" aria-selected="false">
                            <img src="{{ asset('storage/produk/sweater.png') }}" alt="" width="75">
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="hat-tab-step-2" data-bs-toggle="tab" data-bs-target="#hat-tab-pane-step-2"
                            type="button" role="tab" aria-controls="hat-tab-pane-step-2" aria-selected="false">
                            <img src="{{ asset('storage/produk/topi.png') }}" alt="" width="75">
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="bag-tab-step-2" data-bs-toggle="tab" data-bs-target="#bag-tab-pane-step-2"
                            type="button" role="tab" aria-controls="bag-tab-pane-step-2" aria-selected="false">
                            <img src="{{ asset('storage/produk/bag.png') }}" alt="" width="75">
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        {{-- tab tshirt step 2 --}}
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tshirt-tab-pane-step-2" role="tabpanel" aria-labelledby="tshirt-tab"
                tabindex="0" wire:ignore.self>
                <div class="row mt-5">
                    <div class="col-lg-6" id="preview-image">
                        <img class="border" id="tshirt-image-step-2" alt="" width="400">
                    </div>


                    <div class="col-lg-6">
                        <h4><strong>T Shirt</strong> Lengan pendek</h4>

                        <div class="mt-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="mt-2"><strong>Profit Estimator for: </strong></p>
                                    <p class="mt-4"><strong>Harga Dasar: </strong></p>
                                    <p class="mt-3"><strong>Royalti Desain </strong></p>
                                    <p class="mt-4"><strong>Harga Jual: </strong></p>
                                </div>
                                <div class="col-lg-6">
                                    <button class="btn w-100 rounded-0" style="background-color: #c0c0c0">T shirt
                                        lengan pendek</button>
                                    <p class="mt-3" id="tshirt-harga-dasar">100000</p>
                                    <input type="number" class="" id="price-tshirt">
                                    <p class="mt-3" id="tshirt-harga-jual"></p>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td scope="col">10 items</td>
                                            <td id="tshirt-10-items" scope="col" class="text-end">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="col">100 items</td>
                                            <td id="tshirt-100-items" scope="col" class="text-end"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">250 items</td>
                                            <td id="tshirt-250-items" scope="col" class="text-end"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">500 items</td>
                                            <td id="tshirt-500-items" scope="col" class="text-end"></td>
                                        </tr>
                                        <tr class="bg-warning">
                                            <td scope="col">1000 items</td>
                                            <td id="tshirt-1000-items" scope="col" class="text-end"></td>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                            <div class="row">
                                <div class="d-flex justify-content-between mt-4">
                                    <button class="btn btn-dark rounded-0" id="back-step-1" style="width : 45%"><i
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

            {{-- tab hoodie step 2 --}}
            <div class="tab-pane fade" id="hoodie-tab-pane-step-2" role="tabpanel" aria-labelledby="hoodie-tab"
                tabindex="0" wire:ignore.self>
                <div class="row mt-5">
                    <div class="col-lg-6" id="preview-image">
                        <img class="border" id="hoodie-image-step-2" alt="" width="400">
                    </div>


                    <div class="col-lg-6">
                        <h4>Hoodie</h4>

                        <div class="mt-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="mt-2"><strong>Profit Estimator for: </strong></p>
                                    <p class="mt-4"><strong>Harga Dasar: </strong></p>
                                    <p class="mt-3"><strong>Royalti Desain </strong></p>
                                    <p class="mt-4"><strong>Harga Jual: </strong></p>
                                </div>
                                <div class="col-lg-6">
                                    <button class="btn w-100 rounded-0" style="background-color: #c0c0c0">Hoodie bahan
                                        cvc</button>
                                    <p class="mt-3" id="hoodie-harga-dasar">200000</p>
                                    <input type="number" class="" id="price-hoodie">
                                    <p class="mt-3" id="hoodie-harga-jual"></p>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td scope="col">10 items</td>
                                            <td scope="col" class="text-end" id="hoodie-10-items"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">100 items</td>
                                            <td scope="col" class="text-end" id="hoodie-100-items"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">250 items</td>
                                            <td scope="col" class="text-end" id="hoodie-250-items"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">500 items</td>
                                            <td scope="col" class="text-end" id="hoodie-500-items"></td>
                                        </tr>
                                        <tr class="bg-warning">
                                            <td scope="col">1000 items</td>
                                            <td scope="col" class="text-end" id="hoodie-1000-items"></td>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                            <div class="row">
                                <div class="d-flex justify-content-between mt-4">
                                    <button class="btn btn-dark rounded-0" style="width : 45%"><i
                                            class="fa fa-arrow-left" aria-hidden="true"></i>
                                        Back</button>
                                    <button class="btn btn-dark rounded-0" style="width : 45%" id="step-2">Next <i
                                            class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- tab sweater step 2 --}}
            <div class="tab-pane fade" id="sweater-tab-pane-step-2" role="tabpanel" aria-labelledby="sweater-tab"
                tabindex="0" wire:ignore.self>
                <div class="row mt-5">
                    <div class="col-lg-6" id="preview-image">
                        <img class="border" id="sweater-image-step-2" alt="" width="400">
                    </div>


                    <div class="col-lg-6">
                        <h4>Sweater</h4>

                        <div class="mt-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="mt-2"><strong>Profit Estimator for: </strong></p>
                                    <p class="mt-4"><strong>Harga Dasar: </strong></p>
                                    <p class="mt-3"><strong>Royalti Desain </strong></p>
                                    <p class="mt-4"><strong>Harga Jual: </strong></p>
                                </div>
                                <div class="col-lg-6">
                                    <button class="btn w-100 rounded-0" style="background-color: #c0c0c0">Sweater
                                        bahan cvc</button>
                                    <p class="mt-3" id="sweater-harga-dasar">150000</p>
                                    <input type="number" class="" id="price-sweater">
                                    <p class="mt-3" id="sweater-harga-jual"></p>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td scope="col">10 items</td>
                                            <td scope="col" class="text-end" id="sweater-10-items"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">100 items</td>
                                            <td scope="col" class="text-end" id="sweater-100-items"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">250 items</td>
                                            <td scope="col" class="text-end" id="sweater-250-items"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">500 items</td>
                                            <td scope="col" class="text-end" id="sweater-500-items"></td>
                                        </tr>
                                        <tr class="bg-warning">
                                            <td scope="col">1000 items</td>
                                            <td scope="col" class="text-end" id="sweater-1000-items"></td>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                            <div class="row">
                                <div class="d-flex justify-content-between mt-4">
                                    <button class="btn btn-dark rounded-0" style="width : 45%"><i
                                            class="fa fa-arrow-left" aria-hidden="true"></i>
                                        Back</button>
                                    <button class="btn btn-dark rounded-0" style="width : 45%" id="step-2">Next <i
                                            class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- tab hat step 2 --}}
            <div class="tab-pane fade" id="hat-tab-pane-step-2" role="tabpanel" aria-labelledby="hat-tab" tabindex="0"
                wire:ignore.self>
                <div class="row mt-5">
                    <div class="col-lg-6" id="preview-image">
                        <img class="border" id="hat-image-step-2" alt="" width="400">
                    </div>


                    <div class="col-lg-6">
                        <h4>Topi</h4>

                        <div class="mt-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="mt-2"><strong>Profit Estimator for: </strong></p>
                                    <p class="mt-4"><strong>Harga Dasar: </strong></p>
                                    <p class="mt-3"><strong>Royalti Desain </strong></p>
                                    <p class="mt-4"><strong>Harga Jual: </strong></p>
                                </div>
                                <div class="col-lg-6">
                                    <button class="btn w-100 rounded-0" style="background-color: #c0c0c0">Topi
                                        Footballs Canvas</button>
                                    <p class="mt-3" id="hat-harga-dasar">50000</p>
                                    <input type="number" class="" id="price-hat">
                                    <p class="mt-3" id="hat-harga-jual"></p>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td scope="col">10 items</td>
                                            <td scope="col" class="text-end" id="hat-10-items"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">100 items</td>
                                            <td scope="col" class="text-end" id="hat-100-items"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">250 items</td>
                                            <td scope="col" class="text-end" id="hat-250-items"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">500 items</td>
                                            <td scope="col" class="text-end" id="hat-500-items"></td>
                                        </tr>
                                        <tr class="bg-warning">
                                            <td scope="col">1000 items</td>
                                            <td scope="col" class="text-end" id="hat-1000-items"></td>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                            <div class="row">
                                <div class="d-flex justify-content-between mt-4">
                                    <button class="btn btn-dark rounded-0" style="width : 45%"><i
                                            class="fa fa-arrow-left" aria-hidden="true"></i>
                                        Back</button>
                                    <button class="btn btn-dark rounded-0" style="width : 45%" id="step-2">Next <i
                                            class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- tab bag step 2 --}}
            <div class="tab-pane fade" id="bag-tab-pane-step-2" role="tabpanel" aria-labelledby="bag-tab" tabindex="0"
                wire:ignore.self>
                <div class="row mt-5">
                    <div class="col-lg-6" id="preview-image">
                        <img class="border" id="bag-image-step-2" alt="" width="400">
                    </div>


                    <div class="col-lg-6">
                        <h4>Bag</h4>

                        <div class="mt-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="mt-2"><strong>Profit Estimator for: </strong></p>
                                    <p class="mt-4"><strong>Harga Dasar: </strong></p>
                                    <p class="mt-3"><strong>Royalti Desain </strong></p>
                                    <p class="mt-4"><strong>Harga Jual: </strong></p>
                                </div>
                                <div class="col-lg-6">
                                    <button class="btn w-100 rounded-0" style="background-color: #c0c0c0">Tote Bag
                                        Canvas</button>
                                    <p class="mt-3" id="bag-harga-dasar">20000</p>
                                    <input type="number" class="" id="price-bag">
                                    <p class="mt-3" id="bag-harga-jual"></p>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td scope="col">10 items</td>
                                            <td scope="col" class="text-end" id="bag-10-items"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">100 items</td>
                                            <td scope="col" class="text-end" id="bag-100-items"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">250 items</td>
                                            <td scope="col" class="text-end" id="bag-250-items"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">500 items</td>
                                            <td scope="col" class="text-end" id="bag-500-items"></td>
                                        </tr>
                                        <tr class="bg-warning">
                                            <td scope="col">1000 items</td>
                                            <td scope="col" class="text-end" id="bag-1000-items"></td>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                            <div class="row">
                                <div class="d-flex justify-content-between mt-4">
                                    <button class="btn btn-dark rounded-0" style="width : 45%"><i
                                            class="fa fa-arrow-left" aria-hidden="true"></i>
                                        Back</button>
                                    <button class="btn btn-dark rounded-0" style="width : 45%" id="step-2">Next <i
                                            class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <select class="form-select" aria-label="Default select example"
                            wire:model="design_category_id" required>

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
                        <input type="text" class="form-control" id="url" required>
                    </div>

                    <button class="btn btn-dark mt-4 rounded-0" id="publish">Publish</button>
            </div>

            <div class="col-lg-5">
                <img class="border" alt="" width="350">
            </div>
        </div>
    </div>
    {{-- end step 3 --}}
    <script src="{{ asset('assets/js/fabric.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"
        integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"
        integrity="sha512-wUa0ktp10dgVVhWdRVfcUO4vHS0ryT42WOEcXjVVF2+2rcYBKTY7Yx7JCEzjWgPV+rj2EDUr8TwsoWF6IoIOPg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/konva@7.0.0/konva.min.js"></script>

    <script>
        if ({{ $step }} === 1) {

            // layer tshirt
            var stage = new Konva.Stage({
                container: '.tshirt-layer',
                width: 200,
                height: 380,
            });

            var layer = new Konva.Layer();
            stage.add(layer);

            // layer hoodie
            let stage2 = new Konva.Stage({
                container: '.hoodie-layer',
                width: 198,
                height: 238,
            });

            let layer2 = new Konva.Layer();
            stage2.add(layer2);

            // layer sweater
            let stage3 = new Konva.Stage({
                container: '.sweater-layer',
                width: 198,
                height: 378,
            });

            let layer3 = new Konva.Layer();
            stage3.add(layer3);

            // layer hat
            let stage4 = new Konva.Stage({
                container: '.hat-layer',
                width: 198,
                height: 196,
            });

            let layer4 = new Konva.Layer();
            stage4.add(layer4);

            // layer bag
            let stage5 = new Konva.Stage({
                container: '.bag-layer',
                width: 268,
                height: 218,
            });

            let layer5 = new Konva.Layer();
            stage5.add(layer5);



            $(".file_input").change(function(e) {
                var URL = window.webkitURL || window.URL;
                var url = URL.createObjectURL(e.target.files[0]);
                var img = new Image();
                img.src = url;

                $('#design-image').attr('src', url);
                img.onload = function() {

                    var img_width = img.width;
                    var img_height = img.height;

                    // calculate dimensions to get max 300px
                    var max = 300;
                    var ratio = (img_width > img_height ? (img_width / max) : (img_height / max))

                    // now load the Konva image
                    let theImg = new Konva.Image({
                        name: 'rect',
                        image: img,
                        x: 50,
                        y: 30,
                        width: 150,
                        height: 150,
                        draggable: true,
                        rotation: 0
                    });

                    let theImg2 = new Konva.Image({
                        name: 'rect2',
                        image: img,
                        x: 50,
                        y: 30,
                        width: 150,
                        height: 150,
                        draggable: true,
                        rotation: 0
                    });

                    let theImg3 = new Konva.Image({
                        name: 'rect3',
                        image: img,
                        x: 50,
                        y: 30,
                        width: 150,
                        height: 150,
                        draggable: true,
                        rotation: 0
                    });

                    let theImg4 = new Konva.Image({
                        name: 'rect4',
                        image: img,
                        x: 50,
                        y: 30,
                        width: 150,
                        height: 150,
                        draggable: true,
                        rotation: 0
                    });

                    let theImg5 = new Konva.Image({
                        name: 'rect5',
                        image: img,
                        x: 50,
                        y: 30,
                        width: 150,
                        height: 150,
                        draggable: true,
                        rotation: 0
                    });


                    layer.add(theImg);
                    layer.draw();

                    layer2.add(theImg2);
                    layer2.draw();

                    layer3.add(theImg3);
                    layer3.draw();

                    layer4.add(theImg4);
                    layer4.draw();

                    layer5.add(theImg5);
                    layer5.draw();

                }
            });

            // tshirt
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
            stage.on('mousedown touchstart', (e) => {
                // do nothing if we mousedown on eny shape
                if (e.target !== stage) {
                    return;
                }
                x1 = stage.getPointerPosition().x;
                y1 = stage.getPointerPosition().y;
                x2 = stage.getPointerPosition().x;
                y2 = stage.getPointerPosition().y;


                selectionRectangle.visible(true);
                selectionRectangle.width(0);
                selectionRectangle.height(0);
                layer.draw();
            });

            stage.on('mousemove touchmove', () => {
                // no nothing if we didn't start selection
                if (!selectionRectangle.visible()) {
                    return;
                }
                x2 = stage.getPointerPosition().x;
                y2 = stage.getPointerPosition().y;

                selectionRectangle.setAttrs({
                    x: Math.min(x1, x2),
                    y: Math.min(y1, y2),
                    width: Math.abs(x2 - x1),
                    height: Math.abs(y2 - y1),
                });
                layer.batchDraw();
            });

            stage.on('mouseup touchend', () => {
                // no nothing if we didn't start selection
                if (!selectionRectangle.visible()) {
                    return;
                }
                // update visibility in timeout, so we can check it in click event
                setTimeout(() => {
                    selectionRectangle.visible(false);
                    layer.batchDraw();
                });

                var shapes = stage.find('.rect').toArray();
                var box = selectionRectangle.getClientRect();
                var selected = shapes.filter((shape) =>
                    Konva.Util.haveIntersection(box, shape.getClientRect())
                );
                tr.nodes(selected);
                layer.batchDraw();
            });

            // clicks should select/deselect shapes
            stage.on('click tap', function(e) {
                // if we are selecting with rect, do nothing
                if (selectionRectangle.visible()) {
                    return;
                }

                // if click on empty area - remove all selections
                if (e.target === stage) {
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

            // hoodie
            var tr2 = new Konva.Transformer();
            layer2.add(tr2);

            // by default select all shapes


            // at this point basic demo is finished!!
            // we just have several transforming nodes
            layer2.draw();

            // add a new feature, lets add ability to draw selection rectangle
            var selectionRectangle2 = new Konva.Rect({
                fill: 'rgba(0,0,255,0.5)',
            });
            layer2.add(selectionRectangle2);

            var b1, b1, c2, c2;
            stage2.on('mousedown touchstart', (e) => {
                // do nothing if we mousedown on eny shape
                if (e.target !== stage2) {
                    return;
                }
                b1 = stage2.getPointerPosition().x;
                b1 = stage2.getPointerPosition().y;
                c2 = stage2.getPointerPosition().x;
                c2 = stage2.getPointerPosition().y;


                selectionRectangle2.visible(true);
                selectionRectangle2.width(0);
                selectionRectangle2.height(0);
                layer2.draw();
            });

            stage2.on('mousemove touchmove', () => {
                // no nothing if we didn't start selection
                if (!selectionRectangle2.visible()) {
                    return;
                }
                b2 = stage2.getPointerPosition().x;
                c2 = stage2.getPointerPosition().y;

                selectionRectangle2.setAttrs({
                    x: Math.min(b1, b2),
                    y: Math.min(c1, c2),
                    width: Math.abs(b2 - b1),
                    height: Math.abs(c2 - c1),
                });
                layer2.batchDraw();
            });

            stage2.on('mouseup touchend', () => {
                // no nothing if we didn't start selection
                if (!selectionRectangle2.visible()) {
                    return;
                }
                // update visibility in timeout, so we can check it in click event
                setTimeout(() => {
                    selectionRectangle2.visible(false);
                    layer2.batchDraw();
                });

                var shapes2 = stage2.find('.rect2').toArray();
                var box2 = selectionRectangle2.getClientRect();
                var selected2 = shapes2.filter((shape) =>
                    Konva.Util.haveIntersection(box2, shape.getClientRect())
                );
                tr2.nodes(selected2);
                layer2.batchDraw();
            });

            // clicks should select/deselect shapes
            stage2.on('click tap', function(e) {
                // if we are selecting with rect, do nothing
                if (selectionRectangle2.visible()) {
                    return;
                }

                // if click on empty area - remove all selections
                if (e.target === stage2) {
                    tr2.nodes([]);
                    layer2.draw();
                    return;
                }

                // do nothing if clicked NOT on our rectangles
                if (!e.target.hasName('rect2')) {
                    return;
                }

                // do we pressed shift or ctrl?
                const metaPressed2 = e.evt.shiftKey || e.evt.ctrlKey || e.evt.metaKey;
                const isSelected2 = tr2.nodes().indexOf(e.target) >= 0;

                if (!metaPressed2 && !isSelected2) {
                    // if no key pressed and the node is not selected
                    // select just one
                    tr2.nodes([e.target]);
                } else if (metaPressed2 && isSelected2) {
                    // if we pressed keys and node was selected
                    // we need to remove it from selection:
                    const nodes2 = tr2.nodes().slice(); // use slice to have new copy of array
                    // remove node from array
                    nodes2.splice(nodes2.indexOf(e.target), 1);
                    tr2.nodes(nodes2);
                } else if (metaPressed2 && !isSelected2) {
                    // add the node into selection
                    const nodes2 = tr2.nodes().concat([e.target]);
                    tr2.nodes(nodes2);
                }
                layer2.draw();
            });



            // sweater
            var tr3 = new Konva.Transformer();
            layer3.add(tr3);

            // by default select all shapes


            // at this point basic demo is finished!!
            // we just have several transforming nodes
            layer3.draw();

            // add a new feature, lets add ability to draw selection rectangle
            var selectionRectangle3 = new Konva.Rect({
                fill: 'rgba(0,0,255,0.5)',
            });
            layer3.add(selectionRectangle3);

            var d1, d1, e2, e2;
            stage3.on('mousedown touchstart', (e) => {
                // do nothing if we mousedown on eny shape
                if (e.target !== stage3) {
                    return;
                }
                d1 = stage3.getPointerPosition().x;
                d1 = stage3.getPointerPosition().y;
                e2 = stage3.getPointerPosition().x;
                e2 = stage3.getPointerPosition().y;


                selectionRectangle3.visible(true);
                selectionRectangle3.width(0);
                selectionRectangle3.height(0);
                layer3.draw();
            });

            stage3.on('mousemove touchmove', () => {
                // no nothing if we didn't start selection
                if (!selectionRectangle3.visible()) {
                    return;
                }
                d2 = stage3.getPointerPosition().x;
                e2 = stage3.getPointerPosition().y;

                selectionRectangle3.setAttrs({
                    x: Math.min(d1, d2),
                    y: Math.min(e1, e2),
                    width: Math.abs(d2 - d1),
                    height: Math.abs(e2 - e1),
                });
                layer3.batchDraw();
            });

            stage3.on('mouseup touchend', () => {
                // no nothing if we didn't start selection
                if (!selectionRectangle3.visible()) {
                    return;
                }
                // update visibility in timeout, so we can check it in click event
                setTimeout(() => {
                    selectionRectangle3.visible(false);
                    layer3.batchDraw();
                });

                var shapes3 = stage3.find('.rect3').toArray();
                var box3 = selectionRectangle3.getClientRect();
                var selected3 = shapes3.filter((shape) =>
                    Konva.Util.haveIntersection(box3, shape.getClientRect())
                );
                tr3.nodes(selected3);
                layer3.batchDraw();
            });

            // clicks should select/deselect shapes
            stage3.on('click tap', function(e) {
                // if we are selecting with rect, do nothing
                if (selectionRectangle3.visible()) {
                    return;
                }

                // if click on empty area - remove all selections
                if (e.target === stage3) {
                    tr3.nodes([]);
                    layer3.draw();
                    return;
                }

                // do nothing if clicked NOT on our rectangles
                if (!e.target.hasName('rect3')) {
                    return;
                }

                // do we pressed shift or ctrl?
                const metaPressed3 = e.evt.shiftKey || e.evt.ctrlKey || e.evt.metaKey;
                const isSelected3 = tr3.nodes().indexOf(e.target) >= 0;

                if (!metaPressed3 && !isSelected3) {
                    // if no key pressed and the node is not selected
                    // select just one
                    tr3.nodes([e.target]);
                } else if (metaPressed3 && isSelected3) {
                    // if we pressed keys and node was selected
                    // we need to remove it from selection:
                    const nodes3 = tr3.nodes().slice(); // use slice to have new copy of array
                    // remove node from array
                    nodes3.splice(nodes3.indexOf(e.target), 1);
                    tr3.nodes(nodes3);
                } else if (metaPressed3 && !isSelected3) {
                    // add the node into selection
                    const nodes3 = tr3.nodes().concat([e.target]);
                    tr3.nodes(nodes3);
                }
                layer3.draw();
            });



            // topi
            var tr4 = new Konva.Transformer();
            layer4.add(tr4);

            // by default select all shapes


            // at this point basic demo is finished!!
            // we just have several transforming nodes
            layer4.draw();

            // add a new feature, lets add ability to draw selection rectangle
            var selectionRectangle4 = new Konva.Rect({
                fill: 'rgba(0,0,255,0.5)',
            });
            layer4.add(selectionRectangle4);

            var f1, f1, g2, g2;
            stage4.on('mousedown touchstart', (e) => {
                // do nothing if we mousedown on eny shape
                if (e.target !== stage4) {
                    return;
                }
                f1 = stage4.getPointerPosition().x;
                f1 = stage4.getPointerPosition().y;
                g2 = stage4.getPointerPosition().x;
                g2 = stage4.getPointerPosition().y;


                selectionRectangle4.visible(true);
                selectionRectangle4.width(0);
                selectionRectangle4.height(0);
                layer4.draw();
            });

            stage4.on('mousemove touchmove', () => {
                // no nothing if we didn't start selection
                if (!selectionRectangle4.visible()) {
                    return;
                }
                f2 = stage4.getPointerPosition().x;
                g2 = stage4.getPointerPosition().y;

                selectionRectangle4.setAttrs({
                    x: Math.min(f1, f2),
                    y: Math.min(g1, g2),
                    width: Math.abs(f2 - f1),
                    height: Math.abs(g2 - g1),
                });
                layer4.batchDraw();
            });

            stage4.on('mouseup touchend', () => {
                // no nothing if we didn't start selection
                if (!selectionRectangle4.visible()) {
                    return;
                }
                // update visibility in timeout, so we can check it in click event
                setTimeout(() => {
                    selectionRectangle4.visible(false);
                    layer4.batchDraw();
                });

                var shapes4 = stage4.find('.rect4').toArray();
                var box4 = selectionRectangle4.getClientRect();
                var selected4 = shapes4.filter((shape) =>
                    Konva.Util.haveIntersection(box4, shape.getClientRect())
                );
                tr4.nodes(selected4);
                layer4.batchDraw();
            });

            // clicks should select/deselect shapes
            stage4.on('click tap', function(e) {
                // if we are selecting with rect, do nothing
                if (selectionRectangle4.visible()) {
                    return;
                }

                // if click on empty area - remove all selections
                if (e.target === stage4) {
                    tr4.nodes([]);
                    layer4.draw();
                    return;
                }

                // do nothing if clicked NOT on our rectangles
                if (!e.target.hasName('rect4')) {
                    return;
                }

                // do we pressed shift or ctrl?
                const metaPressed4 = e.evt.shiftKey || e.evt.ctrlKey || e.evt.metaKey;
                const isSelected4 = tr4.nodes().indexOf(e.target) >= 0;

                if (!metaPressed4 && !isSelected4) {
                    // if no key pressed and the node is not selected
                    // select just one
                    tr4.nodes([e.target]);
                } else if (metaPressed4 && isSelected4) {
                    // if we pressed keys and node was selected
                    // we need to remove it from selection:
                    const nodes4 = tr4.nodes().slice(); // use slice to have new copy of array
                    // remove node from array
                    nodes4.splice(nodes4.indexOf(e.target), 1);
                    tr4.nodes(nodes4);
                } else if (metaPressed4 && !isSelected4) {
                    // add the node into selection
                    const nodes4 = tr4.nodes().concat([e.target]);
                    tr4.nodes(nodes4);
                }
                layer4.draw();
            });




            // bag
            var tr5 = new Konva.Transformer();
            layer5.add(tr5);

            // by default select all shapes


            // at this point basic demo is finished!!
            // we just have several transforming nodes
            layer5.draw();

            // add a new feature, lets add ability to draw selection rectangle
            var selectionRectangle5 = new Konva.Rect({
                fill: 'rgba(0,0,255,0.5)',
            });
            layer5.add(selectionRectangle5);

            var h1, h1, i2, i2;
            stage5.on('mousedown touchstart', (e) => {
                // do nothing if we mousedown on eny shape
                if (e.target !== stage5) {
                    return;
                }
                h1 = stage5.getPointerPosition().x;
                h1 = stage5.getPointerPosition().y;
                i2 = stage5.getPointerPosition().x;
                i2 = stage5.getPointerPosition().y;


                selectionRectangle5.visible(true);
                selectionRectangle5.width(0);
                selectionRectangle5.height(0);
                layer5.draw();
            });

            stage5.on('mousemove touchmove', () => {
                // no nothing if we didn't start selection
                if (!selectionRectangle5.visible()) {
                    return;
                }
                h2 = stage5.getPointerPosition().x;
                i2 = stage5.getPointerPosition().y;

                selectionRectangle5.setAttrs({
                    x: Math.min(h1, h2),
                    y: Math.min(i1, i2),
                    width: Math.abs(h2 - h1),
                    height: Math.abs(i2 - i1),
                });
                layer5.batchDraw();
            });

            stage5.on('mouseup touchend', () => {
                // no nothing if we didn't start selection
                if (!selectionRectangle5.visible()) {
                    return;
                }
                // update visibility in timeout, so we can check it in click event
                setTimeout(() => {
                    selectionRectangle5.visible(false);
                    layer5.batchDraw();
                });

                var shapes5 = stage5.find('.rect5').toArray();
                var box5 = selectionRectangle5.getClientRect();
                var selected5 = shapes5.filter((shape) =>
                    Konva.Util.haveIntersection(box5, shape.getClientRect())
                );
                tr5.nodes(selected5);
                layer5.batchDraw();
            });

            // clicks should select/deselect shapes
            stage5.on('click tap', function(e) {
                // if we are selecting with rect, do nothing
                if (selectionRectangle5.visible()) {
                    return;
                }

                // if click on empty area - remove all selections
                if (e.target === stage5) {
                    tr5.nodes([]);
                    layer5.draw();
                    return;
                }

                // do nothing if clicked NOT on our rectangles
                if (!e.target.hasName('rect5')) {
                    return;
                }

                // do we pressed shift or ctrl?
                const metaPressed5 = e.evt.shiftKey || e.evt.ctrlKey || e.evt.metaKey;
                const isSelected5 = tr5.nodes().indexOf(e.target) >= 0;

                if (!metaPressed5 && !isSelected5) {
                    // if no key pressed and the node is not selected
                    // select just one
                    tr5.nodes([e.target]);
                } else if (metaPressed5 && isSelected5) {
                    // if we pressed keys and node was selected
                    // we need to remove it from selection:
                    const nodes5 = tr5.nodes().slice(); // use slice to have new copy of array
                    // remove node from array
                    nodes5.splice(nodes5.indexOf(e.target), 1);
                    tr5.nodes(nodes5);
                } else if (metaPressed5 && !isSelected5) {
                    // add the node into selection
                    const nodes5 = tr5.nodes().concat([e.target]);
                    tr5.nodes(nodes5);
                }
                layer5.draw();
            });
        }



        // $('#step-1').click(function() {
        //     tr.nodes([]);
        //     layer.draw();
        //     var node = document.getElementById('capture');

        //     domtoimage.toPng(node)
        //     .then(function (dataUrl) {
        //         var img = new Image();
        //         img.src = dataUrl;
        //         let base64 = dataUrl;
        //         window.livewire.emit('tes', dataUrl);
        //     })
        //     .catch(function (error) {
        //         console.error('oops, something went wrong!', error);
        //     });
        // })

        let tshirt;
        let hoodie;
        let sweater;
        let hat;
        let bag;

        $(".step-1").click(async () => {
            let nodeTshirt = document.getElementById('tshirt-capture');
            let nodeHoodie = document.getElementById('hoodie-capture');
            let nodeSweater = document.getElementById('sweater-capture');
            let nodeHat = document.getElementById('hat-capture');
            let nodeBag = document.getElementById('bag-capture');

            $("#exampleModal").modal("show")

            $('#tshirt-tab').addClass('active')
            $('#tshirt-tab').attr('aria-selected', 'false')
            $('#tshirt-tab-pane').addClass('show')
            $('#tshirt-tab-pane').addClass('active')

            $('#hoodie-tab').removeClass('active')
            $('#hoodie-tab').attr('aria-selected', 'false')
            $('#hoodie-tab-pane').removeClass('show')
            $('#hoodie-tab-pane').removeClass('active')

            $('#sweater-tab').removeClass('active')
            $('#sweater-tab').attr('aria-selected', 'false')
            $('#sweater-tab-pane').removeClass('show')
            $('#sweater-tab-pane').removeClass('active')

            $('#hat-tab').removeClass('active')
            $('#hat-tab').attr('aria-selected', 'false')
            $('#hat-tab-pane').removeClass('show')
            $('#hat-tab-pane').removeClass('active')

            $('#bag-tab').removeClass('active')
            $('#bag-tab').attr('aria-selected', 'false')
            $('#bag-tab-pane').removeClass('show')
            $('#bag-tab-pane').removeClass('active')

            $('#tshirt-tab').addClass('active')
            $('#tshirt-tab').attr('aria-selected', 'false')
            $('#tshirt-tab-pane').addClass('show')
            $('#tshirt-tab-pane').addClass('active')

            tshirt = await getImageTshirt(nodeTshirt)
            $('#tshirt-tab').removeClass('active')
            $('#tshirt-tab').attr('aria-selected', 'false')
            $('#tshirt-tab-pane').removeClass('show')
            $('#tshirt-tab-pane').removeClass('active')

            $('#hoodie-tab').addClass('active')
            $('#hoodie-tab').attr('aria-selected', 'true')
            $('#hoodie-tab-pane').addClass('show')
            $('#hoodie-tab-pane').addClass('active')

            hoodie = await getImageHoodie(nodeHoodie)
            $('#hoodie-tab').removeClass('active')
            $('#hoodie-tab').attr('aria-selected', 'false')
            $('#hoodie-tab-pane').removeClass('show')
            $('#hoodie-tab-pane').removeClass('active')

            $('#sweater-tab').addClass('active')
            $('#sweater-tab').attr('aria-selected', 'true')
            $('#sweater-tab-pane').addClass('show')
            $('#sweater-tab-pane').addClass('active')

            sweater = await getImageSweater(nodeSweater)
            $('#sweater-tab').removeClass('active')
            $('#sweater-tab').attr('aria-selected', 'false')
            $('#sweater-tab-pane').removeClass('show')
            $('#sweater-tab-pane').removeClass('active')

            $('#hat-tab').addClass('active')
            $('#hat-tab').attr('aria-selected', 'true')
            $('#hat-tab-pane').addClass('show')
            $('#hat-tab-pane').addClass('active')

            hat = await getImageHat(nodeHat)
            $('#hat-tab').removeClass('active')
            $('#hat-tab').attr('aria-selected', 'false')
            $('#hat-tab-pane').removeClass('show')
            $('#hat-tab-pane').removeClass('active')

            $('#bag-tab').addClass('active')
            $('#bag-tab').attr('aria-selected', 'true')
            $('#bag-tab-pane').addClass('show')
            $('#bag-tab-pane').addClass('active')
            bag = await getImageBag(nodeBag)

            $("#exampleModal").modal("hide")

            $('.step1').addClass('d-none')
            $('.step2').removeClass('d-none')

            $('#tshirt-image-step-2').attr('src', tshirt[0][1])
            $('#hoodie-image-step-2').attr('src', hoodie[0][1])
            $('#sweater-image-step-2').attr('src', sweater[0][1])
            $('#hat-image-step-2').attr('src', hat[0][1])
            $('#bag-image-step-2').attr('src', bag[0][1])



            // window.livewire.emit('tes', {
            //     'tshirt': tshirt,
            //     'hoodie': hoodie,
            //     'sweater': sweater,
            //     'hat': hat,
            //     'bag': bag
            // });



        })


        const getImageTshirt = async (nodeTshirt) => {
            let tshirtImage;
            let t = [];

            let imgTshirt = [];
            imgTshirt.push('#141414')
            document.getElementById('tshirt-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/tshirt-black.png') }}')`;
            imgTshirt.push(await getImage(nodeTshirt))
            t.push(imgTshirt);

            let imgTshirt2 = [];
            imgTshirt2.push('#fff')
            document.getElementById('tshirt-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/tshirt-white.png') }}')`;
            imgTshirt2.push(await getImage(nodeTshirt))
            t.push(imgTshirt2);

            let imgTshirt3 = [];
            imgTshirt3.push('#7b7b7b')
            document.getElementById('tshirt-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/tshirt-silver.png') }}')`;
            imgTshirt3.push(await getImage(nodeTshirt))
            t.push(imgTshirt3);

            let imgTshirt4 = [];
            imgTshirt4.push('#a60707')
            document.getElementById('tshirt-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/tshirt-red.png') }}')`;
            imgTshirt4.push(await getImage(nodeTshirt))
            t.push(imgTshirt4);

            let imgTshirt5 = [];
            imgTshirt5.push('#4c5d34')
            document.getElementById('tshirt-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/tshirt-green.png') }}')`;
            imgTshirt5.push(await getImage(nodeTshirt))
            t.push(imgTshirt5);

            let imgTshirt6 = [];
            imgTshirt6.push('#252c5f')
            document.getElementById('tshirt-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/tshirt-blue.png') }}')`;
            imgTshirt6.push(await getImage(nodeTshirt))
            t.push(imgTshirt6);

            let imgTshirt7 = [];
            imgTshirt7.push('#e47200')
            document.getElementById('tshirt-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/tshirt-yellow.png') }}')`;
            imgTshirt7.push(await getImage(nodeTshirt))
            t.push(imgTshirt7);

            return t;
        }

        const getImageHoodie = async (nodeHoodie) => {
            let hoodieImage;
            let t = [];

            let imgHoodie = [];
            imgHoodie.push('#2f2f2f')
            document.getElementById('hoodie-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/hoodie-black.png') }}')`;
            imgHoodie.push(await getImage(nodeHoodie))
            t.push(imgHoodie);

            let imgHoodie2 = [];
            imgHoodie2.push('#f0f0f0')
            document.getElementById('hoodie-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/hoodie-white.png') }}')`;
            imgHoodie2.push(await getImage(nodeHoodie))
            t.push(imgHoodie2);

            let imgHoodie3 = [];
            imgHoodie3.push('#995f2f')
            document.getElementById('hoodie-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/hoodie-chocolate.png') }}')`;
            imgHoodie3.push(await getImage(nodeHoodie))
            t.push(imgHoodie3);

            let imgHoodie4 = [];
            imgHoodie4.push('#44672f')
            document.getElementById('hoodie-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/hoodie-green.png') }}')`;
            imgHoodie4.push(await getImage(nodeHoodie))
            t.push(imgHoodie4);

            let imgHoodie5 = [];
            imgHoodie5.push('#ad322d')
            document.getElementById('hoodie-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/hoodie-red.png') }}')`;
            imgHoodie5.push(await getImage(nodeHoodie))
            t.push(imgHoodie5);

            let imgHoodie6 = [];
            imgHoodie6.push('#3d4367')
            document.getElementById('hoodie-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/hoodie-navy.png') }}')`;
            imgHoodie6.push(await getImage(nodeHoodie))
            t.push(imgHoodie6);

            let imgHoodie7 = [];
            imgHoodie7.push('#ab7a2b')
            document.getElementById('hoodie-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/hoodie-yellow.png') }}')`;
            imgHoodie7.push(await getImage(nodeHoodie))
            t.push(imgHoodie7);

            let imgHoodie8 = [];
            imgHoodie8.push('#6e6e6e')
            document.getElementById('hoodie-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/hoodie-silver.png') }}')`;
            imgHoodie8.push(await getImage(nodeHoodie))
            t.push(imgHoodie8);



            return t;
        }

        const getImageSweater = async (nodeSweater) => {
            let sweaterImage;
            let t = [];

            let imgSweater = [];
            imgSweater.push('#242220')
            document.getElementById('sweater-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/sweater-black.png') }}')`;
            imgSweater.push(await getImage(nodeSweater))
            t.push(imgSweater);

            let imgSweater2 = [];
            imgSweater2.push('#f0f0f0')
            document.getElementById('sweater-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/sweater-white.png') }}')`;
            imgSweater2.push(await getImage(nodeSweater))
            t.push(imgSweater2);

            let imgSweater3 = [];
            imgSweater3.push('#828282')
            document.getElementById('sweater-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/sweater-silver.png') }}')`;
            imgSweater3.push(await getImage(nodeSweater))
            t.push(imgSweater3);

            let imgSweater4 = [];
            imgSweater4.push('#2d4821')
            document.getElementById('sweater-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/sweater-green.png') }}')`;
            imgSweater4.push(await getImage(nodeSweater))
            t.push(imgSweater4);

            let imgSweater5 = [];
            imgSweater5.push('#851d1d')
            document.getElementById('sweater-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/sweater-red.png') }}')`;
            imgSweater5.push(await getImage(nodeSweater))
            t.push(imgSweater5);

            let imgSweater6 = [];
            imgSweater6.push('#212f49')
            document.getElementById('sweater-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/sweater-navy.png') }}')`;
            imgSweater6.push(await getImage(nodeSweater))
            t.push(imgSweater6);

            let imgSweater7 = [];
            imgSweater7.push('#c47d21')
            document.getElementById('sweater-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/sweater-yellow.png') }}')`;
            imgSweater7.push(await getImage(nodeSweater))
            t.push(imgSweater7);

            return t;
        }

        const getImageHat = async (nodeHat) => {
            let hatImage;
            let t = [];

            let imgHat = [];
            imgHat.push('#000')
            document.getElementById('hat-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/hat-black.png') }}')`;
            imgHat.push(await getImage(nodeHat))
            t.push(imgHat);

            let imgHat2 = [];
            imgHat2.push('#fff')
            document.getElementById('hat-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/hat-white.png') }}')`;
            imgHat2.push(await getImage(nodeHat))
            t.push(imgHat2);

            let imgHat3 = [];
            imgHat3.push('#395b22')
            document.getElementById('hat-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/hat-green.png') }}')`;
            imgHat3.push(await getImage(nodeHat))
            t.push(imgHat3);

            let imgHat4 = [];
            imgHat4.push('#ad0000')
            document.getElementById('hat-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/hat-red.png') }}')`;
            imgHat4.push(await getImage(nodeHat))
            t.push(imgHat4);

            let imgHat5 = [];
            imgHat5.push('#324a6f')
            document.getElementById('hat-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/hat-blue.png') }}')`;
            imgHat5.push(await getImage(nodeHat))
            t.push(imgHat5);



            return t;
        }

        const getImageBag = async (nodeBag) => {
            let bagImage;
            let t = [];
            let imgBag = [];
            imgBag.push('#000')
            document.getElementById('bag-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/bag-black.png') }}')`;
            imgBag.push(await getImage(nodeBag))
            t.push(imgBag);


            let imgBag2 = [];
            imgBag2.push('#fff')
            document.getElementById('bag-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/bag-white.png') }}')`;
            imgBag2.push(await getImage(nodeBag))
            t.push(imgBag2);

            return t;

        }


        const getImage = async (nodeTshirt) => {
            let image;
            await domtoimage.toPng(nodeTshirt)
                .then(function(dataUrl) {
                    var img = new Image();
                    img.src = dataUrl;
                    image = dataUrl;
                })
                .catch(function(error) {
                    console.error('oops, something went wrong!', error);
                });

            return image;
        }



        $('#step-2').click(function() {
            window.livewire.emit('change');
        })

        $('#step-back').click(function() {
            window.livewire.emit('stepBack');
        })

        $('#back-image').click(function() {
            document.getElementById('main-image').style.backgroundImage =
                "url('{{ asset('assets/img/product_1-belakang.png') }}')";
        })

        $('#front-image').click(function() {
            document.getElementById('main-image').style.backgroundImage =
                "url('{{ asset('assets/img/product_1.png') }}')";
        })

        $('.tshirt-color').click(function() {
            let img = $(this).attr('data-image');
            document.getElementById('tshirt-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/${img}') }}')`;
        })

        $('.hoodie-color').click(function() {
            let img = $(this).attr('data-image');
            document.getElementById('hoodie-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/${img}') }}')`;
        })

        $('.sweater-color').click(function() {
            let img = $(this).attr('data-image');
            document.getElementById('sweater-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/${img}') }}')`;
        })

        $('.hat-color').click(function() {
            let img = $(this).attr('data-image');
            document.getElementById('hat-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/${img}') }}')`;
        })

        $('.bag-color').click(function() {
            let img = $(this).attr('data-image');
            document.getElementById('bag-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/${img}') }}')`;
        })

        $('#back-step-1').click(function() {
            $('.step1').removeClass('d-none');
            $('.step2').addClass('d-none');
            $('.step3').addClass('d-none');
        })

        $('#price-tshirt').on('input', function() {
            let items1 = $('#price-tshirt').val() * 10;
            let items2 = $('#price-tshirt').val() * 100;
            let items3 = $('#price-tshirt').val() * 250;
            let items4 = $('#price-tshirt').val() * 500;
            let items5 = $('#price-tshirt').val() * 1000;

            let hargaDasar = parseInt($("#tshirt-harga-dasar").text()) + parseInt($('#price-tshirt').val());

            $('#tshirt-harga-jual').text('Rp. '+ hargaDasar.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'))



            $('#tshirt-10-items').text( 'Rp. '+ items1.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#tshirt-100-items').text( 'Rp. '+ items2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#tshirt-250-items').text( 'Rp. '+ items3.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#tshirt-500-items').text( 'Rp. '+ items4.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#tshirt-1000-items').text( 'Rp. '+ items5.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
        })

        $('#price-hoodie').on('input', function() {
            let items1 = $('#price-hoodie').val() * 10;
            let items2 = $('#price-hoodie').val() * 100;
            let items3 = $('#price-hoodie').val() * 250;
            let items4 = $('#price-hoodie').val() * 500;
            let items5 = $('#price-hoodie').val() * 1000;

            let hargaDasar = parseInt($("#hoodie-harga-dasar").text()) + parseInt($('#price-hoodie').val());

            $('#hoodie-harga-jual').text('Rp. '+ hargaDasar.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'))

            $('#hoodie-10-items').text( 'Rp. '+ items1.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#hoodie-100-items').text( 'Rp. '+ items2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#hoodie-250-items').text( 'Rp. '+ items3.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#hoodie-500-items').text( 'Rp. '+ items4.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#hoodie-1000-items').text( 'Rp. '+ items5.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
        })

        $('#price-sweater').on('input', function() {
            let items1 = $('#price-sweater').val() * 10;
            let items2 = $('#price-sweater').val() * 100;
            let items3 = $('#price-sweater').val() * 250;
            let items4 = $('#price-sweater').val() * 500;
            let items5 = $('#price-sweater').val() * 1000;

            let hargaDasar = parseInt($("#sweater-harga-dasar").text()) + parseInt($('#price-sweater').val());

            $('#sweater-harga-jual').text('Rp. '+ hargaDasar.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'))

            $('#sweater-10-items').text( 'Rp. '+ items1.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#sweater-100-items').text( 'Rp. '+ items2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#sweater-250-items').text( 'Rp. '+ items3.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#sweater-500-items').text( 'Rp. '+ items4.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#sweater-1000-items').text( 'Rp. '+ items5.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
        })

        $('#price-hat').on('input', function() {
            let items1 = $('#price-hat').val() * 10;
            let items2 = $('#price-hat').val() * 100;
            let items3 = $('#price-hat').val() * 250;
            let items4 = $('#price-hat').val() * 500;
            let items5 = $('#price-hat').val() * 1000;

            let hargaDasar = parseInt($("#hat-harga-dasar").text()) + parseInt($('#price-hat').val());

            $('#hat-harga-jual').text('Rp. '+ hargaDasar.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'))

            $('#hat-10-items').text( 'Rp. '+ items1.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#hat-100-items').text( 'Rp. '+ items2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#hat-250-items').text( 'Rp. '+ items3.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#hat-500-items').text( 'Rp. '+ items4.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#hat-1000-items').text( 'Rp. '+ items5.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
        })

        $('#price-bag').on('input', function() {
            let items1 = $('#price-bag').val() * 10;
            let items2 = $('#price-bag').val() * 100;
            let items3 = $('#price-bag').val() * 250;
            let items4 = $('#price-bag').val() * 500;
            let items5 = $('#price-bag').val() * 1000;

            let hargaDasar = parseInt($("#bag-harga-dasar").text()) + parseInt($('#price-bag').val());

            $('#bag-harga-jual').text('Rp. '+ hargaDasar.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'))

            $('#bag-10-items').text( 'Rp. '+ items1.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#bag-100-items').text( 'Rp. '+ items2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#bag-250-items').text( 'Rp. '+ items3.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#bag-500-items').text( 'Rp. '+ items4.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
            $('#bag-1000-items').text( 'Rp. '+ items5.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
        })

        $('.step-2').click(function() {
            $('.step1').addClass('d-none')
            $('.step2').addClass('d-none')
            $('.step3').removeClass('d-none')
        })

        $('#publish').click(function() {

            let priceTshirt = $('#price-tshirt').val();
            let priceHoodie = $('#price-hoodie').val();
            let priceSweater = $('#price-sweater').val();
            let priceHat = $('#price-hat').val();
            let priceBag = $('#price-bag').val();

            // form publish
            let title = $("#title").val();
            let description = $('#description').val();
            let designCategoryId = $('#designCategoryId').val();
            let tags = $('#tags').val();
            let url = $('#url').val();


            window.livewire.emit('submitForm', {
                'tshirt': tshirt,
                'hoodie': hoodie,
                'sweater': sweater,
                'hat': hat,
                'bag': bag,
                'priceTshirt' : priceTshirt,
                'priceHoodie' : priceHoodie,
                'priceSweater' : priceSweater,
                'priceHat' : priceHat,
                'priceBag' : priceBag,
                'title' : title,
                'description' : description,
                'designCategoryId' : designCategoryId,
                'tags' : tags,
                'url' : url
            });
        })
    </script>

</div>


