<div>
    <div>
        <div class="container d-flex justify-content-center">
            <div style="width : 90%">
                <div class="row mt-5">
                    <div class="col-lg-2">
                        <div class="d-flex flex-column">
                            <div class="col">
                                <h5>Filters</h5>
                                <div class="border shadow py-1 px-3">
                                    <p>Desain Kategori</p>
                                    <hr>
                                    <div class="container">
                                        @foreach ($designCategories as $designCategory)
                                            <p class="px-2 {{ Request::is('products/design/category/' . $designCategory->id) ? "fw-bold" : '' }}"><a href="{{ route('products.design.category', $designCategory->id) }}" class="text-decoration-none text-dark">{{ $designCategory->name }}</a></p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="d-flex align-items-center">
                            @foreach ($designCategories as $designCategory)
                                @if (Request::is('products/design/category/' . $designCategory->id))
                                    <img src="{{ asset('desainkategori/' . $designCategory->image ) }}" alt="" width="30" >
                                    <h6 class="px-2">{{ $designCategory->name }}</h6>
                                @endif
                            @endforeach
                            <h6 class="text-secondary" style="padding-left: 100px">{{ number_format($countProductDesign, 0, ',','.') }} result</h6>
                        </div>
                        <div class="row" style="gap : 2rem">
                            @forelse ($productDesigns as $productDesign)
                                <div class="col-lg-2 col-6 mt-2">
                                    <a href="{{ route('products.show', $productDesign->id) }}" class="text-decoration-none text-dark"><div class="card child-card border-0">
                                        <img src="{{ asset('uploads/design/'. $productDesign->image) }}" class="" alt="..." style="border : 0.5px solid black">
                                        <div class="border shadow d-flex justify-content-center align-items-center rounded-circle position-absolute top-0 end-0" style="width : 30px; height : 30px" >
                                            <div class="con-like">
                                                <input title="like" type="checkbox" class="like">
                                                <div class="checkmark">
                                                    <svg viewBox="0 0 24 24" class="outline" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z"></path>
                                                    </svg>
                                                    <svg viewBox="0 0 24 24" class="filled" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z"></path>
                                                    </svg>
                                                    <svg class="celebrate" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                                                    <polygon points="10,10 20,20" class="poly"></polygon>
                                                    <polygon points="10,50 20,50" class="poly"></polygon>
                                                    <polygon points="20,80 30,70" class="poly"></polygon>
                                                    <polygon points="90,10 80,20" class="poly"></polygon>
                                                    <polygon points="90,50 80,50" class="poly"></polygon>
                                                    <polygon points="80,80 70,70" class="poly"></polygon>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body mt-2 p-0">
                                            <h5 class="card-title">{{ $productDesign->title }}</h5>
                                            <p class="card-title">By {{ $productDesign->user->first_name }}</p>
                                            <h6 class="mt-2">Rp. {{ number_format($productDesign->total_price, 0, ',','.') }}</h6>
                                        </div>
                                    </div>
                                </a>
                                </div>
                            @empty
                            <div class="alert alert-dark text-center" role="alert">
                                Tidak ada product berdasarkan Kategori yang di cari
                                </div>
                            @endforelse
                            <div class="d-flex justify-content-center">
                                {{-- {{ $productDesigns->links() }} --}}

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <h1></h1>
                    </div>
                </div>
            </div>
        </div>


        </div>

</div>
