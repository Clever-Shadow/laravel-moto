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
				<script language="JavaScript" type="text/javascript" src="/js/jquery.min.js"></script>
				<script src="/js/CometServerApi.js" type="text/javascript"></script>
				<script language="JavaScript" type="text/javascript" src="/js/MainPageChat.js"></script>
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
									<input type="hidden" id="name_fff" value="{{ Auth::user()->name }}">
									<style>
									 #WebChatFormForm{
									  overflow: auto;
									  max-height: 510px;
									  width: 100%;
									 }
									</style>
									<div id="web_chat_holder">
										<div style="border: 1px solid #ccc;padding:10px;">
										<div id="WebChatFormForm" style="overflow: auto; height: 500px;"></div>
											<input type="hidden" id="WebChatNameID" style="margin-top:10px;" value="{{ Auth::user()->name }}">
											<div id="answer_div" style="float:right;"></div>
											<textarea id="WebChatTextID" placeholder="Send a message to online chat..." style="resize: none; max-height: 100px; width: 650px;margin-top:10px;display: block;" required></textarea>
											<div style="margin-bottom: 0px;margin-top: 10px;">
												<input type="button" style="width: 220px;" onclick="web_send_msg();" value="Send">
												<div id="answer_error" style="float:right;"></div>
											</div>
										</div>
									</div>
									<script type="text/javascript">
									
									$(document).ready(function()
									{ 
										/** 
										 * Connection to the comet server. For the ability to take commands.
										 * dev_id is your developer's public identifier
										 */
										CometServer().start({dev_id:15 })
									})
									
									</script>
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