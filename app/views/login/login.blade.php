{{ Form::open(array('url' => 'register')) }}

{{--{{Form::token()}}--}}

{{Form::label('username', 'Username', array('class' => 'awesome'))}}
{{Form::text('username')}}

{{Form::label('password', 'Password', array('class' => 'awesome'))}}
{{Form::password('password')}}

{{Form::submit('Login')}}

{{ Form::close() }}