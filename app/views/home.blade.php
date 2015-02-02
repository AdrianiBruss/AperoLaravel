<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Apero Techniques</title>
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css"/>
    <script src="../bower_components/angular/angular.js"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Apero Teck</a>
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#">Accueil</a>
                </li>
                <li>
                    <a href="#">Checher Apéro</a>
                </li>
                <li>
                    <a href="{{route('create')}}">Organiser Apéro</a>
                </li>
            </ul>
            @if(Auth::check())
                <a href="{{route('disconnect')}}" class="btn btn-default navbar-btn navbar-right">Se Déconnecter</a>
            @else
                <a href="{{route('login')}}" class="btn btn-default navbar-btn navbar-right">Se Connecter</a>
            @endif
        </div>
    </nav>
</header>
<div id="wrapper" style="padding-top: 200px;">


    @if(count($aperos)!=0)
        <p>{{$aperos}}</p>
    @else
        <p>Pas d'aperos</p>
    @endif

</div>
</body>
</html>