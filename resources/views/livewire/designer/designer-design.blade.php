<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <a class="btn btn-dark rounded-0" href="{{ route('designer.upload-design') }}">Upload Design</a>
            </div>
        </div>
        <hr>

        <div class="row">
            @if ($productDesigns->count() === 0)
                <div class="alert alert-dark text-center" role="alert">
                    Tidak Ada Design Yang Butuh Verifikasi
                </div>
            @endif
            @foreach ($productDesigns as $productDesign)
                <div class="col-lg-7">
                    <div class=" mb-3">
                        <div id="tshirt-capture" style="width : calc(500px); height : calc(500px)">
                            <div style="width : calc(500px); height : calc(500px); background-image : url('{{ asset('uploads/imageProductVariant/' . $productDesign->productVariant->image) }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                id="tshirt-main-image">
                                <div class="tshirt-layer-{{ $productDesign->id }} position-relative"
                                    style="width : calc(200px); top : calc(40px); left : calc(150px); height : calc(380px); ">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nomer ID</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            value="{{ $productDesign->id }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            value="{{ $productDesign->imageDesign->title }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            value="{{ $productDesign->imageDesign->description }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            value="{{ $productDesign->imageDesign->designCategory->name }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tags</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            value="{{ $productDesign->imageDesign->tags }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">URL</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            value="" disabled>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
        <div class="row mt-3">
            <p>Daftar desain yang sudah disetujui.</p>
            <p>Informasi jumlah penjualan setiap item.</p>
        </div>
        <div class="row mt-4 justify-content-start" style="gap : 2rem">
            @forelse ($productDesignApproved as $productDesignApprove)
            @if ($productDesignApprove->product->category_id == '6')
                <div class="col-lg-2 col-6 mt-2">
                    <a class="text-decoration-none text-dark" >
                        <div class="card child-card border-0">
                            <div id="container-{{ $productDesignApprove->id }}" style="width : calc(500px / 3); height : calc(500px / 3)">
                                <div style="width : calc(500px / 3); height : calc(500px / 3); background-repeat : no-repeat; background-size : 100% 100%"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="card-body mt-2 p-0">
                            <h6 class="card-title" style="font-family:'Myriad-Pro Bold';">
                            {{ $productDesignApprove->imageDesign->title }}</h6>
                            <p class="card-title">By {{ $productDesignApprove->user->first_name }}</p>
                            <h6 class="mt-2" style="font-family:'Myriad-Pro Bold';">Rp.
                                {{ number_format((int) $productDesignApprove->price_design + (int) $productDesignApprove->product->price, 0, ',', '.') }}</h6>
                        </div>
                    </a>
                </div>
            @else
                <div class="col-lg-2 col-6 mt-2">
                    <a class="text-decoration-none text-dark" href="{{ route('products.show', $productDesignApprove->id) }}">
                        <div class="card child-card border-0">
                            <div id="tshirt-capture" style="width : calc(500px / 3); height : calc(500px / 3)">
                                <div style="width : calc(500px / 3); height : calc(500px / 3); background-image : url('{{ asset('uploads/imageProductVariant/' . $productDesignApprove->productvariant->image) }}'); background-repeat : no-repeat; background-size : 100% 100%"
                                    id="tshirt-main-image">
                                    <div class="tshirt-layer-{{ $productDesignApprove->id }} position-relative"
                                        style="width : calc(200px / 3); top : calc(40px / 3); left : calc(150px / 3); height : calc(380px / 3); ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body mt-2 p-0">
                            <h6 class="card-title" style="font-family:'Myriad-Pro Bold';">
                               {{ $productDesignApprove->imageDesign->title }}</h6>
                            <p class="card-title">By {{ $productDesignApprove->user->first_name }}</p>
                            <h6 class="mt-2" style="font-family:'Myriad-Pro Bold';">Rp.
                                {{ number_format((int) $productDesignApprove->price_design + (int) $productDesignApprove->product->price, 0, ',', '.') }}</h6>
                        </div>
                    </a>
                </div>
            @endif
            @empty
                <div class="alert alert-dark text-center" role="alert">
                    Tidak ada design yang sudah di setujui
                </div>
            @endforelse

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

        let productDesignApproved = @js($productDesignApproved);
         let tes = productDesignApproved.data.filter(el => el.product.category_id !== 6)
        tes.map(function(productDesignApprove) {
            // console.log(productDesignApprove.id)
            getImg(`.tshirt-layer-${productDesignApprove.id}`, 200 / 3, 380 / 3, `{{ asset('uploads/design/${productDesignApprove.image_design.image}' ) }}`, productDesignApprove.sumbu_x / 3, productDesignApprove.sumbu_y / 3, productDesignApprove.width / 3, productDesignApprove.height / 3, productDesignApprove.rotation)
        })
    </script>

<script>
    let productStickers = @js($productDesignApproved);
    let stickers = productStickers.data.filter(el => el.product.category_id === 6);

    stickers.map(function(productSticker) {

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

    let productDesigns = @js($productDesigns);
    let productDesign = productDesigns.data;
    productDesign.map(el =>  getImg(`.tshirt-layer-${el.id}`, 200, 380, `{{ asset('uploads/design/${el.image_design.image}' ) }}`, el.sumbu_x, el.sumbu_y, el.width, el.height, el.rotation)
)


</script>

</div>
