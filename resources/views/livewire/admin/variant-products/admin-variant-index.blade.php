<div>
    <h1>Variasi Produk</h1>
    <hr>

    <div class="row justify-content-between">
        <div class="col-lg-6 border shadow rounded card">
            <div class="d-flex justify-content-between mt-2">
                <h4>Variasi Warna</h4>
                <a class="btn btn-dark" href="{{ route('admin.colors.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                    Tambah</a>
            </div>
            <table class="table mt-3">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($colors as $color)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <div style="width : 20px; height : 20px; border : 1px solid ; background-color : {{ $color->name }}"></div> {{ $color->name }}</td>
                        <td>
                            <button class="btn btn-danger" wire:click="alertConfirmDeleteColor({{ $color->id }})"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-lg-5 border shadow rounded">
            <div class="d-flex justify-content-between mt-2">
                <h4>Variasi Ukuran</h4>
                <a class="btn btn-dark" href="{{ route('admin.sizes.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                    Tambah</a>
            </div>
            <table class="table mt-3">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Ukuran</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($sizes as $size)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $size->number }}</td>
                        <td>
                            <button class="btn btn-danger" wire:click="alertConfirmDeleteSize({{ $size->id }})"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-lg-6 border shadow rounded">
            <div class="d-flex justify-content-between mt-2">
                <h4>Variasi Style</h4>
                <a class="btn btn-dark" href="{{ route('admin.styles.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                    Tambah</a>
            </div>
            <table class="table mt-3">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Style</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($styles as $style)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $style->name }}</td>
                        <td>
                            <button class="btn btn-danger" wire:click="alertConfirmDeleteStyle({{ $style->id }})"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>
