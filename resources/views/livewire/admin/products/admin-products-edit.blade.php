<div>
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Products</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"></a>
                Add new variant product
                </li>
            </ol>
            </nav>
        </div>
    </div>
<!--end breadcrumb-->
    <form wire:submit.prevent="update" method="POST" enctype="multipart/form-data">  
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent"> 
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">Edit Product</h5>
                            <div class="ms-auto">
                                <button type="button" class="btn btn-secondary rounded-0">Save to Draft</button>
                                <button class="btn btn-dark px-4 rounded-0">Publish Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12 col-lg-8">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12 col-lg-4">
                                                <label class="form-label">Product title</label>
                                                <input type="text" wire:model="name" class="form-control" placeholder="Product title" required>
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <label class="form-label">Kode</label>
                                                <input type="text" wire:model="code" class="form-control" placeholder="Kode" required>
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <label class="form-label">Category</label>
                                                <select class="form-select" wire:model="category_id" required>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                           
                                            
                                            <div class="col-12">
                                                <label class="form-label">Full description</label>
                                                <textarea wire:model="description" class="form-control editor" placeholder="Full description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label">Harga Dasar</label>
                                                <input type="text" wire:model="price" class="form-control" placeholder="Price" required>
                                            </div>
                                            <input type="hidden" name="status" value="1">
                                        </div><!--end row-->
                                    </div>
                                </div>  
                            </div>
                        </div><!--end row-->
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </form>
    <form wire:submit.prevent="createproductvariant" method="POST" enctype="multipart/form-data">  

    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent"> 
                    <div class="d-sm-flex align-items-center">
                        <h5 class="mb-2 mb-sm-0">Variant Produk</h5>
                        <div class="ms-auto">
                            <button class="btn btn-dark px-4 rounded-0">Add Variant</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Image Produk Variant</label>
                                @if ($imageProductVariant)
                                <div class="row">
                                    <div class="col-12">
                                        <img src="{{ $imageProductVariant->temporaryUrl() }}" width="100%">
                                    </div>
                                </div>
                                @endif
                                <input type="file" class="form-control" wire:model="imageProductVariant" required>
                                @error('imageProductVariant.*') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="card shadow-none bg-light border">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label">Product View</label>
                                            <select class="form-select" aria-label="Default select example" id="view" wire:model="view" required>
                                                    <option value="-">Pilih View</option>
                                                    <option value="front">Front</option>
                                                    <option value="Back">Back</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Style</label>
                                            <select class="form-select" aria-label="Default select example" wire:model="style_id" required>
                                                <option value="">Pilih Style</option>
                                                @foreach ($styles as $style)
                                                    <option value="{{ $style->id }}">{{ $style->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Color</label>
                                            <select wire:model="color" class="form-select">
                                                @foreach ($colors as $color)
                                                <option  style="background-color: {{ $color->name }}" value="{{ $color->name }}">
                                                   {{ $color->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Harga</label>
                                            <input type="text" wire:model="price" class="form-control" placeholder="Product title">
                                        </div>
                                        <input type="hidden" name="status" value="1">
                                    
                                    
                                    </div><!--end row-->
                                </div>
                            </div>  
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="card shadow-none bg-light border">
                                <div class="card-body">
                                    <table class="table align-middle mb-0 table-striped">
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Color</th>
                                            <th>Style</th>
                                            <th>View</th>
                                            <th>Harga</th>
                                            <th width="5%">Aksi</th>
                                        </tr>
                                        @foreach ($productvariants as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td >
                                                <div class="orderlist">
                                                    <a class="d-flex align-items-center gap-2" href="javascript:;">
                                                        <div class="product-box">
                                                            <img src="{{ asset("uploads/imageProductVariant/" . $row->image) }}" alt="">
                                                        
                                                        </div>
                                                    </a>                                                  
                                                </div>          
                                            </td>
                                            <td>{{$row->color}}</td>
                                            <td>{{$row->style->name}}</td>
                                            <td>{{$row->view}}</td>
                                            <td>{{$row->price}}</td>
                                            <td>
                                                <button class="btn btn-dark px-3 rounded-0 " wire:click="alertConfirm({{ $row->id }})">
                                                    <i class="bi bi-trash" aria-hidden="true"> </i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div><!--end row-->
                </div>
            </div>
        </div>
    </div><!--end row-->
    </form>
    
    <script>
        $(document).ready(function () {
            $('#size-dropdown').select2();
            $('#size-dropdown').on('change', function (e) {
                let data = $(this).val();
                    @this.set('sizes_id', data);
            });
            window.livewire.on('productStore', () => {
                $('#size-dropdown').select2();
            });
        });
    </script>
</div>