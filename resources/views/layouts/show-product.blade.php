<!DOCTYPE html>
<html lang="en">

<head>
    <title>Page Detail</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}"> --}}

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick-theme.css') }}">

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

    @font-face{
    font-family: "Myriad-Pro Bold";
    src: url({{ asset('MyriadPro-Bold.otf') }}) format("truetype");
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
        border-bottom: 2px solid #ff4040;
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
    </style>
</head>
<body>
    @livewire('partials.user.navbar-user')

        @yield('content')

        @include('livewire.partials.user.footer')

    <!-- Start Script -->
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="true"></script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="true"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/templatemo.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- End Script -->

    <!-- Start Slider Script -->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });

        window.addEventListener('swal:modal', event => {
            swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            timer : 3000
            });
        });
    </script>
    <!-- End Slider Script -->

</body>

</html>
