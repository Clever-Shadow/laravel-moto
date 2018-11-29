<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Moto</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
		<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Fredoka+One'>
		<link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
	
    <body>
	<div id="text"></div>
		{!! Form::open(['url' => 'send-mail']) !!}
			<p>{{ Form::text('name', '', ['class'=>'textbox', 'placeholder'=>'Your name...']) }}</p>
			<p>{{ Form::email('email', '', ['class'=>'textbox', 'placeholder'=>'Your email...' ,'pattern' =>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$']) }}</p>
			<p>{{ Form::textarea('msg', '', ['class'=>'textbox', 'placeholder'=>'Your message...']) }}</p>
			{{ Form::submit('Send', ['class'=>'button']) }}
		{!! Form::close() !!}
		<img src='https://media.giphy.com/media/PkXuh8TFTlBRK/giphy.gif'>
		<script src="js/scripts.js"></script>
    </body>
</html>