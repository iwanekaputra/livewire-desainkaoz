<aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>
      <img class="logo-icon" src="{{ asset('logo/icon-logo.png') }}" alt="">

    </div>
    <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
    </div>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu">
    <li>
      <a href="{{ route('admin.dashboard') }}">
        <div class="parent-icon"><i class="bi bi-house-fill"></i>
        </div>
        <div class="menu-title">Dashboard</div>
      </a>
    </li>
    <li>
      <a href="#">
        <div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
        </div>
        <div class="menu-title">User Active</div>
      </a>
    </li>

    <li class="menu-label">master</li>
   <li>
      <a href="{{ route('admin.products.index') }}">
        <div class="parent-icon"><i class="bi bi-cart"></i>
        </div>
        <div class="menu-title">Products</div>
      </a>
    </li>
    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
        </div>
        <div class="menu-title">Categories</div>
      </a>
      <ul>
        <li> <a href="{{ route("admin.categories.index") }}"><i class="bi bi-circle"></i>Category Product</a>
        </li>
        <li> <a href="{{ route("admin.sub-categories.index") }}"><i class="bi bi-circle"></i>Sub Categories</a>
        </li>
        <li> <a href="{{ route("admin.categories-design.index") }}"><i class="bi bi-circle"></i>Category Design</a>
        </li>
      </ul>
    </li>
    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="bi bi-tags"></i>
        </div>
        <div class="menu-title">Master Variant</div>
      </a>
      <ul>
        <li> <a href="{{ route("admin.colors.index") }}"><i class="bi bi-circle"></i>Variant Color</a>
        </li>
        <li> <a href="{{ route("admin.sizes.index") }}"><i class="bi bi-circle"></i>Variant Size</a>
        </li>
        <li> <a href="{{ route("admin.styles.index") }}"><i class="bi bi-circle"></i>Variant Style</a>
        </li>
      </ul>
    </li>
   
    <li class="menu-label">Transaction</li>
    <li>
      <a href="{{ route('admin.transactions.index') }}">
        <div class="parent-icon"><i class="bi bi-journal-check"></i>
        </div>
        <div class="menu-title">Transaction</div>
      </a>
    </li>

    <li class="menu-label">Notification Designer</li>
    <li>
      <a href="{{ route('admin.users.index') }}">
        <div class="parent-icon"><i class="bi bi-person-fill"></i>
        </div>
        <div class="menu-title">Approve Akun
          <span class="badge bg-dark">0</span>
        </div>
      </a>
    </li>
    <li>
      <a href="{{ route('admin.designer.index') }}">
        <div class="parent-icon"><i class="bi bi-image"></i>
        </div>
        <div class="menu-title">Approve Design</div>
      </a>
    </li>
    
   
    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="bi bi-gear-fill"></i>
        </div>
        <div class="menu-title">Setting Website</div>
      </a>
      <ul>
        <li> <a href="#"><i class="bi bi-circle"></i>Setting</a>
        </li>
        <li> <a href="{{ route('admin.sliders') }}"><i class="bi bi-circle"></i>Sliders</a>
        </li>
      </ul>
    </li>
    
  </ul>
  <!--end navigation-->
</aside>