<div>
    <!--breadcrumb-->
 <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
     <div class="breadcrumb-title pe-3">Design</div>
     <div class="ps-3">
         <nav aria-label="breadcrumb">
         <ol class="breadcrumb mb-0 p-0">
             <li class="breadcrumb-item"><a href="javascript:;"></a>
             Approve Design on your page
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
                    <th scope="col">No</th>
                    <th scope="col">Design</th>
                    <th scope="col">Nama Designer</th>
                    <th scope="col">Category</th>
                    <th scope="col">Royalti Design</th>
                    <th scope="col">Status</th>
                    <th width="5%" data-priority="2">Aksi</th>
                 </tr>
                 </thead>
                 <tbody>
                @forelse ($productDesigns as $productDesign)
                     <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <img src=" {{ asset('uploads/design/' . $productDesign->imageDesign->image) }}" alt="" width="120px"></td>

                        </td>
                        <td>{{ $productDesign->user->first_name }}</td>
                        <td>{{ $productDesign->product->name }}</td>
                        <td>Rp. {{ number_format($productDesign->price_design, 0, ',','.') }}</td>
                        <td>
                            @if ($productDesign->is_approved == 1)
                                <span class="badge rounded-pill bg-success">Disetujui</span>
                            @elseif($productDesign->is_approved == 2)
                                <span class="badge rounded-pill bg-danger">Ditolak</span>
                            @else
                            <span class="badge rounded-pill bg-primary">Baru</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-dark btn-sm dropdown-toggle px-3 rounded-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">Aksi</button>
                                    <ul class="dropdown-menu" style="">
                                        <li><a class="dropdown-item" href="{{ route('admin.designer.show', $productDesign->id) }}">Detail</a>
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