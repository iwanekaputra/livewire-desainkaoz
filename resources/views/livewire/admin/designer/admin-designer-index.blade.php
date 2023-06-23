<div>
    <h3>All Design Designer</h3>
    <hr>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Designer</th>
                    <th scope="col">Harga Design</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($uploadProductDesigns as $uploadProductDesign)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $uploadProductDesign->user->first_name }}</td>
                        <td>Rp. {{ number_format($uploadProductDesign->price_design, 0, ',','.') }}</td>
                        <td>
                            @if (!$uploadProductDesign->is_approved)
                                Belum Disetujui
                            @else
                                Sudah Disetujui
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.designer.show', $uploadProductDesign->id) }}" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <button class="btn btn-success" wire:click="alertConfirm({{ $uploadProductDesign->id }})">
                                <i class="fa fa-check" aria-hidden="true">Approve</i>
                            </button>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="6">
                        <div class="alert alert-dark text-center" role="alert">
                            Tidak ada data user
                        </div>
                    </td>
                </tr>

                @endforelse
                </tbody>
              </table>

        </div>
    </div>
</div>
