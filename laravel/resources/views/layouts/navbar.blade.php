<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yakiniku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <?php
    // Define hex codes here
    $richBlack = '#011627ff';
    $folly = '#ff3366ff';
    $lightSeaGreen = '#2ec4b6ff';
    $seasalt = '#f6f7f8ff';
    $celestialBlue = '#20a4f3ff';
    ?>

    <style>
        .black {
            color: <?= $richBlack ?>;
        }

        .blackbg {
            background-color: <?= $richBlack ?>;
        }

        .folly {
            color: <?= $folly ?>;
        }

        .follybg {
            background-color: <?= $folly ?>;
        }

        .lsg {
            color: <?= $lightSeaGreen ?>;
        }

        .lsgbg {
            background-color: <?= $lightSeaGreen ?>;
        }

        .seasalt {
            color: <?= $seasalt ?>;
        }

        .seasaltbg {
            background-color: <?= $seasalt ?>;
        }

        .cb {
            color: <?= $celestialBlue ?>;
        }

        .cbbg {
            background-color: <?= $celestialBlue ?>;
        }

        .fit {
            width: 100%;
            object-fit: cover;
        }

        .small {
            width: 100%;
        }

        .smaller {
            width: 60%;
        }

        .smol {
            width: 20%;
        }

        .hover-expand:hover {
            transform: scale(1.05);
            /* Increase the scale value for a larger expansion */
            transition: transform 0.3s ease;
            /* Add a smooth transition effect */
        }

        .noborder {
            background-color: white;
            border: none;
        }

        .none {
            background-color: none;
            border: none;
        }
    </style>
</head>

<body style="height: 50vh">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <div class="cbbg navbar navbar-expand-sm d-flex justify-content-around">

        <div class="navbar-brand">
            <a href="/">
                <img src="{{ url('/assets/logo1.png') }}" class="fit" style="height: 80px" />
            </a>
        </div>
        <div class="navbar-brand">
            <h1 style="font-family: 'Agbalumo'; font-size: 2.5rem;" class="seasalt">Yakiniku At Home</h1>
        </div>
        <div class="navbar-brand">
            <div class="d-flex justify-content-center">
                <a href="/keranjang" class="px-2">
                    <img src="{{ url('/assets/keranjang.png') }}" alt="" style="width: 40px;">
                </a>
                <a href="/favorites" class="px-2">
                    <img src="{{ url('/assets/love.png') }}" alt="" style="width: 40px;">
                </a>
                <a href="/profil" class="px-2">
                    <img src="{{ url('/assets/profile.png') }}" alt="" style="width: 40px;">
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        @yield('content')
    </div>

    <!-- Remove the container if you want to extend the Footer to full width. -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer class="text-white text-center text-lg-start cbbg">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Grid row -->
            <div class="row mt-4">
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <img src="{{ url('/assets/logo1.png') }}" class="p-1" style="height: 90%; width:70%" />
                </div>
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">About Company</h5>
                    <p>
                        Yakiniku at home is a Bojonegoro-based meat dealer. We provide you with the best quality meat of
                        many variations like beef, chicken, and fish.
                    </p>
                    <p>
                        We also provide a complete grilling experience with our gas stove rental service and also our
                        home-made yakiniku sauce.
                    </p>
                    <div class="mt-4">
                        <a type="button" class="none smol" href="https://www.instagram.com/yakinikuathome_bjn/"><img
                                src="{{ url('/assets/ig.png') }}" alt="" class="smaller"></a>
                        <a type="button" class="none smol" href="https://wa.me/6285261735555"><img
                                src="{{ url('/assets/wa.png') }}" alt="" class="smaller "></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">Opening Hours</h5>
                    <table class="table text-center text-white">
                        <tbody class="font-weight-normal">
                            <tr>
                                <td>Mon - Sat:</td>
                                <td>9am - 4pm</td>
                            </tr>
                            <tr>
                                <td>Sunday:</td>
                                <td>Closed</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            Designed by Maverick and Steven
        </div>
    </footer>

    <!-- End of .container -->
</body>

</html>
