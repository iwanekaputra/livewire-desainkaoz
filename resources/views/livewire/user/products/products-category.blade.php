<div>
<div class="d-flex justify-content-center">
    <div style="width : 80%">
        <div class="row mt-5">
            <div class="col-lg-3">
                <div class="d-flex flex-column">
                    <div class="col">
                        <h5 style="font-family: 'Myriad-Pro Bold';">Produk</h5>
                        <div class="border shadow py-3 px-3">
                            @foreach ($categories as $category)
                                <p class="px-2 text-bold"><a href="{{ route('products.category', $category->id) }}" class="text-decoration-none text-dark">{{ $category->name }}</a></p>
                            @endforeach
                        </div>
                    </div>
                    <div class="col mt-4">
                        <h5 style="font-family: 'Myriad-Pro Bold';">Filters</h5>
                        <div class="border shadow py-3 px-3">
                            <p class="px-2"><a class="text-decoration-none text-dark">All T shirt</a></p>
                            @foreach ($styles as $style)
                                <p class="px-4"><a href="{{ route('products.category', $style->id) }}" class="text-decoration-none text-dark">{{ $style->name }}</a></p>
                            @endforeach
                            <hr>
                            <p>Size</p>
                            <div class="d-flex flex-column">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      S
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      M
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      L
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      XL
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      XXL
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <p>Color</p>
                                <div class="row d-flex gap-1">
                                    <div class="col-lg-2">
                                        <div style="width : 30px; height : 30px; background-color : white; border : 2px solid silver" id="tshirt-white">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div style="width : 30px; height : 30px; background-color : #797979; border : 2px solid #silver" id="tshirt-abu">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div style="width : 30px; height : 30px; background-color : #5a1818; border : 2px solid silver" id="tshirt-merah">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div style="width : 30px; height : 30px; background-color : #434d2a; border : 2px solid silver" id="tshirt-hijau">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div style="width : 30px; height : 30px; background-color : #222222; border : 2px solid silver" id="tshirt-hitam">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div style="width : 30px; height : 30px; background-color : #233259; border : 2px solid silver" id="tshirt-biru">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div style="width : 30px; height : 30px; background-color : #ab6a01; border : 2px solid silver" id="tshirt-kuning">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="d-flex">
                    <h6>T Shirt</h6>
                    <h6 class="text-secondary" style="padding-left: 100px">100,000 result</h6>
                </div>
                <div class="row" style="gap: 2rem">
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
                    <div class="alert alert-dark text-center" role="alert">
                        Tidak ada product berdasarkan Kategori yang di cari
                        </div>
                    @endforelse
                    {{-- <div class="d-flex justify-content-center">
                        {{ $productDesigns->links() }}
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h1></h1>
            </div>
        </div>
    </div>
</div>

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


    let productDesigns = @js($productDesigns).filter(el => el.product.category_id !== 6);
    productDesigns.map(function(productDesign)  {
        getImg(`.tshirt-layer-${productDesign.id}`, 200 / 3, 380 / 3, `{{ asset('uploads/design/${productDesign.image_design.image}' ) }}`, productDesign.sumbu_x / 3, productDesign.sumbu_y / 3, productDesign.width / 3, productDesign.height / 3, productDesign.rotation)
    })
</script>

<script>
    let productStickers = @js($productDesigns).filter(el => el.product.category_id === 6);

    console.log(productStickers)
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
