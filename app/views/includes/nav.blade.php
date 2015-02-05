<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{URL::to('/')}}">Apero Teck</a>
            <ul class="nav navbar-nav">
                <li class="{{Request::path() == '/' ? 'active' : '';}}">
                    <a href="{{URL::to('/')}}">Accueil</a>
                </li>
                <li class="{{Request::path() == 'search' ? 'active' : '';}}">
                    <a href="{{URL::to('search')}}">Checher Apéro</a>
                </li>
                <li class="{{Request::path() == 'create' ? 'active' : '';}}">
                    <a href="{{URL::to('create')}}">Organiser Apéro</a>
                </li>
            </ul>
            @if(Auth::check())
                <a href="{{URL::to('logout')}}" class="btn btn-default navbar-btn navbar-right">Se Déconnecter</a>
            @else
                <a href="{{URL::to('login')}}" class="btn btn-default navbar-btn navbar-right">Se Connecter</a>
            @endif
        </div>
    </nav>
</header>
