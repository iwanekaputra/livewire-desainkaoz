<div class="main mt-2">

    {{-- carousel --}}
    <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/img/carousel-1.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/carousel-2.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/carousel-3.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/carousel-4.png') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    {{-- end corousel --}}

    {{-- kategori produk --}}
    <div class="row mt-4">
        <h5 class="text-center" style="font-family:'Myriad-Pro Bold';">Produk</h5>
    </div>
    <div class="row mt-2">
        @foreach ($categories as $category)
            <div class="col-lg-2">
                <a href="{{ route('products.category', $category->id) }}">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('produk/' . $category->icon) }}" alt="">
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    {{-- end kategori produk --}}
</div>

{{-- desain kategori --}}
<div class="child-main">
    <div class="row mt-3">
        <h5 class="text-center" style="font-family:'Myriad-Pro Bold';">Desain Kategori</h5>
    </div>
    <div class="row">
        <div class="cover">
            <button class="button left" onclick="leftScroll()">
                <span class="carousel-control-prev-icon bg-secondary" aria-hidden="true"></span>
            </button>
            <div class="scroll-images">
                @foreach ($designCategories as $designCategory)
                    <div class="col-lg-2">
                        <div class="child">
                            <a href="{{ route('products.design.category', $designCategory->id) }}">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img src="{{ asset('desainkategori/' . $designCategory->icon) }}" alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="button right" onclick="rightScroll()">
                <span class="carousel-control-next-icon bg-secondary" aria-hidden="true"></span>
            </button>
        </div>
    </div>

</div>
</div>





<div class="main mt-5">
    <hr>
    {{-- products --}}
    <div class="d-flex justify-content-between">
        <h4 style="font-family:'Myriad-Pro Bold';">Featured Products</h4>
        {{-- <h4><a href="{{ route('products.index') }}" class="text-decoration-none text-dark">More <i class="fa fa-arrow-right fs-5" aria-hidden="true"></i>
        </a></h4> --}}
    </div>
    <div class="row mt-2 justify-content-start" style="gap : 2rem">
        @forelse ($productDesigns as $productDesign)
        @if ($productDesign->product->category_id == '6')
        <div class="col-lg-2 col-6 mt-2">
            <a class="text-decoration-none text-dark" >
                <div class="card child-card border-0">
                    <div id="container-{{ $productDesign->id }}" style="width : calc(500px / 3); height : calc(500px / 3)">
                        <div style="width : calc(500px / 3); height : calc(500px / 3); background-repeat : no-repeat; background-size : 100% 100%"
                            >
                        </div>
                    </div>
                </div>
                <div class="card-body mt-2 p-0">
                    <h6 class="card-title" style="font-family:'Myriad-Pro Bold';">
                       {{ $productDesign->imageDesign->title }}</h6>
                    <p class="card-title">By {{ $productDesign->user->first_name }}</p>
                    <h6 class="mt-2" style="font-family:'Myriad-Pro Bold';">Rp.
                        {{ number_format((int) $productDesign->price_design + (int) $productDesign->product->price, 0, ',', '.') }}</h6>
                </div>
            </a>
        </div>
        @else
        <div class="col-lg-2 col-6 mt-2">
            <a class="text-decoration-none text-dark" href="{{ route('products.show', $productDesign->id) }}">
                <div class="card child-card border-0">
                    <div id="tshirt-capture" style="width : calc(500px / 3); height : calc(500px / 3)">
                        <div style="width : calc(500px / 3); height : calc(500px / 3); background-image : url('{{ asset('uploads/imageProductVariant/' . $productDesign->productvariant->image) }}'); background-repeat : no-repeat; background-size : 100% 100%"
                            id="tshirt-main-image">
                            <div class="tshirt-layer-{{ $productDesign->id }} position-relative"
                                style="width : calc(200px / 3); top : calc(40px / 3); left : calc(150px / 3); height : calc(380px / 3); ">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body mt-2 p-0">
                    <h6 class="card-title" style="font-family:'Myriad-Pro Bold';">
                       {{ $productDesign->imageDesign->title }}</h6>
                    <p class="card-title">By {{ $productDesign->user->first_name }}</p>
                    <h6 class="mt-2" style="font-family:'Myriad-Pro Bold';">Rp.
                        {{ number_format((int) $productDesign->price_design + (int) $productDesign->product->price, 0, ',', '.') }}</h6>
                </div>
            </a>
        </div>
        @endif
        @empty

        @endforelse





    </div>
