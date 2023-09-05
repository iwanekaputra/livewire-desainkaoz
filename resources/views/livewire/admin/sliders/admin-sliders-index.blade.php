<div>

    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Sliders</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li>
                        Manage the Slider on your page
                    </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto ">

            
        </div>
        <!-- tambah data -->
    </div>


    <!--end breadcrumb-->
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-4 d-flex">
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" wire:submit.prevent="store">
                            <div class="col-12">
                                <label class="form-label">Banner</label>
                                @if($image)
                                    <img src="{{ $image->temporaryUrl() }}" alt="" width="500">
                                @endif
                                <input class="form-control" type="file" id="formFile" wire:model="image">
                            </div>
                           
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-dark px-5 rounded-0">Add Slider</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-lg-8 d-flex">
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="" class="table table-striped table-bordered align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th width="5%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($sliders as $slider)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                                <img src="{{ asset('uploads/banner/' .  $slider->image ) }}" alt="" width="700">

                                            </td>
                                            <td>
                                                    {{-- <a href="{{ route('admin.products.edit', $product->id) }}" class="text-decoration-none btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a> --}}
                                                
                                                <button class="btn btn-dark px-3 rounded-0 " wire:click="alertConfirm({{ $slider->id }})">
                                                    <i class="bi bi-trash" aria-hidden="true"> </i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

