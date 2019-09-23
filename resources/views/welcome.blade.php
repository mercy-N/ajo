<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ajo</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html,body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
            }

            a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .full-height {
                height:100vh;
            }

            li {
                float:left;
                list-style: none;
            }

            .top-center {
                margin-left: 690px;
                padding-top: 17px;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top:17px;
            }
        </style>
    </head>

    <div class="top-center">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="#">Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">How it works</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Stories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Support</a>
        </li>
    </div>
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a class="nav-link" href="{{ url('/home') }}">Home</a>
        @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>
        @endif
        @endauth
    </div>
    @endif
    </ul>



    <body>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
