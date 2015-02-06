@extends('master.layout')

@section('content')
    {{Session::get('message')}}
    @if(count($aperos)!=0)
        @foreach($aperos as $apero)
            <div class="apero">


                <img src="{{asset("/uploads/$apero->url_thumbnail")}}" alt=""/>
                <h1><a href="{{URL::to('single', $apero->id)}}">{{$apero->title}}</a></h1>
                <p>{{$apero->abstract}}</p>
                <p>Date : {{$apero->date}}</p>
                <p>Tag : {{$tags[$apero->tag_id-1]->name}}</p>
                <p><a href="{{URL::to('single', $apero->id)}}">Lire la suite ...</a></p>

            </div>
        @endforeach
    @else
        <p>Pas d'aperos</p>
    @endif
@stop



