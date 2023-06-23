<div>
    {{-- upload design --}}
    <div class="main">
        <div class="row mt-5">
            <div class="col-lg-4" style="{{ $step === 1 ? "background-color: #9da19e" : "background-color: silver" }}" >
                <h3 class="text-center">Upload Design</h3>
            </div>
            <div class="col-lg-4" style="{{ $step === 2 ? "background-color: #9da19e" : "background-color: silver" }}">
                <h3 class="text-center">Harga</h3>
            </div>
            <div class="col-lg-4" style="{{ $step === 3 ? "background-color: #9da19e" : "background-color: silver" }}">
                <h3 class="text-center">Publish</h3>
            </div>
       </div>
       @if($step === 1)
       <div class="container">
            <div class="row mt-4 justify-content-center">
                <div class="col-lg-4">
                    <div style="width : 300px; height: 300px; border : 1px dashed black" class="d-flex align-items-center justify-content-center">
                            <img wire:ignore.self id="design-image" style="width:100%;height:100%;">
                    </div>
                    <h1 class="text-center"><button class="btn btn-warning rounded-0" onclick="document.querySelector('.file_input').click()">Upload Image</button></h1>
                    <input type="file" class="file_input" style="display: none" wire:model="imageDesign">
                </div>
            </div>
            <hr>
            <div class="row">
                <nav>
                    <div class="container">
                        <div class="tabs">
                            <input type="radio" class="tabs_item" name="tabs-example" id="home_tab" checked>
                            <label for="home_tab" class="tabs_name px-5"><img src="{{ asset('storage/produk/tshirt.png') }}" alt="" width="100"></label>
                                <div class="tabs_content mt-3">
                                    <div class="row mt-2">
                                        <div class="col-lg-7">
                                            <div  id="capture" style="width : 500px; height : 500px">
                                                <div style="width : 500px; height : 500px; background-image : url('{{ asset("assets/img/product_1.png") }}'); background-repeat : no-repeat; background-size : 100% 100%" id="main-image">
                                                    <div id="container" class="position-relative" style="width : 200px; top : 40px; left : 150px; height : 380px; ">
                                                    </div>
                                            </div>
                                        </div>

                                        </div>


                                        <div class="col-lg-5">
                                            <button class="btn rounded-0 w-100 file_input" style="background-color: #c0c0c0" onclick="document.querySelector('.file_input').click()">Replace Image</button>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-dark rounded-0" style="width : 45%" id="front-image">Front</button>
                                                <button class="btn btn-dark rounded-0" style="width : 45%" id="back-image">Back</button>
                                            </div>
                                            <div class="mt-4">
                                                <h6>Color : Black</h6>
                                                <div class="mt-3 d-flex gap-2">
                                                    <div style="width : 40px; height : 40px; background-color : white; border : 2px solid silver" id="tshirt-white">
                                                    </div>
                                                    <div style="width : 40px; height : 40px; background-color : #797979; border : 2px solid #silver" id="tshirt-abu">
                                                    </div>
                                                    <div style="width : 40px; height : 40px; background-color : #5a1818; border : 2px solid silver" id="tshirt-merah">
                                                    </div>
                                                    <div style="width : 40px; height : 40px; background-color : #434d2a; border : 2px solid silver" id="tshirt-hijau">
                                                    </div>
                                                    <div style="width : 40px; height : 40px; background-color : #222222; border : 2px solid silver" id="tshirt-hitam">
                                                    </div>
                                                    <div style="width : 40px; height : 40px; background-color : #233259; border : 2px solid silver" id="tshirt-biru">
                                                    </div>
                                                    <div style="width : 40px; height : 40px; background-color : #ab6a01; border : 2px solid silver" id="tshirt-kuning">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between mt-4">
                                                <button class="btn btn-dark rounded-0" style="width : 45%" id="vertical">Vertical</button>
                                                <button class="btn btn-dark rounded-0" style="width : 45%">Horizontal</button>
                                            </div>
                                            <div class="mt-5">
                                                <h6>Harga Dasar</h6>
                                                <input style="background-color: #c0c0c0" type="text" class="w-100 text-dark" value="100000" disabled>
                                            </div>
                                            <hr>
                                            <button class="btn btn-dark rounded-0" style="width : 45%" id="step-1">Next</button>
                                        </div>
                                    </div>
                                </div>
                            {{-- <input type="radio" class="tabs_item" name="tabs-example" id="about_tab">
                            <label for="about_tab" class="tabs_name px-5"><img src="{{ asset('storage/produk/tshirt.png') }}" alt="" width="100"></label>
                                <div class="tabs_content mt-3">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, temporibus. Corporis commodi odio maiores voluptates ad laborum quam ipsa dolores dolore. Quia iste aut deleniti voluptatibus accusamus delectus voluptatum exercitationem?</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, temporibus. Corporis commodi odio maiores voluptates ad laborum quam ipsa dolores dolore. Quia iste aut deleniti voluptatibus accusamus delectus voluptatum exercitationem?</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, temporibus. Corporis commodi odio maiores voluptates ad laborum quam ipsa dolores dolore. Quia iste aut deleniti voluptatibus accusamus delectus voluptatum exercitationem?</p>
                                </div> --}}
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    @endif
    {{-- end upload design --}}

    @if($step === 2)
    <div class="container">
        <div class="row mt-3">
            <nav>
                <div class="container">
                    <div class="tabs">
                        {{-- <input type="radio" class="tabs_item" name="tabs-example" id="home_tab" checked>
                        <label for="home_tab" class="tabs_name px-5"><img src="{{ asset('assets/img/brand_01.png') }}" alt="" width="100"></label>
                            <div class="tabs_content mt-3">
                            </div> --}}

                        <input type="radio" class="tabs_item" name="tabs-example" id="about_tab" checked>
                        <label for="about_tab" class="tabs_name px-5"><img src="{{ asset('produk/bag.png') }}" alt="" width="100"></label>
                            <div class="tabs_content mt-5">
                                <div class="row mt-3">
                                    <div class="col-lg-6" id="preview-image">
                                        <img src={{ $base }} class="border" alt="" width="400">
                                    </div>
                                    <div class="col-lg-6">
                                        <h4><strong>T Shirt</strong> Lengan pendek</h4>

                                        <div class="mt-6">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <p class="mt-2"><strong>Profit Estimstor for: </strong></p>
                                                    <p class="mt-4"><strong>Harga Dasar: </strong></p>
                                                    <p class="mt-3"><strong>Royalti Desain </strong></p>
                                                    <p class="mt-4"><strong>Harga Jual:  </strong></p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <button class="btn w-100 rounded-0" style="background-color: #c0c0c0">T shirt lengan pendek</button>
                                                    <p class="mt-3">Rp. 100.000</p>
                                                    <input type="number" class="" wire:model="price">
                                                    <p class="mt-3">Rp. {{ $price ? number_format(100000 + $price, 0, ',','.') : 100000 }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <table class="table">
                                                    <thead>
                                                      <tr>
                                                        <td scope="col">10 items</td>
                                                        <td scope="col" class="text-end">{{ $price ? number_format($price * 10, 0, ',','.') : $price }}</td>
                                                      </tr>
                                                      <tr>
                                                        <td scope="col">100 items</td>
                                                        <td scope="col" class="text-end">{{ $price ? number_format($price * 100, 0, ',','.') : $price }}</td>
                                                      </tr>
                                                      <tr>
                                                        <td scope="col">250 items</td>
                                                        <td scope="col" class="text-end">{{ $price ? number_format($price * 250, 0, ',','.') : $price }}</td>
                                                      </tr>
                                                      <tr>
                                                        <td scope="col">500 items</td>
                                                        <td scope="col" class="text-end">{{ $price ? number_format($price * 500, 0, ',','.') : $price }}</td>
                                                      </tr>
                                                      <tr class="bg-warning">
                                                        <td scope="col">1000 items</td>
                                                        <td scope="col" class="text-end">Min Profit : {{ $price ? number_format($price * 1000, 0, ',','.') : $price }}</td>
                                                      </tr>
                                                    </thead>

                                                  </table>
                                            </div>
                                            <div class="row">
                                                <div class="d-flex justify-content-between mt-4">
                                                    <button class="btn btn-dark rounded-0" style="width : 45%" ><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                                         Back</button>
                                                    <button class="btn btn-dark rounded-0" style="width : 45%" id="step-2">Next <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                </div>
            </nav>
        </div>
    </div>
    @endif

    @if($step === 3)
        <div class="row mt-4">
            <div class="col-lg-7">
                <form wire:submit.prevent="submitForm">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" wire:model="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" rows="3" wire:model="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="categort" class="form-label">Pilih Kategeri</label>
                        <select class="form-select" aria-label="Default select example" wire:model="design_category_id" required>
                            <option>---Pilih Kategori---</option>
                            @foreach ($designCategories as $designCategory)
                                <option value="{{ $designCategory->id }}">{{ $designCategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags</label>
                        <input type="text" class="form-control" id="tags" wire:model="tags" required>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">URL</label>
                        <input type="text" class="form-control" id="url" wire:model="url" required>
                    </div>

                    <button class="btn btn-dark mt-4 rounded-0" type="submit">Publish</button>
                </form>
            </div>

            <div class="col-lg-5">
                <img src={{ $base }} class="border" alt="" width="350">
            </div>
        </div>
    @endif
    <script src="{{ asset('assets/js/fabric.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js" integrity="sha512-wUa0ktp10dgVVhWdRVfcUO4vHS0ryT42WOEcXjVVF2+2rcYBKTY7Yx7JCEzjWgPV+rj2EDUr8TwsoWF6IoIOPg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/konva@7.0.0/konva.min.js"></script>

    <script>
           // When the user clicks on upload a custom picture
        //    document.getElementById('file').addEventListener("change", function(e){
        //         var reader = new FileReader();
        //         console.log(mainCanvas)
        //         reader.onload = function (event){
        //             var imgObj = new Image();
        //             imgObj.src = event.target.result;

        //             // When the picture loads, create the image in Fabric.js
        //             imgObj.onload = function () {
        //                 var img = new fabric.Image(imgObj);

        //                 img.scaleToHeight(300);
        //                 img.scaleToWidth(300);
        //                 mainCanvas.centerObject(img);
        //                 mainCanvas.add(img);
        //                 mainCanvas.renderAll();
        //             };
        //         };

        //         // If the user selected a picture, load it
        //         if(e.target.files[0]){
        //             reader.readAsDataURL(e.target.files[0]);
        //         }
        //     }, false);

        //     document.getElementById('download').addEventListener('click', function () {
        //         this.href = mainCanvas.toDataURL({
        //             format: "png"
        //             });

        //             this.download = "canvas.png";
        //     })

        //     let node = document.getElementById('capture');
        //     document.getElementById('tes-download').addEventListener('click', function () {
        //         domtoimage.toPng(node)
        //         .then(function (dataUrl) {
        //             var img = new Image();
        //             img.src = dataUrl;
        //             document.body.appendChild(img);
        //         })
        //         .catch(function (error) {
        //             console.error('oops, something went wrong!', error);
        //         });
        //     })

        //     document.getElementById('tes-file').addEventListener("change", function(e){
        //         console.log('oke')
        //         var reader = new FileReader();
        //         reader.onload = function (event){
        //             var imgObj = new Image();
        //             imgObj.src = event.target.result;
        //             imgObj.id = "image-content"
        //             content.appendChild(imgObj)

        //         };

        //         // If the user selected a picture, load it
        //         if(e.target.files[0]){
        //             reader.readAsDataURL(e.target.files[0]);
        //         }
        //     }, false);

        if({{ $step }} === 1) {

        var width = 200;
        var height = 380;



    var stage = new Konva.Stage({
      container: 'container',
      width: width,
      height: height,
    });

    var layer = new Konva.Layer();
    stage.add(layer);
  //add images
      // listen for the file input change event and load the image.

$(".file_input").change(function(e){

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


    layer.add(theImg);
    layer.draw();
  }


});




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
    stage.on('click tap', function (e) {
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

}



    $('#step-1').click(function() {
        tr.nodes([]);
        layer.draw();
        var node = document.getElementById('capture');
            domtoimage.toPng(node)
            .then(function (dataUrl) {
                var img = new Image();
                img.src = dataUrl;
                let base64 = dataUrl;
                window.livewire.emit('tes', dataUrl);
            })
            .catch(function (error) {
                console.error('oops, something went wrong!', error);
            });
        })

    //     document.getElementById('step-2').addEventListener('click', function() {
    //         console.log("oke")
    //     })


    //     $('#back').click(function() {
    //         alert("oke")
    //     })

    $('#step-2').click(function() {
        window.livewire.emit('change');
    })

    $('#step-back').click(function() {
        window.livewire.emit('stepBack');
    })

    $('#back-image').click(function() {
        document.getElementById('main-image').style.backgroundImage = "url('{{ asset('assets/img/product_1-belakang.png') }}')";
    })

    $('#front-image').click(function() {
        document.getElementById('main-image').style.backgroundImage = "url('{{ asset('assets/img/product_1.png') }}')";
    })

    $('#tshirt-white').click(function () {
        document.getElementById('main-image').style.backgroundImage = "url('{{ asset('assets/img/product_1.png') }}')";
    })

    $('#tshirt-abu').click(function () {
        document.getElementById('main-image').style.backgroundImage = "url('{{ asset('assets/img/product_2-abu.png') }}')";
    })
    $('#tshirt-merah').click(function () {
        document.getElementById('main-image').style.backgroundImage = "url('{{ asset('assets/img/product_7-merah.png') }}')";
    })
    $('#tshirt-hijau').click(function () {
        document.getElementById('main-image').style.backgroundImage = "url('{{ asset('assets/img/product_6-hijau.png') }}')";
    })
    $('#tshirt-hitam').click(function () {
        document.getElementById('main-image').style.backgroundImage = "url('{{ asset('assets/img/product_3-hitam.png') }}')";
    })
    $('#tshirt-biru').click(function () {
        document.getElementById('main-image').style.backgroundImage = "url('{{ asset('assets/img/product_5-biru.png') }}')";
    })
    $('#tshirt-kuning').click(function () {
        document.getElementById('main-image').style.backgroundImage = "url('{{ asset('assets/img/product_4-kuning.png') }}')";
    })

    </script>

    <script>
        $('#step-back').click(function() {
        console.log('ke')
        window.livewire.emit('stepBack');
    })
    </script>


</div>
