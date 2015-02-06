@extends('master.layout')

@section('content')

    @if($apero)
        <div class="apero-single">

            <img src="{{asset("/uploads/$apero->url_thumbnail")}}" alt=""/>
            <h1>{{$apero->title}}</h1>
            <p>{{$apero->content}}</p>
            <p>Date : {{$apero->date}}</p>
            <p>{{$tags[$apero->tag_id]}}</p>

        </div>
    @endif
@stop

