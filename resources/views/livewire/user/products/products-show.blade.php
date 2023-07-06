<div>
    <!-- Open Content -->
    <section class="">
        <div class="main pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class=" mb-3">
                        <img wire:ignore.self class="card-img img-fluid border main-image" src="{{ $image }}" alt="Card image cap" id="product-detail" >

                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        {{-- <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div> --}}
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item"
                            data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{ $image }}"
                                                    alt="Product Image 1">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid"
                                                    src="{{ asset('uploads/design/' . $productDesign) }}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.First slide-->

                                <!--Second slide-->
                                {{-- <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{ asset('assets/img/product_single_04.jpg') }}" alt="Product Image 4">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{ asset('assets/img/product_single_05.jpg') }}" alt="Product Image 5">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{ asset('assets/img/product_single_06.jpg') }}" alt="Product Image 6">
                                            </a>
                                        </div>
                                    </div>
                                </div> --}}
                                <!--/.Second slide-->

                                <!--Third slide-->
                                {{-- <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{ asset('assets/img/product_single_07.jpg') }}" alt="Product Image 7">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{ asset('assets/img/product_single_08.jpg') }}" alt="Product Image 8">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{ asset('assets/img/product_single_09.jpg') }}" alt="Product Image 9">
                                            </a>
                                        </div>
                                    </div>
                                </div> --}}
                                <!--/.Third slide-->
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        {{-- <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div> --}}
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="">
                        <div class="card-body">
                            <h1 style="font-family: 'Myriad-Pro Bold';">{{ $title }}</h1>
                            <h6 class="py-2">{{ $design }} Tshirt designed and sold by <a href="#"
                                    class="text-decoration-none">{{ $username }}</a></h6>
                            @if ($productVariants->first()->style)
                            <div class="row">
                                <div class="col-2">
                                    <h6 class="mt-2">Style :</h6>
                                </div>
                                <div class="col-7">
                                    <select class="form-select" aria-label="Default select example" wire:model="style">
                                        <option value="Lengan Pendek">Lengan Pendek</option>
                                        <option value="Lengan Panjang">Lengan Panjang</option>
                                    </select>
                                </div>
                            </div>
                            @endif

                            @if ($productVariants->first()->color)
                            <div class="row">
                                <div class="col-lg-2 mt-4">
                                    <h6>Color :</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <ul class="list-inline pb-3">
                                        <div>
                                            @if ($category_id != 6)
                                            @foreach ($productVariants as $productVariant)
                                                <li class="list-inline-item mt-2">
                                                    <span class="btn btn-color btn-size d-flex justify-content-center align-items-center rounded-0 fw-bold border" style="width : 40px; height : 40px;background-color: {{ $productVariant->color }};" data-img="{{ $productVariant->image }}" wire:click="addColor('{{ $productVariant->color }}')"></span>

                                                </li>
                                            @endforeach
                                            @endif


                                        </div>
                                    </ul>
                                </div>
                            </div>
                            @endif

                            @if ($category_id != 6)
                            <input type="hidden" name="product-title" value="Activewear">
                            <div class="row">
                                <div class="col-lg-2 mt-4">
                                    <h6>Size :</h6>
                                </div>
                                <div class="col-lg-8">
                                    <ul class="list-inline pb-3">
                                        <div wire:ignore>
                                            <li class="list-inline-item mt-2">
                                                <span
                                                    class="btn btn-size d-flex justify-content-center align-items-center rounded-0 fw-bold"
                                                    style="width : 100px; height : 40px;background-color: #e9e9e9;"
                                                    wire:click="addSize('S')">S</span>
                                            </li>
                                            <li class="list-inline-item mt-2">
                                                <span
                                                    class="btn btn-size d-flex justify-content-center align-items-center rounded-0 fw-bold"
                                                    style="width : 100px; height : 40px;background-color: #e9e9e9"
                                                    wire:click="addSize('M')">M</span>
                                            </li>
                                            <li class="list-inline-item mt-2">
                                                <span
                                                    class="btn btn-size d-flex justify-content-center align-items-center rounded-0 fw-bold"
                                                    style="width : 100px; height : 40px;background-color: #e9e9e9"
                                                    wire:click="addSize('L')">L</span>
                                            </li>
                                            <li class="list-inline-item mt-2">
                                                <span
                                                    class="btn btn-size d-flex justify-content-center align-items-center rounded-0 fw-bold"
                                                    style="width : 100px; height : 40px;background-color: #e9e9e9"
                                                    wire:click="addSize('XXL')">XL</span>
                                            </li>
                                            <li class="list-inline-item mt-2">
                                                <span
                                                    class="btn btn-size d-flex justify-content-center align-items-center rounded-0 fw-bold"
                                                    style="width : 100px; height : 40px;background-color: #e9e9e9"
                                                    wire:click="addSize('XXXL')">XXL</span>
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            @endif

                            <h3 style="font-family: 'Myriad-Pro Bold';">Rp.
                                {{ number_format($total_price, 0, ',', '.') }}</h3>
                            <h6>Shipping</h6>
                            <div class="row mt-4 pb-3">
                                <div class="col-5 d-grid">
                                    <button type="submit" class="btn btn-dark btn-lg rounded-0" name="submit"
                                        value="buy">BELI</button>
                                </div>
                                @if (auth()->user())
                                <div class="col-5 d-grid">
                                    <button class="btn btn-dark btn-lg rounded-0"
                                        wire:click="addCart">KERANJANG</button>
                                </div>
                                @else
                                <div class="col-5 d-grid">
                                    <a href="{{ route('login') }}" class="btn btn-dark btn-lg rounded-0"
                                    >KERANJANG</a>
                                </div>
                                @endif



                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3 d-flex">
                                    <i class="far fa-heart px-2"></i>
                                    <h6 style="font-family: 'Myriad-Pro Bold';">Favorite</h6>
                                </div>
                                <div class="col-lg-3 d-flex">
                                    <i class="fas fa-share-alt px-2"></i>
                                    <h6 style="font-family: 'Myriad-Pro Bold';">Share</h6>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-lg-4 d-flex">
                                    <img class="border rounded-circle" height="70"
                                        src="{{ asset('assets/img/design_1.png') }}" alt="Product Image 4">
                                    <div class="d-flex justify-content-center align-items-center flex-column"
                                        style="padding-left : 10px">
                                        <h5>{{ $user->first_name }}</h5>
                                        <h6><span style="color : #00a83b">●</span>

                                            Online</h6>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row d-flex gap-5">
                                <div class="col-lg-2">
                                    <button type="submit" style="background-color: #e9e9e9;"
                                        class="btn btn-lg rounded-0 py-3 px-4" name="submit" value="buy">
                                        <span> <strong class="fs-4"> 0 </strong>Reviews</span>
                                    </button>
                                </div>

                                <div class="col-lg-2">
                                    <button type="submit" style="background-color: #e9e9e9"
                                        class="btn btn-lg rounded-0 py-3 px-4" name="submit" value="buy">
                                        <span><strong class="fs-4">{{ $countProduct }}</strong>
                                            Products</span></button>
                                </div>
                                <div class="col-lg-4 d-flex align-items-end">
                                    <div>
                                        <button class="btn btn-dark rounded-0"><img
                                                src="{{ asset('assets/img/icon-visit-store.svg') }}" alt="">
                                            Visit Store</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->
    <nav>
        <hr class="main mt-3 mb-3">
        <div class="main mt-5">
            <div class="tabs">
                <input type="radio" class="tabs_item" name="tabs-example" id="home_tab" checked>
                <label for="home_tab" class="tabs_name px-5 fs-4"
                    style="font-family: 'Myriad-Pro Bold';">Detail</label>
                <div class="tabs_content mt-3">
                    {{-- {{ $product->description }} --}}
                </div>
                <input type="radio" class="tabs_item" name="tabs-example" id="about_tab">
                <label for="about_tab" class="tabs_name px-5 fs-4"
                    style="font-family: 'Myriad-Pro Bold';">Reviews</label>
                <div class="tabs_content mt-3">
                    <p></p>
                </div>
            </div>

        </div>
    </nav>

    <script>
        $('.btn-color').click(function() {
            let img = $(this).attr('data-img');
            $('.main-image').attr('src', img)
        })
    </script>
</div>
