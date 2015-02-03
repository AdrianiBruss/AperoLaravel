<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Apero Techniques</title>

    <link rel="stylesheet" href="{{asset("/bower_components/bootstrap/dist/css/bootstrap.min.css")}}"/>
    <script src={{asset("/bower_components/angular/angular.js")}}></script>

</head>
<body>
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{URL::to('/')}}">Apero Teck</a>
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{URL::to('/')}}">Accueil</a>
                </li>
                <li>
                    <a href="#">Checher Apéro</a>
                </li>
                <li>
                    <a href="{{URL::to('create')}}">Organiser Apéro</a>
                </li>
            </ul>
            @if(Auth::check())
                <a href="{{URL::to('disconnect')}}" class="btn btn-default navbar-btn navbar-right">Se Déconnecter</a>
            @else
                <a href="{{URL::to('login')}}" class="btn btn-default navbar-btn navbar-right">Se Connecter</a>
            @endif
        </div>
    </nav>
</header>
<div id="wrapper" style="padding-top: 200px;">

    @yield('content')

</div>
</body>
</html>