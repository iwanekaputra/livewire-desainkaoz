<div>
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Products</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"></a>
                Edit new variant product
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
                            <h5 class="mb-2 mb-sm-0">Details Product</h5>

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
                                                <input type="text" wire:model="name" class="form-control" placeholder="Product title" disabled>
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <label class="form-label">Kode</label>
                                                <input type="text" wire:model="code" class="form-control" placeholder="Kode" disabled>
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
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent"> 
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">Edit Canvas Mockups</h5>
                            <div class="ms-auto">
                                <button class="btn btn-dark px-4 rounded-0">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12 col-lg-8">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12 col-lg-6">
                                                <label class="form-label">Width</label>
                                                <input type="text" wire:model="width_canvas" class="form-control" placeholder="width">
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <label class="form-label">Height</label>
                                                <input type="text" wire:model="height_canvas" class="form-control" placeholder="height">
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <label class="form-label">Top canvas</label>
                                                <input type="text" wire:model="top_canvas" class="form-control" placeholder="Top Canvas">
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <label class="form-label">Left canvas</label>
                                                <input type="text" wire:model="left_canvas" class="form-control" placeholder="Left Canvas">
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="col-lg-7">
                                    <div id="tshirt-capture" style="width : 500px; height : 500px; ">
                                        <div style="width : 500px; height : 500px; background-image : url('{{ asset('uploads/imageProductVariant/' ) }}'); background-repeat : no-repeat; background-size : 100% 100%; border : 1px solid #000000"
                                            class="">
                                            <div class="layer-mockups position-relative"
                                                style="width : {{ $mockup->width_canvas }}px; top : {{ $mockup->top_canvas }}px; left : {{ $mockup->left_canvas }}px; height : {{$mockup->height_canvas}}px; border : 2px dashed rgb(7, 7, 7)">
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