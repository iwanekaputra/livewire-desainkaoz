<div>
    <h1>All product</h1>
    <hr>
    <div class="row mt-5">
        <div class="col-lg">
            <a class="btn btn-dark" href="{{ route('admin.products.create') }}">Tambah Produk</a>
            <table class="table mt-2">
                <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->status }}</td>
                    <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="text-decoration-none btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <button class="btn btn-danger" wire:click="alertConfirm({{ $product->id }})">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
