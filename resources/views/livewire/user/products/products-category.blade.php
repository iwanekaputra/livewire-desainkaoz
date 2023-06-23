<div>
<div class="d-flex justify-content-center">
    <div style="width : 80%">
        <div class="row mt-5">
            <div class="col-lg-3">
                <div class="d-flex flex-column">
                    <div class="col">
                        <h5 class="fw-bold">Produk</h5>
                        <div class="border shadow py-3 px-3">
                            @foreach ($categories as $category)
                                <p class="px-2 text-bold"><a href="{{ route('products.category', $category->id) }}" class="text-decoration-none text-dark">{{ $category->name }}</a></p>
                            @endforeach
                        </div>
                    </div>
                    <div class="col mt-4">
                        <h5 class="fw-bold">Filters</h5>
                        <div class="border shadow py-3 px-3">
                            <p class="px-2"><a class="text-decoration-none text-dark">All T shirt</a></p>
                            @foreach ($styles as $style)
                                <p class="px-4"><a href="{{ route('products.category', $style->id) }}" class="text-decoration-none text-dark">{{ $style->name }}</a></p>
                            @endforeach
                            <hr>
                            <p>Size</p>
                            <div class="d-flex flex-column">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      S
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      M
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      L
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      XL
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      XXL
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <p>Color</p>
                                <div class="row d-flex gap-1">
                                    <div class="col-lg-2">
                                        <div style="width : 30px; height : 30px; background-color : white; border : 2px solid silver" id="tshirt-white">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div style="width : 30px; height : 30px; background-color : #797979; border : 2px solid #silver" id="tshirt-abu">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div style="width : 30px; height : 30px; background-color : #5a1818; border : 2px solid silver" id="tshirt-merah">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div style="width : 30px; height : 30px; background-color : #434d2a; border : 2px solid silver" id="tshirt-hijau">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div style="width : 30px; height : 30px; background-color : #222222; border : 2px solid silver" id="tshirt-hitam">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div style="width : 30px; height : 30px; background-color : #233259; border : 2px solid silver" id="tshirt-biru">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div style="width : 30px; height : 30px; background-color : #ab6a01; border : 2px solid silver" id="tshirt-kuning">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="d-flex">
                    <h6>T Shirt</h6>
                    <h6 class="text-secondary" style="padding-left: 100px">100,000 result</h6>
                </div>
                <div class="row" style="gap: 2rem">
                    @forelse ($products as $product)
                    <div class="col-lg-2 col-6 mt-2">
                        <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-dark"><div class="card child-card border-0">
                            <img src="{{ $product->image }}" class="" alt="..." style="border : 0.5px solid black">
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
                                <h6 class="card-title fw-bold">{{ $product->title }}</h6>
                                <p class="card-title">By {{ $product->user->first_name }}</p>
                                <h6 class="mt-2 fw-bold">Rp. {{ number_format($product->total_price, 0, ',','.') }}</h6>
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
                        {{ $products->links() }}
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
