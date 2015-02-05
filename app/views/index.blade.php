@extends('master.layout')

@section('content')
    @if(count($aperos)!=0)
        @foreach($aperos as $apero)
            <div class="apero">

                <h1><a href="{{URL::to('single', $apero->id)}}">{{$apero->title}}</a></h1>
                <img src="{{asset("/uploads/$apero->url_thumbnail")}}" alt=""/>
                <h2>{{$apero->abstract}}</h2>
                <p>Date : {{$apero->date}}</p>
                <p><a href="#">{{$tags[$apero->tag_id]->name}}</a></p>
                <p><a href="{{URL::to('single', $apero->id)}}">Lire la suite ...</a></p>

            </div>
        @endforeach
    @else
        <p>Pas d'aperos</p>
    @endif
@stop



