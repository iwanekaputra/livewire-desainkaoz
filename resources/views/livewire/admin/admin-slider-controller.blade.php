<div>
    <h1>Ganti Slider</h1>
    <hr>
    <div class="row mt-5 mb-5">
        <div class="col-lg">
            <a class="btn btn-dark" href="{{ route('admin.sliders.create') }}">Tambah Slider</a>
            <table class="table mt-2">
                <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                {{-- <tbody> --}}
                @foreach ($sliders as $slider)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <img src="{{ asset('storage/banner/' .  $slider->image ) }}" alt="" width="700">

                    </td>
                    <td>
                            {{-- <a href="{{ route('admin.products.edit', $product->id) }}" class="text-decoration-none btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a> --}}
                        <button class="btn btn-danger" wire:click='alertConfirm({{ $slider->id }})'>
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
