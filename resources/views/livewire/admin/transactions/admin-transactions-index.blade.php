<div>
<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Transactions</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"></a>
                    Manage orders on your page
                </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto ">

            
        </div>
    </div>
        <!--end breadcrumb-->
    
    <div class="card">
        <div class="card-body">
            <table id="example2" class="table align-middle table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th data-priority="1">#ORDER ID</th>
                        <th>Customer Name</th>
                        <th width="10%" >Total</th>
                        <th width="10%" >Date</th>
                        <th width="10%" class="text-center">Status</th>
                        <th width="5%" data-priority="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $row)
                    <tr>
                        <td><?=$row->code; ?></td>
                        <td  class="productlist">
                            <?=$row->user_id; ?>
                        </td>
                        <td ><?=$row->total_price; ?></td> 
                        <td class="text-center"><?=$row->created_at; ?></td>
                        <td class="text-center"><span class="badge rounded-pill bg-success"><?=$row->status; ?></span></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-dark btn-sm dropdown-toggle px-3 rounded-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <ul class="dropdown-menu" style="">
                                    <li>
                                        <a href="{{ route('admin.transactions.edit', $row->id) }}" class="dropdown-item">Edit</a>
                                    </li>
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

