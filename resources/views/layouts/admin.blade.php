<!doctype html>
<html lang="en" class="semi-dark">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <!--plugins-->
  <link href="{{ asset('assets/admin/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/admin/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
  <!-- Bootstrap CSS -->
  <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/css/bootstrap-extended.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/css/icons.css') }}" rel="stylesheet" />

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- loader-->

  <!--Theme Styles-->
  <link href="{{ asset('assets/admin/css/dark-theme.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/css/light-theme.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/css/semi-dark.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/css/header-colors.css') }}" rel="stylesheet" />

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>






  @livewireStyles

</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
    <header class="top-header">
      <nav class="navbar navbar-expand gap-3">
        <div class="mobile-toggle-icon fs-3">
            <i class="bi bi-list"></i>
          </div>
          <form class="searchbar">
              <div class="position-absolute top-50 translate-middle-y search-icon ms-3">
              </div>
              <div class="position-absolute top-50 translate-middle-y search-close-icon"><i class="bi bi-x-lg"></i></div>
          </form>
          <div class="top-navbar-right ms-auto">
            <ul class="navbar-nav align-items-center">
              <li class="nav-item search-toggle-icon">
                <a class="nav-link" href="#">
                  <div class="">
                    <i class="bi bi-search"></i>
                  </div>
                </a>
            </li>
            <li class="">
              <a class="nav-link" href=" {{ route('index') }}" target="_blank">
                <div class="projects">

                  <i class="bi bi-globe"></i>
                </div>
              </a>
            </li>

            <li class="nav-item dropdown dropdown-user-setting">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="user-setting d-flex align-items-center">
                  <img src="#" class="user-img" alt="">
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                   <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                        <img src="" alt="" class="rounded-circle" width="54" height="54">
                        <div class="ms-3">
                          <h6 class="mb-0 dropdown-user-name">Admin</h6>
                          <small class="mb-0 dropdown-user-designation text-secondary"></small>
                        </div>
                     </div>
                   </a>
                 </li>
                  <li>
                    <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                         <div class=""><i class="bi bi-person-fill"></i></div>
                         <div class="ms-3"><span>Profile</span></div>
                       </div>
                     </a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                <form action="{{ url('logout') }}" method="POST">
                  @csrf
                    <li>
                      <button class="dropdown-item" type="submit">
                        <div class="d-flex align-items-center">
                          <div class=""><i class="bi bi-lock-fill"></i></div>
                          <div class="ms-3"><span>Logout</span></div>
                        </div>
                      </button>
                    </li>
                  </form>
              </ul>
            </li>
            </ul>
          </div>

      </nav>

    </header>
     <!--end top header-->

        <!--start sidebar -->
        @livewire('partials.admin.navbar-admin')


       <!--end sidebar -->

       <!--start content-->
          <main class="page-content">
               @yield('content')

          </main>
       <!--end page main-->

       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

       <!--Start Back To Top Button-->
		     <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
       <!--End Back To Top Button-->

  </div>
  <!--end wrapper-->

  @livewireScripts


  {{-- <!-- Bootstrap bundle JS --> --}}
  <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}" rel="stylesheet" ></script>

  {{-- // plugins --}}
  <script src="{{ asset('assets/admin/js/jquery.min.js') }}" rel="stylesheet" ></script>
  <script src="{{ asset('assets/admin/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/metismenu/js/metisMenu.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/admin/js/pace.min.js') }}"></script>

  <script src="{{ asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/form-select2.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/table-datatable.js') }}"></script>
  <script src="{{ asset('assets/admin/js/jscolor.js')}}"></script>


  <!--app-->
  <script src="{{ asset('assets/admin/js/app.js') }}"></script>
  @stack('scripts')


    <script>
      window.addEventListener('swal:modal', event => {
          swal({
              title: event.detail.message,
              text: event.detail.text,
              icon: event.detail.type,
              timer : 3000
          }).then(function () {
              window.livewire.emit(event.detail.redirect);
          });
      });

      window.addEventListener('swal:confirm', event => {
          swal({
          title: event.detail.message,
          text: event.detail.text,
          icon: event.detail.type,
          buttons: true,
          dangerMode: true,
          })
          .then((willDelete) => {
          if (willDelete) {
              window.livewire.emit(event.detail.action);
          }
          });
      });
  </script>







</body>

</html>
