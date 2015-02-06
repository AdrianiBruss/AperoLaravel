@extends('master.layout')

@section('jqm')
    {{--<script src="{{asset('assets/js/jquery.mobile-1.4.5.js')}}"></script>--}}
@stop

@section('content')

    <div id="search">

        <h1>Chercher un apéro</h1>
        <div class="input-group">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
            </span>
            {{Form::text('search','', array('id'=>'input-search', 'data-type'=>'search','class'=>'form-control', 'placeholder'=>'Chercher un apero'))}}
            <span class="input-group-btn">
                <button id="reset-input" class="btn btn-default" type="button"><span class="glyphicon glyphicon-remove"></span></button>
            </span>
        </div><!-- /input-group -->

        <ul id="apero-list" data-role="listview" data-filter="true" data-inset="true" data-input="#input-search">
        @foreach($aperos as $apero)

            <li data-filtertext="{{$apero->title}} {{$apero->content}} {{$tags[$apero->tag_id]}}"><a href="{{URL::to('single', $apero->id)}}">{{$apero->title}}</a> {{$apero->abstract}}</li>

        @endforeach
        </ul>

    </div>

@stop