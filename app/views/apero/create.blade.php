@extends('master.layout')

@section('content')

    {{ Form::open(array('url' => 'postCreate', 'files'=>true)) }}

    <div class="form-group">

        {{Form::label('title', 'Nom')}}
        {{Form::text('title', '', array('class'=>'form-control', 'placeholder'=>'Nom'))}}
    </div>
    <div class="form-group">

        {{Form::label('email', 'Email')}}
        {{Form::text('email', '', array('class'=>'form-control', 'placeholder'=>'Email'))}}
    </div>
    <div class="form-group">

        {{Form::label('url_thumbnail', 'Image à la une')}}
        {{Form::file('url_thumbnail', array('multiple'=>false))}}    </div>
    <div class="form-group">

        {{Form::label('date', 'Date')}}
        {{Form::input('date', 'date')}}
    </div>
    <div class="form-group">

        {{Form::label('tag_id', 'Tag')}}
        {{Form::select('tag_id', $tags)}}
    </div>
    <div class="form-group">

        {{Form::label('content', 'Description')}}
        {{Form::textarea('content', '', array('class'=>'form-control', 'placeholder'=>'Description'))}}
    </div>
        {{Form::hidden('user_id')}}
        {{Form::hidden('abstract')}}

        {{Form::submit('Ajouter', array('class'=>'btn btn-default'))}}

    {{ Form::close() }}

@stop