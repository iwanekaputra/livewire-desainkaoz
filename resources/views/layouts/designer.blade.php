<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Desain kaoz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @livewireStyles

    <link rel="stylesheet" href="{{ asset('assets/app.css') }}">
    <style>
        @font-face{
            font-family: "Myriad-Pro";
            src: url({{ asset('MyriadPro-Regular.otf') }}) format("truetype");
        }

        *  {
            font-family: "Myriad-Pro";
            font-size: 16px;
        }

        .child-card {
            width: 10rem;
        }

        .main {
            width: 60%;
            margin: 0 auto
        }

        @media (max-width : 768px) {
            .child-card {
                width: 10rem
            }
        }

        .mouse-point {
            cursor: pointer;
        }

        .cover {
        padding: 0px 20px;
        position: relative;
        }
        .left {
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        }
        .right {
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        }
        .scroll-images {
        width: 100%;
        height: auto;
        display: flex;
        flex-wrap: nowrap;
        overflow-x: hidden;
        overflow-y: hidden;
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch;
        }
        .child img {
        width: 100%;
        object-position: center;
        }

        .child {
        min-width: 100px;
        height: 150px;
        margin: 1px 10px;
        overflow: hidden;
        }

        .button {
        background-color: transparent;
        border: none;
        outline: none;
        cursor: pointer;
        }

        .tabs {
            display: flex;
            flex-wrap: wrap;
            font-family: sans-serif;
        }
        .tabs_name {
            padding: 10px 16px;
            cursor: pointer;
        }
        .tabs_item {
            display: none;
        }
        .tabs_content {
            order: 1;
            width: 100%;
            line-height: 1.5;
            font-size: 0.9em;
            display: none;
        }
        .tabs_item:checked + .tabs_name {
            border-bottom: 2px solid red;
        }
        .tabs_item:checked + .tabs_name + .tabs_content {
            display: initial;
        }

        .navbar {
            background-color: #000000;
            height: 80px;
            margin: 0;
            padding: 0;
            border-bottom: 1px solid #ccc;

        }

        .navbar-brand {
            float: right;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .nav-links {
            float: right;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav {
            width : 80%;
        }

        .nav-links li {
            display: inline-block;
            margin-left: -10px;
        }

        .nav-links li a {
            text-decoration: none;
            color: white;
        }

        #tes-image {
            width: 400px;
            height : 400px
        }

        body {
            font-family: sans-serif;
        }

        #app {
            width: 960px;
            height: 700px;
            overflow: hidden;
            position: relative;
            border: 3px solid grey;
            scale: 1;
            background-color: #828282;
        }

        #virtual-rect {
            transition: 0.1s all;
        }

        #handles {
            position: absolute;
            left: 36px;
            top: 36px;
            border: 5px solid orange;
            width: 300px;
            height: 200px;
            cursor: move;
            pointer-events: auto;
        }

        #rotate-handle {
            top: -50px;
            left: 147px;
            cursor: grab;
            user-select: none;
            position: absolute;
            user-select: none;
        }

        #target {
            top: 30px;
            left: 30px;
            width: 300px;
            height: 200px;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .img-wrapper {
            width: 100%;
            height: 100%;
        }

        #content {
            user-select: none;
            position: relative;
        }

        #image-content {
            width: 100%;
            height: 100%;
            user-select: none;
            object-fit: fill;
            display: block;
            position: absolute;
            pointer-events: none;
        }

        .resize {
            width: 10px;
            height: 10px;
            border-radius: 3px;
            background-color: white;
            border: 1px solid rgb(183, 61, 61);
            position: absolute;
            user-select: none;
        }

        #nw-resize {
            top: -7px;
            left: -7px;
            cursor: nw-resize;
        }

        #ne-resize {
            top: -7px;
            right: -7px;
            cursor: ne-resize;
        }

        #sw-resize {
            bottom: -7px;
            left: -7px;
            cursor: sw-resize;
        }

        #se-resize {
            bottom: -7px;
            right: -7px;
            cursor: se-resize;
        }

        #top-resize {
            top: -7px;
            left: 150px;
            cursor: n-resize;
        }
        #bottom-resize {
            bottom: -7px;
            left: 150px;
            cursor: s-resize;
        }

        #left-resize {
            top: 100px;
            left: -7px;
            cursor: e-resize;
        }
        #right-resize {
            top: 100px;
            right: -7px;
            cursor: w-resize;
        }

        #container:hover {
            border : 1px dashed black
        }

        .dropdown-item:hover {
            background-color: transparent;
        }

        .sidebar-designer:hover {
            border-bottom : 1px solid black;
            padding-right : 10px;
        }
    </style>
  </head>
  <body>
    @livewire('partials.user.navbar-user')
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-2">
                    <h5>Akun Designer</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 border-end">
                    @livewire('partials.designer.sidebar-designer')
                </div>
                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>
        </div>
    @include('livewire.partials.user.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="true"></script>
    <script>
        function leftScroll() {
            const left = document.querySelector(".scroll-images");
            left.scrollBy(-200, 0);
        }
        function rightScroll() {
            const right = document.querySelector(".scroll-images");
            right.scrollBy(200, 0);
        }
    </script>
    <script>
        window.addEventListener('swal:modal-to-login', event => {
            swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            timer : 3000
            }).then(() => {
                window.livewire.emit('moveToLogin');
            });
        });

        window.addEventListener('swal:modal', event => {
            swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            timer : 3000
            }).then(() => {
                window.livewire.emit(event.detail.action);
            });
        });

        window.addEventListener('swal:modal-to-dashboard', event => {
            swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            timer : 3000
            }).then(() => {
                window.livewire.emit('moveToDashboard');
            });
        });

        window.addEventListener('swal:modal-to-index', event => {
            swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            timer : 3000
            }).then(() => {
                window.livewire.emit('moveToIndex');
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
                window.livewire.emit('remove');
            }
            });
        });

        window.livewire.on('hideModalStore', () => {
            $('#exampleModal').modal('hide');
        });
    </script>
  </body>
</html>
