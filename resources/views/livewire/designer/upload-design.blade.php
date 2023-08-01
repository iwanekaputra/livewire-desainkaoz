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
                        <select class="form-select" aria-label="Default select example" id="style">
                            <option value="Lengan Pendek">Lengan Pendek</option>
                            <option value="Lengan Panjang">Lengan Panjang</option>
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
                                    class="tshirt-color" id="tshirt-black" data-image="tshirt-black.png">
                                </div>
                                <div style="width : 40px; height : 40px; background-color : #fff; border : 2px solid silver"
                                    class="tshirt-color" id="tshirt-white" data-image="tshirt-white.png">
                                </div>
                                <div style="width : 40px; height : 40px; background-color : #7b7b7b; border : 2px solid #silver"
                                    class="tshirt-color" id="tshirt-silver" data-image="tshirt-silver.png">
                                </div>
                                <div style="width : 40px; height : 40px; background-color : #a60707; border : 2px solid silver"
                                    class="tshirt-color" id="tshirt-red" data-image="tshirt-red.png">
                                </div>
                                <div style="width : 40px; height : 40px; background-color : #4c5d34; border : 2px solid silver"
                                    class="tshirt-color" id="tshirt-green" data-image="tshirt-green.png">
                                </div>
                                <div style="width : 40px; height : 40px; background-color : #252c5f; border : 2px solid silver"
                                    class="tshirt-color" id="tshirt-blue" data-image="tshirt-blue.png">
                                </div>
                                <div style="width : 40px; height : 40px; background-color : #e47200; border : 2px solid silver"
                                    class="tshirt-color" id="tshirt-yellow" data-image="tshirt-yellow.png">
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

                <div class="row mt-5">
                    <div class="col-lg-6" id="preview-image">
                        <img class="border" id="sticker-image-step-2" alt="" width="400">
                    </div>


                    <div class="col-lg-6">
                        <h4>Sticker</h4>

                        <div class="mt-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="mt-2"><strong>Profit Estimator for: </strong></p>
                                    <p class="mt-4"><strong>Harga Dasar: </strong></p>
                                    <p class="mt-3"><strong>Royalti Desain </strong></p>
                                    <p class="mt-4"><strong>Harga Jual: </strong></p>
                                </div>
                                <div class="col-lg-6">
                                    <button class="btn w-100 rounded-0" style="background-color: #c0c0c0">Sticker Vinyl Putih</button>
                                    <p class="mt-3" id="sticker-harga-dasar">5000</p>
                                    <input type="number" class="" id="price-sticker">
                                    <p class="mt-3" id="sticker-harga-jual"></p>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td scope="col">10 items</td>
                                            <td scope="col" class="text-end" id="sticker-10-items"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">100 items</td>
                                            <td scope="col" class="text-end" id="sticker-100-items"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">250 items</td>
                                            <td scope="col" class="text-end" id="sticker-250-items"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">500 items</td>
                                            <td scope="col" class="text-end" id="sticker-500-items"></td>
                                        </tr>
                                        <tr class="bg-warning">
                                            <td scope="col">1000 items</td>
                                            <td scope="col" class="text-end" id="sticker-1000-items"></td>
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
                        <input type="text" class="form-control" id="url" required>
                    </div>
                    <button class="btn btn-dark mt-4 rounded-0" id="back-step-2">Back</button>
                    <button class="btn btn-dark mt-4 rounded-0" id="submit">Publish</button>

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
    {{-- <script src="https://unpkg.com/konva@7.0.0/konva.min.js"></script> --}}
    <script src="https://unpkg.com/konva@9.2.0/konva.min.js"></script>


    <script>

            // layer tshirt
            var stage = new Konva.Stage({
                container: '.tshirt-layer',
                width: 200,
                height: 380,
            });

            var layer = new Konva.Layer();
            stage.add(layer);




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
                    theImg = new Konva.Image({
                        name: 'rect',
                        image: img,
                        x: 26,
                        y: -1,
                        width: 150,
                        height: 55,
                        draggable: true,
                        rotation: 0
                    });



                    layer.add(theImg);
                    layer.draw();theImg.absolutePosition().y






                    // now we wiltheImg.absolutePosition().ydocument.createElement('canvas');
                    var tempCanvas = document.createElement('canvas');

                    // make all pixels opaque 100% (except pixels that 100% transparent)
                    function removeTransparency(canvas) {
                        var ctx = canvas.getContext('2d');




                        var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                        var nPixels = imageDat55a.data.length;
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

                        var offset = 3;55

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
                            ((val - SMOOTH_MIN_TH55RESHOLD) /
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
                        var hasTransp55arentOnTopLeft =
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
                        }55
                        }
                    }

                }
            });
            55
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
                    x2 = stage.getPointerPosition().x;
                    return;
                }
                x1 = stage.getPointerPosition().x;
                y1 = stage.getPointerPosition().y;
                y2 = stage.getPointerPosition().y;


                selectionRectangle.visible(true);
                selectionRectangle.width(0);
                selectionRectangle.height(0);
                layer.draw();
            });



            stage.on('mousemove touchmove', () => {
                // no nothing if we didn't start selection
                if (!selectionRectangle.visible()) {
                    x2 = stage.getPointerPosition().x;
                    y2 = stage.getPointerPosition().y;
                    return;
                }


                selectionRectangle.setAttrs({
                    x: Math.min(x1, x2),
                    y: Math.min(y1, y2),
                    width: Math.abs(x2 - x1),
                    height: Math.abs(y2 - y1),
                });
                layer.batchDraw();
            });

            // stage.on('dragend', function (e) {
            //     console.log(theImg)
            // })

            stage.on('dragend heightChange', function (e) {
                console.log(theImg.width() * theImg.scaleX());
                console.log(theImg.height() * theImg.scaleY())
            })

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


        $('#step-2').click(function() {
            window.livewire.emit('change');
        })

        $('#step-back').click(function() {
            window.livewire.emit('stepBack');
        })

        $('#back-image').click(function() {
            document.getElementById('tshirt-main-image').style.backgroundImage =
                "url('{{ asset('assets/img/tshirt-belakang-black.png') }}')";

                $('#tshirt-black').attr('data-image', 'tshirt-belakang-black.png')
                $('#tshirt-white').attr('data-image', 'tshirt-belakang-white.png')
                $('#tshirt-silver').attr('data-image', 'tshirt-belakang-silver.png')
                $('#tshirt-green').attr('data-image', 'tshirt-belakang-green.png')
                $('#tshirt-red').attr('data-image', 'tshirt-belakang-red.png')
                $('#tshirt-blue').attr('data-image', 'tshirt-belakang-blue.png')
                $('#tshirt-yellow').attr('data-image', 'tshirt-belakang-yellow.png')
        })

        $('#front-image').click(function() {
            document.getElementById('tshirt-main-image').style.backgroundImage =
                "url('{{ asset('assets/img/tshirt-black.png') }}')";

            $('#tshirt-black').attr('data-image', 'tshirt-black.png')
            $('#tshirt-white').attr('data-image', 'tshirt-white.png')
            $('#tshirt-silver').attr('data-image', 'tshirt-silver.png')
            $('#tshirt-green').attr('data-image', 'tshirt-green.png')
            $('#tshirt-red').attr('data-image', 'tshirt-red.png')
            $('#tshirt-blue').attr('data-image', 'tshirt-blue.png')
            $('#tshirt-yellow').attr('data-image', 'tshirt-yellow.png')
        })


        $('.tshirt-color').click(function() {
            let img = $(this).attr('data-image');
            document.getElementById('tshirt-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/${img}') }}')`;
        })



        $('.back-step-1').click(function() {
            $('.step1').removeClass('d-none');
            $('.step2').addClass('d-none');
            $('.step3').addClass('d-none');

            $('#upload-design').css("background-color", '#9da19e')
            $('#harga').css("background-color", 'silver')
            $('#publish').css("background-color", 'silver')

        })

        $('#back-step-2').click(function() {
            $('.step2').removeClass('d-none');
            $('.step1').addClass('d-none');
            $('.step3').addClass('d-none');

            $('#upload-design').css("background-color", 'silver')
            $('#harga').css("background-color", '#9da19e')
            $('#publish').css("background-color", 'silver')
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

        $('.step-2').click(function() {
            $('.step1').addClass('d-none')
            $('.step2').addClass('d-none')
            $('.step3').removeClass('d-none')

            $('#harga').css("background-color", 'silver')
            $('#upload-design').css("background-color", 'silver')
            $('#publish').css("background-color", '#9da19e')
        })

        $('#submit').click(function() {


        })
    </script>

</div>


