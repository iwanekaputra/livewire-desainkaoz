<div>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link text-dark" aria-current="page" href="{{ route('designer.saldo') }}">
                <img src="{{ asset('assets/img/icon-designer-saldo.svg') }}" alt="" width="20">
                <span class="py-2 sidebar-designer {{ Request::is('designer/saldo') ? 'fw-bold' : '' }}"> Saldo</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-dark" aria-current="page" href="{{ route('designer.store') }}">
                <img src="{{ asset('assets/img/icon-designer-store.svg') }}" alt="" width="20">
                <span class="py-2 sidebar-designer {{ Request::is('designer/store') ? 'fw-bold' : '' }}"> Store</span>

            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-dark" aria-current="page" href="{{ route('designer.sale') }}">
                <img src="{{ asset('assets/img/icon-designer-penjualan.svg') }}" alt="" width="20">
                <span class="py-2 sidebar-designer {{ Request::is('designer/sale') ? 'fw-bold' : '' }}">
                    Penjualan</span>

            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-dark" aria-current="page" href="{{ route('designer.design') }}">
                <img src="{{ asset('assets/img/icon-designer-desain.svg') }}" alt="" width="20">
                <span class="py-2 sidebar-designer {{ Request::is('designer/design') ? 'fw-bold' : '' }}">
                    Desain</span>

            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-dark" aria-current="page" href="" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <img src="{{ asset('assets/img/icon-designer-watermark.svg') }}" alt="" width="20">
                <span class="py-2 sidebar-designer {{ Request::is('designer/watermark') ? 'fw-bold' : '' }}">
                    Watermark</span>

            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-dark" aria-current="page" href="{{ route('designer.setting') }}">
                <img src="{{ asset('assets/img/icon-account-setting.svg') }}" alt="" width="20">
                <span class="py-2 sidebar-designer {{ Request::is('designer/setting') ? 'fw-bold' : '' }}">
                    Pengaturan</span>
            </a>
        </li>
    </ul>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{ asset('assets/img/dev.webp') }}" alt="" style="width: 30vw;">
                    <h4 class="fw-bold text-center">Fitur ini masih dalam pengembangan</h4>
                </div>
            </div>
        </div>
    </div>
</div>
