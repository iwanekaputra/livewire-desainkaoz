<div>
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Products</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"></a>
            Manage the Product on your page
            </li>
        </ol>
        </nav>
    </div>
    <div class="ms-auto ">

        <a href="{{ route('admin.products.create') }}" class="btn btn-dark px-5 rounded-0">Add New Data</a>
        
    </div>
</div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <table id="example2" class="table align-middle table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th width="5%"  class="text-center" >No</th>
                    <th data-priority="1" scope="col">Kategori</th>
                    <th scope="col">Nama</th>
                    <th class="text-center" scope="col">Harga Dasar Produk</th>
                    <th scope="col">Status</th>
                    <th width="5%" data-priority="2">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset("storage/produk/" . $product->category->icon) }}" alt="" width="50">
                            {{ $product->category->name }}
                            </td>
                        <td>{{ $product->name }}</td>
                            <td class="text-end">Rp. {{ number_format($product->price,0,',','.') }}</td>
                        <td>{{ $product->status }}</td>
                        <td>
                        <div class="dropdown">
                            <button class="btn btn-dark btn-sm dropdown-toggle px-3 rounded-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <ul class="dropdown-menu" style="">
                                    <li><a class="dropdown-item" href="{{ route('admin.products.edit', $product->id) }}">Edit</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.mockups.edit', $product->id) }}">Edit Mockups</a></li>
                                    <li><button class="btn dropdown-item" wire:click="alertConfirm({{ $product->id }})">Hapus</button></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
  