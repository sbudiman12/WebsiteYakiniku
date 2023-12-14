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
    <style>
        /* Add your custom styles here */
        /* Example:
        .bg-body-tertiary {
            background-color: #yourcolor;
        }
        */
    </style>
</head>

<body  style="height: 50vh">
    <div class="navbar navbar-expand-sm bg-primary d-flex justify-content-between">
        <div class="px-4">
            <img src="{{ url('/images/logo1.png') }}" class="p-1" style="height: 100px" />
        </div>
    <div>
        <h1 style="font-family: 'Agbalumo'; font-size: 2.5rem; color: #800000;">Yakiniku At Home</h1>
    </div>
    <div>
        <h1 style="font-family: 'Agbalumo'; font-size: 2.5rem; color: #800000;">Icon here</h1>
</div>
    </div>


    <div>
        @yield('content')
    </div>

    <!-- Bootstrap scripts and other scripts go here -->

</body>

</html>
