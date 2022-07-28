<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaraDev - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @hasSection ('css')
        @yield('css')
    @endif
</head>
<body>

    @include('front.includes.header')

    <div class="container mt-2">
        <div class="row">
            <div class="col-8">
                @yield('content')
            </div>
            <div class="col-4">
                @section('sidebar')
                    <h2>Últimos Postados</h2>
                    <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Ullam libero inventore dignissimos ad?</li>
                        <li>Modi ullam dolore consectetur ex?</li>
                        <li>Non nam nisi fugit molestiae.</li>
                        <li>Exercitationem possimus laboriosam delectus incidunt!</li>
                    </ul>
                @show
            </div>
        </div>
    </div>

    @include('front.includes.footer')

    <script src="{{ asset('js/app.js') }}"></script>
    @hasSection ('js')
        @yield('js')
    @endif
    
</body>
</html>