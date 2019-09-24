<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="{{ asset('md5/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('md5/css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('md5/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('md5/css/me.css') }}" rel="stylesheet">
</head>

<body>

<!-- Start your project here-->
<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark secondary-color lighten-1">
    <a class="navbar-brand" href="#"><b>ChatBox</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
            aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
        <!--<ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
        </ul>-->
        <ul class="navbar-nav ml-auto nav-flex-icons">
            <li>
                <button type="button" class="btn btn-me btn-outline-warning btn-rounded waves-effect">Login</button>
            </li>
            <li>
                <button type="button" class="btn btn-warning btn-rounded btn-me">Register</button>
            </li>

        </ul>
    </div>
</nav>
<!--/.Navbar -->
<!-- Start your project here-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('md5/js/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('md5/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('md5/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('md5/js/mdb.min.js') }}"></script>
</body>

</html>