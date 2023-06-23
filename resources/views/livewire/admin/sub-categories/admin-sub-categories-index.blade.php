<div>
    <h1>All Sub-Kategori</h1>
    <hr>
    <div class="row mt-5">
        <div class="col-lg">
            <a class="btn btn-dark" href="{{ route('admin.sub-categories.create') }}">Tambah Sub Kategori</a>
            <table class="table mt-2">
                <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Sub Kategori</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($subCategories as $subCategory)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $subCategory->name }}</td>
                    <td>
                            {{-- <a href="{{ route('admin') }}" class="text-decoration-none btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a> --}}
                        <button class="btn btn-danger" wire:click="alertConfirm({{ $subCategory->id }})">
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
