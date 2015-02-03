@extends('master.layout')

@section('content')

    @if($apero)
    <h1>{{$apero->title}}</h1>
        <p>{{$apero->content}}</p>
    @endif
@stop

