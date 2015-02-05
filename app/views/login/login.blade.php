@extends('master.layout')
@section('menu')
@stop
{{--{{Form::token()}}--}}
<div class="container">
    {{ Form::open(array('url' => 'register', 'class'=>'form-signin')) }}
        <h2 class="form-signin-heading">Connexion</h2>
        {{Form::label('username', 'Nom d\'utilisateur', array('class' => 'sr-only'))}}
        {{Form::text('username','', array('class'=>'form-control', 'placeholder'=>'Nom d\'utilisateur'))}}

        {{Form::label('password', 'Mot de passe', array('class' => 'sr-only'))}}
        {{Form::password('password', array('class'=>'form-control', 'placeholder'=>'Mot de passe'))}}
        <div class="checkbox">

            {{Form::label('remember', 'Se souvenir de moi')}}
            {{Form::checkbox('remember', 'remember', true)}}

        </div>
        {{Form::submit('Submit', array('class'=>'btn btn-lg btn-primary btn-block', 'name'=>'submit'))}}
        <p><a href="{{URL::to('/')}}">Revenir sur le site</a></p>
    {{ Form::close() }}
</div> <!-- /container -->
@section('sidebar')
@stop