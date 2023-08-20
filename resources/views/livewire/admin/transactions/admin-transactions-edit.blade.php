<div>
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Detail Transactions</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Order details</li> 
            </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-header py-3"> 
            <form action="" wire:submit.prevent="updateResi">
                <div class="row g-3 align-items-center">
                    <div class="col-12 col-lg-4 me-auto">
                        <h5 class="mb-1">{{ $transaction->created_at }}</h5>
                        <p class="mb-0">Order ID : {{ $transaction->id }}</p>
                    </div>
                        <div class="col-12 col-lg-3 col-6 col-md-3">
                            <select class="form-select" aria-label="Default select example" wire:model="status">
                                @if ($transaction->status == 'PAID')
                                    <option value="">PAID</option>
                                    <option value="PENDING">PENDING</option>
                                    <option value="SHIPPING">SHIPPING</option>
                                    <option value="SUCCESS">SUCCESS</option>
                                @elseif ($transaction->status == 'PENDING')
                                    <option value="">PENDING</option>
                                    <option value="PAID">PAID</option>
                                    <option value="SHIPPING">SHIPPING</option>
                                    <option value="SUCCESS">SUCCESS</option>
                                @elseif ($transaction->status == 'SHIPPING')
                                    <option value="SHIPPING">SHIPPING</option>
                                    <option value="SUCCESS">SUCCESS</option>
                                @elseif ($transaction->status == 'SUCCESS')
                                    <option value="SUCCESS">SUCCESS</option>
                                @endif
                            </select>
                        </div>
                        @if ($status === 'SHIPPING')
                        <div class="col-12 col-lg-3 col-6 col-md-3">
                                <input type="text" class="form-control" id="exampleFormControlInput1" wire:model="resi" value="{{ $resi }}" placeholder="Resi">
                        </div>
                        @endif
                        
                        <div class="col-12 col-lg-3 col-6 col-md-3">
                            <button type="submit" class="btn btn-dark px-5 rounded-0">Update</button>
                            <button type="button" class="btn btn-secondary rounded-0"><i class="bi bi-printer-fill"></i> Print</button>
                        </div>
                        
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-xl-2 row-cols-xxl-3">
                <div class="col">
                <div class="card border shadow-none radius-10">
                    <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-light-primary border-0">
                        <i class="bi bi-person text-primary"></i>
                    </div>
                    <div class="info">
                        <h6 class="mb-2">Customer</h6>
                        <p class="mb-1">{{ $transaction->user->first_name }}</p>
                        <p class="mb-1">{{ $transaction->user->email }}</p>
                        <p class="mb-1">{{ $transaction->user->no_hp }}</p>
                    </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col">
                <div class="card border shadow-none radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-light-success border-0">
                        <i class="bi bi-truck text-success"></i>
                    </div>
                    <div class="info">
                        <h6 class="mb-2">Order info</h6>
                        <p class="mb-1"><strong>Shipping</strong> : {{ $transaction->courier }}</p>
                        <p class="mb-1"><strong>Resi</strong> : {{ $transaction->resi }}</p>
                        <p class="mb-1"><strong>Status</strong> : {{ $transaction->status }}</p>
                    </div>
                    </div>
                    </div>
                </div>
                </div>
            <div class="col">
                <div class="card border shadow-none radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-light-danger border-0">
                        <i class="bi bi-geo-alt text-danger"></i>
                    </div>
                    <div class="info">
                        <h6 class="mb-2">Deliver to</h6>
                        <p class="mb-1"><strong>City</strong> : {{ $transaction->user->city }}, {{ $transaction->user->province }}</p>
                        <p class="mb-1"><strong>Address</strong> : {{ $transaction->user->address }}, <br>{{ $transaction->user->city }}</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div><!--end row-->

        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card border shadow-none radius-10">
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                            <tr>
                                <th>Product</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Style</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($transaction->transactionDetails as $transactionDetail)
                            <tr>
                                <td>
                                <div class="orderlist">
                                <a class="d-flex align-items-center gap-2" href="javascript:;">
                                    <div class="product-box">
                                        <img src="{{ $transactionDetail->uploadProductDesign->uploadProductDesignVariants->first()->image }}" alt="">
                                    </div>
                                    <div>
                                        <P class="mb-0 product-title">{{ $transactionDetail->title}}</P>
                                    </div>
                                    </a>
                                </div>
                                </td>
                                <td>
                                <span class="btn btn-color btn-size d-flex justify-content-center align-items-center rounded-0 fw-bold border" style="width : 40px; height : 40px;background-color: {{ $transactionDetail->color }};" ></span>
                                </td>
                                <td>{{ $transactionDetail->size }}</td>
                                <td>{{ $transactionDetail->style }}</td>
                                <td>{{ $transactionDetail->quantity }}</td>
                                <td>Rp. {{ number_format($transactionDetail->price,0,',','.') }}</td>
                            </tr>
                            
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card border shadow-none bg-light radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div>
                            <h5 class="mb-0">Order Summary</h5>
                        </div>
                        <div class="ms-auto">
                            <button type="button" class="btn alert-success radius-30 px-4">Confirmed</button>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <p class="mb-0">Subtotal</p>
                        </div>
                        <div class="ms-auto">
                            <h5 class="mb-0">Rp. {{ number_format($transaction->total_price,0,',','.') }}</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <p class="mb-0">Shipping Price</p>
                        </div>
                        <div class="ms-auto">
                            <h5 class="mb-0">Rp. {{ number_format($transaction->shipping_price,0,',','.') }}</h5>
                        </div>
                    </div>
                    {{-- <div class="d-flex align-items-center mb-3">
                        <div>
                            <p class="mb-0">Taxes</p>
                        </div>
                        <div class="ms-auto">
                            <h5 class="mb-0">$24.00</h5>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <p class="mb-0">Discount</p>
                        </div>
                        <div class="ms-auto">
                            <h5 class="mb-0 text-danger">-$36.00</h5>
                        </div>
                    </div> --}}
                </div>
                </div>

                <div class="card border shadow-none bg-warning radius-10">
                <div class="card-body">
                    <h5>Payment info</h5>
                        <div class="d-flex align-items-center gap-3">
                        <div class="fs-1">
                            <i class="bi bi-credit-card-2-back-fill"></i>
                        </div>
                        <div class="">
                            <p class="mb-0 fs-6">Master Card **** **** 8956 </p>
                        </div>
                        </div>
                    <p>Business name: Template Market LLP <br>
                        Phone: +91-9910XXXXXX
                    </p>
                </div>
                </div>


            </div>
        </div><!--end row-->

        </div>
    </div>
</div>