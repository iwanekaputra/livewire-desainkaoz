<div>
    <h1>All Categories</h1>
    <hr>
    <div class="row mt-5">
        <div class="col-lg">
            <a class="btn btn-dark" href="{{ route('admin.categories.create') }}">Tambah Kategori</a>
            <table class="table mt-2">
                <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        <img src="{{ asset("storage/produk/" . $category->icon) }}" alt="" width="50">
                    </td>
                    <td>
                        <img src="{{ asset("storage/produk/" . $category->image) }}" alt="" width="50">
                    </td>
                    <td>
                            <a href="" class="text-decoration-none btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <button class="btn btn-danger" >
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
