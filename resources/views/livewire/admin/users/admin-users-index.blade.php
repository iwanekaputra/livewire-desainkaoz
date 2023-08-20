<div>
       <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All User Designer</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"></a>
                Approve user Designer on your page
                </li>
            </ol>
            </nav>
        </div>
    </div>
        <!--end breadcrumb-->
    
        <div class="card">
            <div class="card-body">
                <table id="example2" class="table align-middle table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th data-priority="1">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th width="5%" data-priority="2">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $row)
                        <tr>
                            <td>{{ $row->first_name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->role->name }}</td>
                            <td>
                                @if ($row->status == 0)
                                    <button class="btn btn-primary btn-sm  px-3 rounded-0" wire:click="alertConfirm({{ $row->id }})" >Approve</button>
                                @else
                                    <button class="btn btn-dark btn-sm  px-3 rounded-0" >Detail</button>
                                @endif
                               
                            </td>
                        </tr>
                    @endforeach
    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
      