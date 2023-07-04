<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Desainkaoz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/app.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireStyles

    <style>

    @font-face{
        font-family: "Myriad-Pro";
        src: url({{ asset('MyriadPro-Regular.otf') }}) format("truetype");
    }

    *  {
        font-family: "Myriad-Pro";
        font-size: 16px;
    }

    @font-face{
        font-family: "Myriad-Pro Bold";
        src: url({{ asset('MyriadPro-Bold.otf') }}) format("truetype");
    }

    .con-like {
        --red: #cbcbcb;
        position: relative;
        width: 18px;
        height: 18px;
    }

    .con-like .like {
      position: absolute;
      width: 100%;
      height: 100%;
      opacity: 0;
      z-index: 20;
      cursor: pointer;
    }

    .con-like .checkmark {
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .con-like .outline,
    .con-like .filled {
      fill: var(--red);
      position: absolute;
    }

    .con-like .filled {
      animation: kfr-filled 0.5s;
      display: none;
    }

    .con-like .celebrate {
      position: absolute;
      animation: kfr-celebrate 0.5s;
      animation-fill-mode: forwards;
      display: none;
    }

    .con-like .poly {
      stroke: var(--red);
      fill: var(--red);
    }

    .con-like .like:checked ~ .checkmark .filled {
      display: block
    }

    .con-like .like:checked ~ .checkmark .celebrate {
      display: block
    }

    @keyframes kfr-filled {
      0% {
        opacity: 0;
        transform: scale(0);
      }

      50% {
        opacity: 1;
        transform: scale(1.2);
      }
    }

    @keyframes kfr-celebrate {
      0% {
        transform: scale(0);
      }

      50% {
        opacity: 0.8;
      }

      100% {
        transform: scale(1.2);
        opacity: 0;
        display: none;
      }
    }


    .child-card {
        width: 10rem;
    }

    .main {
        width: 60%;
        margin: 0 auto
    }

    .child-main {
        width: 62%;
        margin : 0 auto;
    }


    @media (max-width : 768px) {
        .box {
            display: flex;
            width: 100%;
            margin-top: 10px
        }

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
        top: 32%;
        transform: translateY(-50%);
    }
    .right {
        position: absolute;
        right: 0;
        top: 32%;
        transform: translateY(-50%);
    }
    .scroll-images {

        width: 100%;
        margin-top: 0px;
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
        border-bottom: 2px solid black;
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

    .tshirt-layer:hover,
    .hoodie-layer:hover,
    .sweater-layer:hover,
    .hat-layer:hover,
    .bag-layer:hover,
    .sticker:hover
    {
        border : 1px dashed white
    }

    .dropdown:hover>.dropdown-menu {
        display: block;
    }

    .dropdown>.dropdown-toggle:active {
        pointer-events: none;
    }

    .dropdown-item:hover {
        background-color: transparent;
    }

    .nav-link:hover {
        color: #ccc;
    }

    .nav-tabs > .nav-item > .active {
        border-style: none;
        border-bottom : 2px solid black;
    }

    .nav-link:hover{
        border-style: none;
    }
    </style>
  </head>
  <body>
    @livewire('partials.user.navbar-user')

    @yield('content')

    @include('livewire.partials.user.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="true"></script>

    <script src="{{ asset('assets/js/fabric.min.js') }}"></script>
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

        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
                }
            }
        }
    </script>
  </body>
</html>
