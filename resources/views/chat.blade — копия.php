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
				<script language="JavaScript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
				<script src="https://comet-server.com/CometServerApi.js" type="text/javascript"></script>
				<link href="css/style.css" rel="stylesheet" type="text/css">
				<link href="css/menu.css" rel="stylesheet" type="text/css">
				<link href="css/galery.css" rel="stylesheet" type="text/css">
				    <style>
					pre{
						border: 1px solid #ccc;
						padding: 5px;
						background-color: #EEE;
					}
					</style>
			</head>
			<!------------------------------------------------->
			@extends('layouts.app')

			@section('content')
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-8">
							<div class="card">
								<body>
								<div id="web_chat"></div>
									<div>
									 Name :<input type="text" id="name"><br><br>
									 Text: <textarea id="text"></textarea><br>
									 <input type="button" onclick="send();" value="send" ><br>
									</div>

									<script type="text/javascript">
									$(document).ready(function()
									{ 
										cometApi.start({node:"app.comet-server.ru", dev_id:15 })
										
										cometApi.subscription("simplechat.newMessage", function(event){
											$("#web_chat").append('<b>'+HtmlEncode(event.data.name)+'</b>')
											$("#web_chat").append('<pre>'+HtmlEncode(event.data.text)+'</pre>')
											$("#web_chat").append('<br>')
										})
									})
									function HtmlEncode(s)
									{
									  var el = document.createElement("div");
									  el.innerText = el.textContent = s;
									  s = el.innerHTML;
									  return s;
									}
										
									function send()
									{
									   var name = $('#name').val();
									   var text = $('#text').val();
									   
									   $.ajax({
											url: "https://comet-server.com/doc/CppComet/chat-example/chat.php",
											type: "POST", 
											data:"text="+encodeURIComponent(text)+"&name="+encodeURIComponent(name)
									   });
									}
									</script>
									<?php
										$host = "app.comet-server.ru";
										$user = "15";
										$password = "lPXBFPqNg3f661JcegBY0N0dPXqUBdHXqj2cHf04PZgLHxT6z55e20ozojvMRvB8";
										$comet = mysqli_connect($host, $user, $password, "CometQL_v1");
										if(mysqli_errno($comet))
										{
											echo "Error:".mysqli_error($link);
										}
										$msg = Array( "name" => $_POST["name"], "text"  => $_POST["text"] );
										$msg = json_encode($msg);
										$msg = mysqli_real_escape_string($comet, $msg);
										$query = "INSERT INTO pipes_messages (name, event, message)" .
										  "VALUES('simplechat', 'newMessage', '".$msg."')";
										 
										mysqli_query($comet, $query); 
										if(mysqli_errno($comet))
										{
											echo "Error:".mysqli_error($comet);
										} 
										else
										{
											echo "ok";
										}
									?>
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