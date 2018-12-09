<!doctype html>
	@if (Route::has('login'))
    @auth
        <div class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
        </div>
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
				<link href="css/menu.css" rel="stylesheet" type="text/css">
				<link href="css/galery.css" rel="stylesheet" type="text/css">
			</head>
			<!------------------------------------------------->
			@extends('layouts.app')

			@section('content')
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-8">
							<div class="card">
								<body>
									{!! Form::open(['url' => 'send-mail']) !!}
										<!--<p>{{ Form::text('name', '', ['class'=>'textbox', 'placeholder'=>'Your name...']) }}</p>
										<p>{{ Form::email('email', '', ['class'=>'textbox', 'placeholder'=>'Your email...' ,'pattern' =>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$']) }}</p>-->
										<p>{{ Form::textarea('msg', '', ['class'=>'textbox', 'placeholder'=>'Your message...']) }}</p>
										{{ Form::submit('Send', ['class'=>'button']) }}
									{!! Form::close() !!}
									<script src="js/scripts.js"></script>
								</body>
							</div>
						</div>
					</div>
				</div>
			@endsection
<!------------------------------------------------->

		</html>
    @else
		<?php
			header("Location: /"); exit;
		?>
	@endauth
@endif