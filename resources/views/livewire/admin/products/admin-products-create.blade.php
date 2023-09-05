<div>
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Products</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"></a>
                Create new Product
                </li>
            </ol>
            </nav>
        </div>
    </div>
<!--end breadcrumb-->
    <form wire:submit.prevent="store" method="POST" enctype="multipart/form-data">  
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent"> 
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">Add New Product</h5>
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
                                                    <option value="">Pilih Kategori</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                           
                                            <div wire:ignore>
                                                <textarea wire:model="description"
                                                          class="form-control"
                                                          name="description"
                                                          id="description">{{ $description }}</textarea>
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
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                    <label class="form-label">Size</label>
                                                    <div wire:ignore>
                                                        <select id="size-dropdown" class="form-control" multiple wire:model="sizes_id">
                                                            
                                                            @foreach($sizes as $size)
                                                                <option value="{{$size->number}}">{{ $size->number }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                            </div>

                                        </div>
                                        
                                    </div>
                                </div> 
                            </div>
                        </div><!--end row-->
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </form>
    
    
    
        @push('scripts')
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
        <script>
            ClassicEditor
                .create(document.querySelector('#description'))
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                    @this.set('description', editor.getData());
                    })
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
        @endpush
</div>