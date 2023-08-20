<div>
    {{-- Be like water. --}}
    <div class="row mt-5">
        <div class="col-lg-6">
            <table class="table mt-5">
                <thead>
                  <tr>
                    <th scope="col">No Id</th>
                    <th scope="col">:</th>
                    <th scope="col">{{ $productDesign->id }}</th>
                  </tr>
                  <tr>
                    <th scope="col">Kategori</th>
                    <th scope="col">:</th>
                    <th scope="col">{{ $productDesign->imageDesign->designCategory->name }}</th>
                  </tr>
                  <tr>
                    <th scope="col">Name Product</th>
                    <th scope="col">:</th>
                    <th scope="col">{{ $productDesign->imageDesign->title }}</th>
                  </tr>
                  <tr>
                    <th scope="col">Harga Design</th>
                    <th scope="col">:</th>
                    <th scope="col">Rp. {{ number_format($productDesign->price_design, 0, ',','.') }}</th>
                  </tr>
                  <tr>
                    <th scope="col">Total Harga</th>
                    <th scope="col">:</th>
                    <th scope="col">Rp. {{ number_format((int) $productDesign->price_design + (int) $productDesign->product->price, 0, ',','.') }}</th>
                  </tr>
                </thead>
            </table>
            <div class="px-2 mt-2">
                <p class="fw-bold">Deskripsi : </p>
                <p>{{ $productDesign->imageDesign->description }}</p>
            </div>
        </div>
        
        <div class="col-lg-6">
            @if ($productDesign->product->category_id == '6')
                <div  style="width : 500px; height : 500px">
                    <div style="width : 500px; height : 500px; background-repeat : no-repeat; background-size : 100% 100%"
                        class="main-image">
                        <div class="sticker-layer position-relative" id="container"
                            style="width : 200px; top : 40px; left : 150px; height : 380px; ">
                        </div>
                    </div>
                </div>
            @else
                <div id="tshirt-capture" style="width : 500px; height : 500px">
                    <div style="width : 500px; height : 500px; background-image : url('{{ asset('uploads/imageProductVariant/' . $productDesign->productvariant->image) }}'); background-repeat : no-repeat; background-size : 100% 100%"
                        class="-main-image">
                        <div class="layer position-relative"
                            style="width : 200px; top : 40px; left : 150px; height : 380px; ">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="row col-lg-3">
        <div class="col">
            <button class="btn btn-success" wire:click="alertConfirm({{ $productDesign->id }})">Approve Design</button>
        </div>
        <div class="col">
            <button class="btn btn-warning">Disapprove Design</button>
        </div>
    </div>

    <script src="https://unpkg.com/konva@9.2.0/konva.min.js"></script>
    <script>
        let stage = new Konva.Stage({
                container: `.layer`,
                width: 200,
                height: 380,
            });

            var layer = new Konva.Layer();
            stage.add(layer);

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
            console.log(productDesign)
            getImg(`.layer`, 200, 380, `{{ asset('uploads/design/${productDesign.image_design.image}' ) }}`, productDesign.sumbu_x, productDesign.sumbu_y, productDesign.width, productDesign.height, productDesign.rotation)
    </script>
    <script>
        let imageDesign = @js($productDesign);
        stickerImage(`{{ asset('uploads/design/${imageDesign.image_design.image}') }}`, 'container');

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
    </script>
</div>