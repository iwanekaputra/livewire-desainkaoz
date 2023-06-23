<div>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link text-dark" aria-current="page" href="{{ route('designer.saldo') }}">
            <img src="{{ asset('assets/img/icon-designer-saldo.svg') }}" alt="" width="20">
            <span class="py-2 sidebar-designer {{ Request::is('designer/saldo') ? "fw-bold" : '' }}"> Saldo</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-dark" aria-current="page" href="{{ route('designer.store') }}">
                <img src="{{ asset('assets/img/icon-designer-store.svg') }}" alt="" width="20">
                <span class="py-2 sidebar-designer {{ Request::is('designer/store') ? "fw-bold" : '' }}"> Store</span>

            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-dark" aria-current="page" href="{{ route('designer.sale') }}">
                <img src="{{ asset('assets/img/icon-designer-penjualan.svg') }}" alt="" width="20">
                <span class="py-2 sidebar-designer {{ Request::is('designer/sale') ? "fw-bold" : '' }}"> Penjualan</span>

            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-dark" aria-current="page" href="{{ route('designer.design') }}">
                <img src="{{ asset('assets/img/icon-designer-desain.svg') }}" alt="" width="20">
                <span class="py-2 sidebar-designer {{ Request::is('designer/design') ? "fw-bold" : '' }}"> Desain</span>

            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-dark" aria-current="page" href="">
                <img src="{{ asset('assets/img/icon-designer-watermark.svg') }}" alt="" width="20">
                <span class="py-2 sidebar-designer {{ Request::is('designer/watermark') ? "fw-bold" : '' }}"> Watermark</span>

            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-dark" aria-current="page" href="{{ route('designer.setting') }}">
                <img src="{{ asset('assets/img/icon-account-setting.svg') }}" alt="" width="20">
                <span class="py-2 sidebar-designer {{ Request::is('designer/setting') ? "fw-bold" : '' }}"> Pengaturan</span>
            </a>
        </li>
    </ul>
</div>
