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
        .fit{
            width:100%;
            object-fit: cover;
        }

    </style>
</head>

<body  style="height: 50vh">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <div class=" cbbg navbar navbar-expand-sm d-flex justify-content-between ">

            <img src="{{ url('/assets/logo1.png') }}" class="p-1" style="height: 80px" />
            <div>
                <h1 style="font-family: 'Agbalumo'; font-size: 2.5rem;" class="seasalt">Yakiniku At Home</h1>
            </div>
            <div>
                <h1 style="font-family: 'Agbalumo'; font-size: 2.5rem; color: #800000;">Icon here</h1>
        </div>
        </div>

    </div>


    <div>
        @yield('content')
    </div>



    <!-- Remove the container if you want to extend the Footer to full width. -->


    <footer class="text-white text-center text-lg-start cbbg" >
      <!-- Grid container -->

      <div class="container p-4">
        <!--Grid row-->

        <div class="row mt-4">
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <img src="{{ url('/assets/logo1.png') }}" class="p-1" style="height: 200px" />
              </div>
          <!--Grid column-->
          <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-4">About company</h5>

            <p>
              At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
              voluptatum deleniti atque corrupti.
            </p>

            <p>
              Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
              molestias.
            </p>

            <div class="mt-4">
              <!-- Facebook -->
              <a type="button" class="btn btn-floating btn-warning btn-lg"><i class="fab fa-facebook-f"></i></a>
              <!-- Dribbble -->
              <a type="button" class="btn btn-floating btn-warning btn-lg"><i class="fab fa-dribbble"></i></a>
              <!-- Twitter -->
              <a type="button" class="btn btn-floating btn-warning btn-lg"><i class="fab fa-twitter"></i></a>
              <!-- Google + -->
              <a type="button" class="btn btn-floating btn-warning btn-lg"><i class="fab fa-google-plus-g"></i></a>
              <!-- Linkedin -->
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->

          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-4">Opening hours</h5>

            <table class="table text-center text-white">
              <tbody class="font-weight-normal">
                <tr>
                  <td>Mon - Thu:</td>
                  <td>8am - 9pm</td>
                </tr>
                <tr>
                  <td>Fri - Sat:</td>
                  <td>8am - 1am</td>
                </tr>
                <tr>
                  <td>Sunday:</td>
                  <td>9am - 10pm</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
      </div>
      <!-- Copyright -->
    </footer>


  <!-- End of .container -->
</body>




</html>

