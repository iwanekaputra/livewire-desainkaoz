<div>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Categories</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li>
                        Manage the Category on your page
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
                        <form action="" class="row g-3" wire:submit.prevent="store">
                            <div class="col-12">
                                <label class="form-label">Name*</label>
                                <input type="text" class="form-control" id="name" wire:model="name" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Icon</label>
                                @if ($icon)
                                    <div class="mb-2">
                                        <img src="{{ $icon->temporaryUrl() }}" alt="" width="150" >
                                    </div>
                                @endif
                                
                                <input class="form-control" type="file" id="formFile" wire:model="icon" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">File</label>
                                @if ($image)
                                    <div class="mb-2">
                                        <img src="{{ $image->temporaryUrl() }}" alt="" width="150">
                                    </div>
                                @endif
                                <input class="form-control" type="file" id="formFile" wire:model="image" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Sub Category</label>
                                <select class="form-select" aria-label="Default select" wire:model="subCategoryId" required>
                                    <option>---Pilih Sub Kategori---</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-dark px-5 rounded-0">Add Category</button>
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
                                <table id="example" class="table table-striped table-bordered align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Icon</th>
                                            <th>Image</th>
                                            <th width="5%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td><h6>{{ $category->name }}</h6></td>
                                            <td>
                                                <img src="{{ asset("storage/produk/" . $category->icon) }}" alt="" width="50">
                                            </td>
                                            <td>
                                                <img src="{{ asset("storage/produk/" . $category->image) }}" alt="" width="50">
                                            </td>
                                            <td>
                                                <button class="btn btn-dark px-3 rounded-0 " wire:click="alertConfirm({{ $category->id }})">
                                                    <i class="bi bi-trash" aria-hidden="true">  </i>
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

