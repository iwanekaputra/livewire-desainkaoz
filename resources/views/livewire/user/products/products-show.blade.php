<div>
    <!-- Open Content -->
    <section class="">
        <div class="main pb-5">
            <div class="row">
                <div class="col-lg-6 mt-5">
                    <div class=" mb-3">
                        <div id="tshirt-capture" style="" class="front-main-image">
                            <div style="border : 0.5px solid black; width : calc(600px); height : calc(600px); background-image : url('{{ asset('uploads/imageProductVariant/' . $productDesign->productVariant->image) }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                id="product-main-image">
                                <div class="tshirt-layer-{{ $productId }} position-relative"
                                    style="width : calc({{ $productDesign->product->mockup->width_canvas }}px); top : calc({{ $productDesign->product->mockup->top_canvas }}px); left : calc({{ $productDesign->product->mockup->left_canvas }}px); height : calc({{ $productDesign->product->mockup->height_canvas }}px); ">
                                </div>
                            </div>
                        </div>

                        @if($productDesign->productDesignVariants->first())
                            <div id="tshirt-capture" style="width : calc(600px); height : calc(600px)" class="d-none back-main-image">
                                <div style="width : calc(600px); height : calc(600px); background-image : url('{{ asset('uploads/imageProductVariant/' . $productDesign->productDesignVariants->first()->product->productvariants()->where("view", 'Back')->first()->image) }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                    id="product-main-image-back">
                                    <div class="tshirt-layer-{{ $productId }}-back position-relative"
                                        style="width : calc({{ $productDesign->product->mockup->width_canvas }}px); top : calc({{ $productDesign->product->mockup->top_canvas }}px); left : calc({{ $productDesign->product->mockup->left_canvas }}px); height : calc({{ $productDesign->product->mockup->height_canvas }}px); ">
                                    </div>
                                </div>
                            </div>
                        @endif



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
                <div class="col-lg-5 mt-5 " style="margin-left : 50px">
                    <div class="">
                        <div class="card-body">
                            <h1 style="font-family: 'Myriad-Pro Bold';">{{ $title }}</h1>
                            <h6 class="py-2">{{ $design }} {{ $category }} designed and sold by <a href="#" class="text-decoration-none">{{ $username }}</a></h6>
                                    <div class="row">
                                        <div class="col-lg-2 mt-2">
                                            <h6>Color :</h6>
                                        </div>
                                    </div>
                                    <div class="row color-front">
                                        <div class="col-lg-8">
                                            <ul class="list-inline pb-3">
                                                <div>
                                                    <div class="mt-3 d-flex gap-2 colorr" id="product-color">
                                                        @foreach ($productDesign->product->productvariants->where('view', 'front')->groupBy('style.name')->first() as $productVariant)
                                                        <div style="width : 40px; height : 40px; background-color : {{ $productVariant->color }}; border : 1px solid silver"
                                                            class="color" id="{{ $productDesign->product->name }}" data-color="{{ $productVariant->color }}" data-id="{{ $productVariant->id }}" data-idProduct="{{ $productDesign->id }}" data-image="{{ $productVariant->image }}" data-name="{{ $productDesign->product->name }}" data-view="{{ $productVariant->view }}">
                                                        </div>
                                                        @endforeach
                                                    </div>
        
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                    {{-- @if ($productDesign->productDesignVariants->first())
                                    <div class="row color-back d-none">
                                        <div class="col-lg-8">
                                            <ul class="list-inline pb-3">
                                                <div>
                                                    <div class="mt-3 d-flex gap-2 colorr" id="product-color">
                                                        @foreach ($productDesign->product->productvariants->where('view', 'Back')->groupBy('style.name')->first() as $productVariant)
                                                        <div style="width : 40px; height : 40px; background-color : {{ $productVariant->color }}; border : 2px solid silver"
                                                            class="color" id="{{ $productDesign->product->name }}" data-color="{{ $productVariant->color }}" data-id="{{ $productVariant->id }}" data-idProduct="{{ $productDesign->id }}" data-image="{{ $productVariant->image }}" data-name="{{ $productDesign->product->name }}">
                                                        </div>
                                                        @endforeach
                                                    </div>
        
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                    @endif --}}
        
                                    {{-- @if ($productVariants->first()->style)
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
                            @endif --}}
                            <div class="row">
                                <div class="col-lg-2">
                                    <label>Style : </label>
                                </div>
        
                                <div class="col-lg-8">
                                    <select class="form-select style" id="style" aria-label="Default select example" data-name="{{ $productDesign->product->name }}" data-idProduct="{{ $productDesign->product->id }}">
                                        @foreach ($productDesign->product->productvariants->groupBy('style.name') as $productVariant  => $value)
                                            <option value="{{ $productVariant }}" data-name="{{ $productDesign->product->name }}">{{ $productVariant }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @if($productDesign->productDesignVariants->first())
                            <div class="row">
                                <div class="col-lg-8 mt-4">
                                    <ul class="list-inline pb-3">
                                        <div>
                                            <div class="d-flex justify-content-between">
                                                @foreach ($productDesign->product->productvariants->groupBy('view') as $productVariant => $value)
                                                    <button class="btn btn-dark rounded-0 {{ strtolower($productVariant) }}-image" style="width : 45%" data-id="{{ $productDesign->product->id }}" data-name="{{ $productDesign->product->name }}" data-view="{{ $productVariant }}">{{ $productVariant }}</button>
                                                @endforeach
                                            </div>

                                        </div>
                                    </ul>
                                </div>
                            </div>
                            @endif

                            


                            {{-- <input type="hidden" name="product-title" value="Activewear"> --}}
                            @if ($productDesign->product->productSizes->count())
                            <div class="row">
                                <div class="col-lg-12 mt-4">
                                    <h6>Size :</h6>
                                </div>
                                <div class="col-lg">
                                    <ul class="list-inline">
                                        <div>
                                            @foreach ($productDesign->product->productSizes as $productSize)
                                            <li class="list-inline-item mt-2">
                                                <span
                                                    class="btn btn-size d-flex justify-content-center align-items-center rounded-0 fw-bold"
                                                    style="width : 100px; height : 40px;background-color: #e9e9e9;"
                                                    data-number="{{ $productSize->number }}">{{ $productSize->number }}</span>
                                            </li>
                                            @endforeach

                                        </div>
                                    </ul>
                                </div>
                            </div>
                            @endif

                            <div class="row mt-2 ">
                                
                                @if($productDesign->productDesignVariants()->first())
                                    <span class="fs-2 ">Rp. </span>
                                    <input type="text"  style="font-family: 'Myriad-Pro';" id="product-price" class="text-dark  border-0 fs-2" value="{{  (int) $productDesign->product->price + (int) $productDesign->price_design + 10000 }}" disabled>
                                @else
                                <div class="col">
                                    <span class="fs-2">Rp. </span>
                                    <input type="text"  style="font-family: 'Myriad-Pro';" id="product-price" class=" text-dark fw-bold border-0 fs-2" value="{{  (int) $productDesign->product->price + (int) $productDesign->price_design }}" disabled>

                                </div>
                                @endif

                            </div>

                            <h6>Shipping</h6>
                            <div class="row mt-4 pb-3">
                                <div class="col-5 d-grid">
                                    <button type="submit" class="btn btn-dark btn-lg rounded-0" name="submit"
                                        value="buy">BELI</button>
                                </div>
                                @if (auth()->user())
                                <div class="col-5 d-grid">
                                    <button class="btn btn-dark btn-lg rounded-0" id="cart">KERANJANG</button>
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
                                        src="{{ asset('assets/img/design_1.jpg') }}" alt="Product Image 4">
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
                                        <span><strong class="fs-4">7</strong>
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
                    {!! $productDesign->product->description !!}
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"
        integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"
        integrity="sha512-wUa0ktp10dgVVhWdRVfcUO4vHS0ryT42WOEcXjVVF2+2rcYBKTY7Yx7JCEzjWgPV+rj2EDUr8TwsoWF6IoIOPg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/konva@9.2.0/konva.min.js"></script>


    <script>
        $('.btn-color').click(function() {
            let img = $(this).attr('data-img');
            $('.main-image').attr('src', img)
        })

        $('.tshirt-color').click(function() {
            let img = $(this).attr('data-image');
            document.getElementById('tshirt-main-image').style.backgroundImage =
                `url('{{ asset('assets/img/${img}') }}')`;
        })
    </script>


    <script>
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
            theImg = new Konva.Image({
                name: 'rect',
                image: img,
                x: sumbuX,
                y: sumbuY,
                width: widthLogo,
                height: heightLogo,
                rotation: rotation
            });

            layer.add(theImg);
            layer.draw();
        }

        let productDesign = @js($productDesign);
        getImg(`.tshirt-layer-${productDesign.id}`, parseInt(productDesign.product.mockup.width_canvas), parseInt(productDesign.product.mockup.height_canvas), `{{ asset('uploads/design/${productDesign.image_design.image}' ) }}`, productDesign.sumbu_x, productDesign.sumbu_y, productDesign.width, productDesign.height, productDesign.rotation)

        if(productDesign.product_design_variants[0]) {
            getImg(`.tshirt-layer-${productDesign.id}-back`, parseInt(productDesign.product.mockup.width_canvas), parseInt(productDesign.product.mockup.height_canvas), `{{ asset('uploads/design/${productDesign.product_design_variants[0].image_design.image}' ) }}`, productDesign.product_design_variants[0].sumbu_x, productDesign.product_design_variants[0].sumbu_y, productDesign.product_design_variants[0].width, productDesign.product_design_variants[0].height, productDesign.product_design_variants[0].rotation)
        }




    </script>

    <script>
        let color;
        $(document).on('click', '.color' , function () {

            // imageDefaultColor.push({$(this).attr('data-id')});
            let dataIdProductVariant = $(this).attr('data-id');
            let dataView = $(this).attr('data-view');

            let image = $(this).attr('data-image');
            let dataIdProduct = $(this).attr('data-idProduct');



            let name = $(this).attr('data-name');
            color = $(this).attr('data-color');



                document.querySelector(`#product-main-image`).style.backgroundImage =
                `url('{{ asset('uploads/imageProductVariant/${image}') }}')`;

                let products = @js($productDesign).product.productvariants;
                let productVariants =products.filter(el => el.view == 'Back' && el.color == color)
                document.querySelector(`#product-main-image-back`).style.backgroundImage =
                `url('{{ asset('uploads/imageProductVariant/${productVariants[0].image}') }}')`;

        })

        $('#style').change(function () {
            let name = $(this).find(':selected').attr('data-name');
            let value = $(this).val();
            let idProduct = $(this).attr('data-idProduct');

            let products = @js($productDesign->product);
            let productVariants = products.productvariants.filter(e => e.style.name == value && e.view == 'front');

            const priceProduct = groupBy(productVariants, 'product_id');

            if(value == 'Lengan Panjang') {
                $('.back-image').addClass('d-none')
            }

            if(value == 'Lengan Pendek') {
                $('.back-image').removeClass('d-none')
            }

            if(value == 'Lengan Pendek') {
                if(@js($productDesign).product_design_variants.length) {
                    let p = parseInt(@js($productDesign).product.price) + parseInt(@js($productDesign).price_design) + 10000;
                    $(`#product-price`).val(`${p.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`)
                }
            } else {
                let pr = parseInt(priceProduct[idProduct][0].price) + parseInt(@js($productDesign).price_design);
                $(`#product-price`).val(`${pr.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`)
            }

            if(color && value == 'Lengan Pendek') {
                let imageColor = productVariants.filter(el => el.color == color);
                document.querySelector(`#product-main-image`).style.backgroundImage = `url('{{ asset('uploads/imageProductVariant/${imageColor[0].image}') }}')`;
            } else {
                let imageColor = productVariants.filter(el => el.color == color && el.style.name == value);
                document.querySelector(`#product-main-image`).style.backgroundImage = `url('{{ asset('uploads/imageProductVariant/${productVariants[0].image}') }}')`;
            }



            $(`#product-color`).html(productVariants.map(el => {
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


        $('.back-image').click(function() {
            $('.back-main-image').removeClass('d-none');
            $('.front-main-image').addClass('d-none');
        })

        $('.front-image').click(function() {
            $('.front-main-image').removeClass('d-none');
            $('.back-main-image').addClass('d-none');
        })

    </script>

    <script>

        let addColor;
        $('.color').click(function() {
            addColor = $(this).attr('data-color');
        })

        let addSize;

        $('#cart').click(function(e) {
            if(!addColor) {
                swal({
                    title: 'mohon pilih warna',
                    text: '',
                    icon: 'warning',
                    timer : 3000
                })
                return;
            }

            if(!addSize) {
                swal({
                    title: 'mohon pilih ukuran',
                    text: '',
                    icon: 'warning',
                    timer : 3000
                })
                return;
            }
            let style = $('#style').find(':selected').val();
            let price = $('#product-price').val();
            let token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: `/addCart`,
                type: "POST",
                cache: false,
                data: {
                    "product_design_id" : {{ $productDesign->id }},
                    "size" : addSize,
                    "color" : addColor,
                    "quantity" : 1,
                    "style": style,
                    "price": price,
                    "_token": token
                },
                success:function(response){
                    swal({
                        title: 'Berhasil masuk keranjang',
                        text: '',
                        icon: 'success',
                        timer : 3000
                    })
                },
            })
        })
    </script>
</div>
