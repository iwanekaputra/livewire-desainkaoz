<div>
    <div class="main">
        <div class="row mt-4">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('banner/background-default.png') }}" class="d-block w-100" alt="...">
                    <div class="position-absolute" style="top :70px; left : 30px">
                    <img src="{{ asset('assets/img/about-hero.svg') }}" alt="" width="150" class="rounded-circle img-thumbnail" >
                <span class="text-white fw-bold ms-3">Desain kaoz</span>
                </div>
                  </div>
                </div>
              </div>
        </div>

        <div class="row mt-3">
            <div class="tabs">
                <input type="radio" class="tabs_item" name="tabs-example" id="home_tab" checked>
                <label for="home_tab" class="tabs_name">Beli Produk</label>
                <div class="tabs_content mt-3">
                    <div class="row" style="gap : 2rem">
                        @foreach ($uploadProductDesigns as $uploadProductDesign)
                            <div class="col-lg-2 col-6 mt-2">
                                <a href="{{ route('products.show', $uploadProductDesign->id) }}" class="text-decoration-none text-dark"><div class="card child-card border-0">
                                    <img src="{{ $uploadProductDesign->image }}" class="" alt="..." style="border : 0.5px solid black">
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
                                        <h6 class="card-title fw-bold">{{ $uploadProductDesign->title }}</h6>
                                        <p class="card-title">By {{ $uploadProductDesign->user->first_name }}</p>
                                        <h6 class="mt-2 fw-bold">Rp. {{ number_format($uploadProductDesign->total_price, 0, ',','.') }}</h6>
                                    </div>
                                </div>
                            </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <input type="radio" class="tabs_item" name="tabs-example" id="about_tab">
                <label for="about_tab" class="tabs_name">Desain</label>
                <div class="tabs_content mt-3">
                   <p>1</p>
                </div>
                <input type="radio" class="tabs_item" name="tabs-example" id="profile_tab">
                <label for="profile_tab" class="tabs_name">Profil</label>
                <div class="tabs_content mt-3">
                    <div class="container">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="fw-bold">DesainKaoz</h6>
                                <p>Joined March 2023 - 100 design</p>
                                {{-- <button class="btn btn-info">Message</button> --}}
                            </div>
                            <div>
                                <button class="btn text-dark rounded-0 text-dark" style="background-color: #adadad">Message</button>
                                <button class="btn btn-white text-dark rounded-0" style="border : 1px solid #adadad">Follow</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
