<div>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Design</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"></a>
                Approve Design on your page
                </li>
            </ol>
            </nav>
        </div>
    </div>
        <!--end breadcrumb-->
    <div class="card">
            <div class="card-header py-3 bg-transparent"> 
                <div class="d-sm-flex align-items-center">
                    <h5 class="mb-2 mb-sm-0">Edit Product</h5>
                    <div class="ms-auto">
                        {{-- <button type="button" class="btn btn-secondary rounded-0">Save to Draft</button>
                        <button class="btn btn-dark px-4 rounded-0">Publish Now</button> --}}
                    </div>
                </div>
            </div>
        <div class="card-body">
            {{-- Be like water. --}}
            <div class="row">
                <div class="col-lg-6">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No Id</th>
                            <th scope="col">:</th>
                            <th scope="col">{{ $imageDesign->id }}</th>
                          </tr>
                          <tr>
                            <th scope="col">Kategori</th>
                            <th scope="col">:</th>
                            <th scope="col">{{ $imageDesign->designCategory->name }}</th>
                          </tr>
                          <tr>
                            <th scope="col">Name Product</th>
                            <th scope="col">:</th>
                            <th scope="col">{{ $imageDesign->title }}</th>
                          </tr>
                         
                        </thead>
                    </table>
                </div>
                    <p class="fw-bold">Deskripsi : </p>
                    <p>{{ $imageDesign->description }}</p>
                <div class="col-lg-4">
                    <img src=" {{ asset('uploads/design/' . $imageDesign->image) }}" alt="" width="100%"></td>
                </div>
                
                
            </div>
            <div class="row col-lg-4">
                <div class="col">
                    <form wire:submit.prevent="alertConfirm({{ $imageDesign->id }})" method="POST" enctype="multipart/form-data">  
                        <input type="text" wire:model="image_design_id" class="form-control" placeholder="Kode" hidden>
                        <button class="btn btn-dark px-4 rounded-0">Approve</button>
                    </form>
                </div>
                <div class="col">
                    <form wire:submit.prevent="disapproveConfirm({{ $imageDesign->id }})" method="POST" enctype="multipart/form-data">  
                        <input type="text" wire:model="image_design_id" class="form-control" placeholder="Kode" hidden>
                        <button class="btn btn-warning px-4 rounded-0">Diapprove</button>
                    </form>
                </div>
                <div class="col">
                    <a href="{{ asset('uploads/design/' .$imageDesign->image)}}" download="{{$imageDesign->name}}" class="btn btn-success px-4 rounded-0">Download Design</a>
                </div>

            </div>

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