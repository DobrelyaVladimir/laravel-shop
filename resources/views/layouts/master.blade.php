<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tire-shop: @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    {{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>--}}
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
</head>
<body class="pt-6">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark position-fixed top-0 start-0 end-0" style="z-index: 10">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('index')}}"><span><img height="56px" src="{{\Illuminate\Support\Facades\Storage::url('/images/logo.png')}}" alt=""></span>Tire
            Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link " href="{{route('index')}}">Головна</a>
                <a class="nav-link " href="{{route('brands')}}">Бренди</a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Гарантія та доставка
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" id="guaranty" href="{{route('info', ['info'=>'guaranty'])}}">Гарантія та повернення</a></li>
                        <li><a class="dropdown-item" href="{{route('info', ['info'=>'delivery'])}}">Доставка</a></li>
                        <li><a class="dropdown-item" href="{{route('info', ['info'=>'payment'])}}">Варіанти оплати</a></li>
                    </ul>
                </div>
                <a class="nav-link" href="{{route('basket')}}">Кошик</a>
                <p class="nav-link ms-4"> Наш телефон: 8(066)666-66-66</p>
            </div>

            <div class="navbar-nav">
                @guest()
                    <a class="nav-link" href="{{route('login')}}">Панель адміністратора</a>
                @endguest
                @auth()
                    <a class="nav-link" href="{{route('home')}}">Панель адміністратора</a>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="nav-link btn btn-dark">Вийти</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
<div class="container-fluid" style="padding-top: 50px">
    @yield('content')
</div>
<footer class="row bg-dark">
    <p class="text-center">Дипломна робота Добреля В.С. 2022</p>
</footer>
</body>
</html>
