<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Адмінка: @yield('title')</title>

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
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
                        <a class="nav-link " href="{{route('index')}}">Повернутися на сайт</a>
                        <a class="nav-link " href="{{route('brands.index')}}">Бренди</a>
                        <a class="nav-link" href="{{route('products.index')}}">Товари</a>
                        <a class="nav-link" href="{{route('home')}}">Замовлення</a>


                </div>
                <div class="navbar-nav">
                    @auth()
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="nav-link btn btn-dark">Вийти</button>
                        </form>
                        <a class="nav-link" href="{{route('register')}}">Зареєструвати користувача</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <div class="">
        <div class="container-fluid" style="padding-top: 80px">
            <div class="row justify-content-center">
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>