</div>
{{-- end products --}}

<div class="main">
    {{-- design --}}
    <hr>
    <div class="d-flex justify-content-between mt-4">
        <h4 style="font-family:'Myriad-Pro Bold';">Featured Design</h4>
        {{-- <h4><a href="" class="text-decoration-none text-dark">More <i class="fa fa-arrow-right fs-5" aria-hidden="true"></i>
        </a></h4> --}}
    </div>
    <div class="row" style="gap : 2rem">
        @forelse ($imageDesigns as $imageDesign)
        <div class="col-lg-2 col-6 mt-2">
            <div class="card child-card border-0">

                    <img src="{{ asset('uploads/design/' . $imageDesign->image) }}" class="" alt="..." style="border : 0.5px solid black;">
                <div class="border shadow d-flex justify-content-center align-items-center rounded-circle position-absolute top-0 end-0"
                            style="width : 30px; height : 30px">
                            <div class="con-like">
                                <input title="like" type="checkbox" class="like">
                                <div class="checkmark">
                                    <svg viewBox="0 0 24 24" class="outline" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z">
                                        </path>
                                    </svg>
                                    <svg viewBox="0 0 24 24" class="filled" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z">
                                        </path>
                                    </svg>
                                    <svg class="celebrate" width="100" height="100"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <polygon points="10,10 20,20" class="poly"></polygon>
                                        <polygon points="10,50 20,50" class="poly"></polygon>
                                        <polygon points="20,80 30,70" class="poly"></polygon>
                                        <polygon points="90,10 80,20" class="poly"></polygon>
                                        <polygon points="90,50 80,50" class="poly"></polygon>
                                        <polygon points="80,80 70,70" class="poly"></polygon>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="card-body mt-2 p-0">
                            <h6 class="card-title" style="font-family:'Myriad-Pro Bold';">{{ $imageDesign->title }}
                            </h6>
                            <p class="card-title">By {{ $productDesign->user->first_name }}</p>
                        </div>
            </div>
        </div>
        @empty
            <div class="text-center alert alert-dark">
                Tidak Ada Design
            </div>
        @endforelse

    </div>
</div>
{{-- end design --}}

<div class="main">

    {{-- artist --}}
    <hr>
    <div class="row mt-4">
        <h4 style="font-family:'Myriad-Pro Bold';">Featured Artist</h4>
    </div>
    <div class="row mt-4" style="margin-bottom: 5rem; gap: 2rem">
        @forelse ($stores as $store)
        <div class="col-lg-2 mt-2 mb-5">
            <div class="card border-0 shadow child-card" style="height : 300px">
                <img src="{{ asset('uploads/images/' . $store->front_image) }}" class="card-img-top" alt="...">
                <div class="card-body d-block text-center profile position-relative border-0" style="top : -40px;">
                    <img src="{{ asset('uploads/images/' . $store->image) }}" alt="" width="40px" class="rounded-circle img-thumbnail">
                    <p style="font-size: 15px" class="mt-2" style="font-family:'Myriad-Pro Bold';">DesainKaoz</p>
                    <a href="{{ route('designer.shop', $store->user->id) }}" class="btn btn-white rounded-0 shadow">View Shop</a>
                </div>
            </div>
        </div>
        @empty
            <div class="text-center alert alert-dark">
                Tidak Ada toko
            </div>
        @endforelse
        <hr>
    </div>

    <div class="row justify-content-between p-3 align-items-center" style="background-color: #f9f9f9">
        <div class="col-lg-6">
            <img src="{{ asset('assets/img/logo-ulasan.svg') }}" alt="" class="w-25">
            <span class="h5 ms-4" style="font-family:'Myriad-Pro Bold';"> Ulasan Desainkaoz Online</span>
        </div>
        <div class="col-lg-6">
            <div class="d-flex gap-3 justify-content-end align-items-center">
                <h1 style="font-size: 3rem;font-family:'Myriad-Pro Bold';">0.0<strong class="fs-4"
                        style="font-family:'Myriad-Pro Bold';">/0</strong> </h1>
                <div>
                    <i class="fa fa-star fs-5" aria-hidden="true"></i>
                    <i class="fa fa-star fs-5" aria-hidden="true"></i>
                    <i class="fa fa-star fs-5" aria-hidden="true"></i>
                    <i class="fa fa-star fs-5" aria-hidden="true"></i>
                    <i class="fa fa-star fs-5" aria-hidden="true"></i>
                    <p class="text-center" style="font-size: 12px">000 Total Ulasan</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end artist --}}


