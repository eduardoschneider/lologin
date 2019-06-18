<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background: url("{{ asset("/images/bg.jpg")}}") center center;
				background-size:cover;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links" style="position:absolute; right:160px;">
                    @auth
                        <a href="{{ url('/home') }}" style="color:white; font-size:25px !important; display:flex; align-items:center; justify-content:center; margin-top:60px;">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

			<div style="position:absolute; bottom:110px; left:50px; color:white; font-size:90px; font-weight:bold; text-shadow:2px 2px 2px #000;">
				B.U.N.D.A AirLines
			</div>
			<div style="position:absolute; bottom:90px; left:50px; color:white; font-size:30px; text-shadow:1px 1px 1px #000;">
				Ao continuar, você está sujeito à um serviço de merda.
			</div>
        </div>
    </body>
</html>
