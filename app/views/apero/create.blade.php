{{ Form::open(array('url' => 'postCreate')) }}

{{Form::label('title', 'Nom', array('class' => 'awesome'))}}
{{Form::text('title')}}

{{Form::label('email', 'Email', array('class' => 'awesome'))}}
{{Form::text('email')}}

{{Form::label('url_thumbnail', 'Image à la une', array('class' => 'awesome'))}}
{{Form::file('url_thumbnail')}}

{{Form::label('date', 'Date', array('class' => 'awesome'))}}
{{Form::text('date')}}

{{Form::label('tag', 'Tag', array('class' => 'awesome'))}}
{{Form::select('tag',$tags)}}

{{Form::label('content', 'Description', array('class' => 'awesome'))}}
{{Form::textarea('content')}}

{{Form::submit('Ajouter')}}

{{ Form::close() }}