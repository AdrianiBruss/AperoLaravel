<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Apero Techniques</title>

    <link rel="stylesheet" href="{{asset("/bower_components/bootstrap/dist/css/bootstrap.min.css")}}"/>
    <link rel="stylesheet" href="{{asset("/assets/css/styles.css")}}"/>
    <script src={{asset("/bower_components/jquery/dist/jquery.min.js")}}></script>

    @yield('jqm')

    <script src={{asset("/bower_components/angular/angular.js")}}></script>

</head>
<body>
    @section('menu')
        @include('includes.nav')
    @show
    <div id="wrapper" style="padding-top: 60px;">

        <div class="row">

            <div class="main col-sm-8">

                @yield('content')

            </div>

            @section('sidebar')
                @include('includes.sidebar')
            @show

        </div>

    </div>
    <script src="{{asset('assets/js/script.js')}}"></script>
</body>
</html>