<div>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Colors</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li>
                        Manage the Color on your page
                    </li>
                </ol>
            </nav>
        </div>
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
                                <label class="form-label">Color*</label>
                                <input type="text" class="form-control" id="name" wire:model="name" required  data-jscolor="{}">
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-dark px-5 rounded-0">Add</button>
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
                                            <th>Color</th>
                                            <th>Name</th>
                                            <th width="5%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($colors as $row)
                                        <tr>
                                            <td><div class="icon-badge position-relative me-lg-2" style="background-color: <?=$row->name; ?>;"></td>
                                            <td><h6>{{ $row->name }}</h6></td>
                                            <td>
                                                <button class="btn btn-dark px-3 rounded-0 " wire:click="alertConfirm({{ $row->id }})">
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

