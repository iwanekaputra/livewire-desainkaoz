<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('admin.dashboard') }}">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">
            <span data-feather="file" class="align-text-bottom"></span>
            Orders
          </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.sliders') }}">
                <i class="fa fa-picture-o" aria-hidden="true"></i>
              Ganti Slider
            </a>
        </li>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Master Data</span>
        </h6>

        <li class="nav-item">
          <a class="nav-link " href="{{ route('admin.products.index') }}">
            <span data-feather="shopping-cart" class="align-text-bottom"></span>
            Products
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.categories.index") }}">
              <span data-feather="users" class="align-text-bottom"></span>
              Kategori
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.sub-categories.index") }}">
              <span data-feather="users" class="align-text-bottom"></span>
              Sub Kategori
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.variant.index") }}">
              <i class="fa fa-tags" aria-hidden="true" class="align-text-bottom"></i>
              Variasi Produk
            </a>
        </li>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Notikasi</span>
        </h6>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users.index') }}">
              <span data-feather="users" class="align-text-bottom"></span>
              Approve Akun Designer
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.designer.index') }}">
              <span data-feather="users" class="align-text-bottom"></span>
              Approve Design Designer
            </a>
        </li>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>User</span>
        </h6>

        <li class="nav-item">
            <form action="{{ url('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link px-3 btn"><span data-feather="users" class="align-text-bottom"></span>
                    Sign out</button>
            </form>
        </li>
      </ul>

    </div>
  </nav>