<div class="main">
    <div class="row mt-5">
        <div class="col-12">
            <h1 class="text-center"><img src="{{ asset('assets/img/logo-us.svg') }}" class="w-25"></h1>
            <h3 class="text-center fs-3" style="font-family: 'Myriad-Pro Bold'; color:#4c4c4c;">Platform indie art
                terbaik hasil kurator!</h3>
            <h6 class="text-center fs-5" style="color: #4c4c4c;font-family:'Myriad-Pro';">Print On Demand Kaos
                Distro<br>Dengan Kualitas Cetak Resolusi Tinggi</h6>
        </div>

        <hr class="mt-4 mb-4">
    </div>
    <div class="row justify-content-evenly mt-4">
        <div class="col-2">
            <img src="{{ asset('assets/img/us-1.svg') }}" alt="" srcset="" class="img-fluid w-75 ">
        </div>
        <div class="col-2">
            <img src="{{ asset('assets/img/us-2.svg') }}" alt="" srcset="" class="img-fluid w-75 ">
        </div>
        <div class="col-2">
            <img src="{{ asset('assets/img/us-3.svg') }}" alt="" srcset="" class="img-fluid w-75 ">
        </div>
        <div class="col-2">
            <img src="{{ asset('assets/img/us-4.svg') }}" alt="" srcset="" class="img-fluid w-75 ">
        </div>
        <div class="col-2">
            <img src="{{ asset('assets/img/us-5.svg') }}" alt="" srcset="" class="img-fluid w-75 ">
        </div>
    </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"
        integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"
        integrity="sha512-wUa0ktp10dgVVhWdRVfcUO4vHS0ryT42WOEcXjVVF2+2rcYBKTY7Yx7JCEzjWgPV+rj2EDUr8TwsoWF6IoIOPg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/konva@9.2.0/konva.min.js"></script>

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


        let productDesigns = @js($productDesigns).data.filter(el => el.product.category_id !== 6);
        productDesigns.map(function(productDesign)  {
            getImg(`.tshirt-layer-${productDesign.id}`, 200 / 3, 380 / 3, `{{ asset('uploads/design/${productDesign.image_design.image}' ) }}`, productDesign.sumbu_x / 3, productDesign.sumbu_y / 3, productDesign.width / 3, productDesign.height / 3, productDesign.rotation)
        })
    </script>

    <script>
        let productStickers = @js($productDesigns).data.filter(el => el.product.category_id === 6);

        productStickers.map(function(productSticker) {

            var stage = new Konva.Stage({
          container: `container-${productSticker.id}`,
          width: window.innerWidth,
          height: window.innerHeight,
        });

        var layer = new Konva.Layer();
        stage.add(layer);

        Konva.Image.fromURL(`{{ asset('uploads/design/${productSticker.image_design.image}') }}`, function (image) {
          layer.add(image);
          image.setAttrs({
            x: 0,
            y: 0,
            borderSize: 5,
            borderColor: '#e3e6e4',
            width : 166,
            height : 166
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
        })

    </script>
</div>
