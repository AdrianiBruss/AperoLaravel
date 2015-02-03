@extends('master.layout')

@section('content')
    @if(count($aperos)!=0)
        @foreach($aperos as $apero)
            <h1><a href="{{URL::to('single', $apero->id)}}">{{$apero->title}}</a></h1>
            <img src="{{$apero->url_thumbnail}}" alt=""/>
            <p>Texte court :{{$apero->abstract}}</p>
            <p>Date : {{$apero->date}}</p>
            <p>Tag : {{$apero->tag_id}}</p>
            <p><a href="{{URL::to('single', $apero->id)}}">Lire la suite ...</a></p>
        @endforeach
    @else
        <p>Pas d'aperos</p>
    @endif
@stop



