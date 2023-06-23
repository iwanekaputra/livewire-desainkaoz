<div>
    <h3>All User Designer</h3>
    <hr>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>
                            <button class="btn btn-success" wire:click="alertConfirm({{ $user->id }})">
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
