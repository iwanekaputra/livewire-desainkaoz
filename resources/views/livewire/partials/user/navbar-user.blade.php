<div>
    <nav class="navbar d-flex">
        <a class="navbar-brand ms-3" href="{{ route("index") }}"><img src="{{ asset('logo/icon-logo.svg') }}" alt=""></a>

        <div class="nav d-flex justify-content-between gap-5">
            <div class="col-7">
                <div class="input-group flex-wrap d-flex">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                    <input type="text" class="form-control"aria-describedby="basic-addon1">
                </div>
            </div>
          <ul class="nav-links me-5 gap-5" style="padding-right : 80px">
            @if (auth()->user())
            <li> <a class="nav-link" aria-current="page" href="#"><img src="{{ asset('assets/img/icon-love.svg') }}" alt="" width="25">
            </a></li>
            <li><a class="nav-link" aria-current="page" href="#"><img src="{{ asset("assets/img/icon-notif.svg") }}" alt="" width="25">
            </a></li>
            <li><a class="nav-link" aria-current="page" href="{{ route("carts.index") }}"><img src="{{ asset("assets/img/icon-cart.svg") }}" alt="" width="25">
            </a></li>
            <li><a class="nav-link" aria-current="page" href="#"><img src="{{ asset("assets/img/icon-user.svg") }}" alt="" width="25">
            </a></li>
            <li class="px-3">
                <div class="dropdown">
                    <a class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('assets/img/icon-designer.svg') }}" alt="" width="25">
                    </a>
                    <ul class="dropdown-menu w-100">
                        @if (auth()->user()->role_id == "2")
                            <li class="py-1"><a class="dropdown-item text-dark" href="{{ route("designer.setting") }}"><img src="{{ asset("assets/img/icon-account-setting.svg") }}" alt="" class="px-2" width="40"> Account Setting</a></li>
                            <li class="py-1"><a class="dropdown-item text-dark" href="#"><img src="{{ asset("assets/img/icon-profile.svg") }}" alt="" class="px-2" width="40"> Profile</a></li>
                            <li class="py-1"><a class="dropdown-item text-dark" href="{{ route('designer.saldo') }}"><img src="{{ asset("assets/img/icon-saldo.svg") }}" alt="" class="px-2" width="40"> Saldo</a></li>
                            <li class="py-1"><a class="dropdown-item text-dark" href="{{ route("designer.upload-design") }}"><img src="{{ asset("assets/img/icon-upload-design.svg") }}" alt="" class="px-2" width="40"> Upload Desain</a></li>
                            <div style="border-bottom : 1px solid black"></div>
                        @endif
                        <form action="{{ url('logout') }}" method="POST">
                            @csrf
                            <li class="py-1" style="font-size : 12px">
                                <button class="dropdown-item text-dark" type="submit">
                                    <img src="{{ asset("assets/img/icon-logout.svg") }}" alt="" class="px-2" width="40"> Logout</button>
                                </a>
                            </li>
                        </form>
                    </ul>
                  </div>
            </li>
            @else
                <li> <a class="nav-link" aria-current="page" href="{{ route('login') }}">Masuk</a></li>
                <li> <a class="nav-link" aria-current="page" href="{{ route('register') }}">Daftar</a></li>
            @endif

          </ul>

        </div>
      </nav>



<div class="main">
    <div class="row mt-3">
        <div class="col d-flex gap-5">
            <li class="list-group-item">
                <h6 class="mouse-point" data-bs-toggle="dropdown" aria-expanded="false">Desain Kategori</h6>
                <div class="dropdown shadow">
                    <ul class="dropdown-menu">
                        @foreach ($designCategories as $designCategory)
                            <li class="py-2">
                                <a class="dropdown-item" href="{{ route('products.design.category', $designCategory->id) }}">
                                <img class="px-2" src="{{ asset('desainkategori/' . $designCategory->image) }}" alt="" width="40">
                                {{ $designCategory->name }}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </li>
            <li class="list-group-item">
                <h6 class="mouse-point" data-bs-toggle="dropdown" aria-expanded="false">Appareal</h6>
                <div class="dropdown">
                    <ul class="dropdown-menu">
                        @foreach ($appareals as $appareal)
                        <li class="py-2">
                            <a class="dropdown-item" href="#">
                            <img class="px-2" src="{{ asset('storage/produk/' . $appareal->image) }}" alt="" width="40">
                            {{ $appareal->name }}</a>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </li>
            <li class="list-group-item">
                <h6 class="mouse-point" data-bs-toggle="dropdown" aria-expanded="false">Accesories</h6>
                <div class="dropdown">
                    <ul class="dropdown-menu">
                        @foreach ($accesories as $accesory)
                        <li class="py-2">
                            <a class="dropdown-item" href="#">
                            <img class="px-2" src="{{ asset('storage/produk/' . $accesory->image) }}" alt="" width="40">
                            {{ $accesory->name }}</a>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </li><li class="list-group-item"><h6>Kids</h6></li>
            <li class="list-group-item"><h6><a href="{{ route('custom') }}" class="text-decoration-none text-dark"> Custom</a></h6></li>
        </div>
    </div>
</div>
</div>


