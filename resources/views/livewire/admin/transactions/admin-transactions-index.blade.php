<div>
    <h3 class="mt-2">All Transaction</h3>
    <hr>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Code</th>
                    <th scope="col">Username</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($transactions as $transaction)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $transaction->code }}</td>
                        <td>{{ $transaction->user->first_name }}</td>
                        <td>
                            <span class="badge text-bg-warning">
                                {{ $transaction->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.transactions.edit', $transaction->id) }}" class="text-decoration-none btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="6">
                        <div class="alert alert-dark text-center" role="alert">
                            Tidak ada data transaksi
                        </div>
                    </td>
                </tr>

                @endforelse
                </tbody>
              </table>

        </div>
    </div>
</div>
