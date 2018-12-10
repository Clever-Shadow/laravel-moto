@if (Auth::guard('admin')->check())
<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Moto</title>

		<!-- Fonts -->
		<link rel="dns-prefetch" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
		<link href="css/menu.css" rel="stylesheet" type="text/css">
		<link href="css/galery.css" rel="stylesheet" type="text/css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>

		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	</head>
	<body>
		<div class="flex-center position-ref">
			<div class="top-right links">
				<a href="{{ url('/admin') }}">Home</a>
				<a href="{{ url('/') }}">Home Page</a>
			</div>
		</div>
		<div class="container" style="margin-top:60px;">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="container" style="text-align: center;">
							<div class="span4" style="display: inline-block;margin-top:50px; height:300px;">
								@if (isset($errors) && $errors->has(''))
								<div class="alert alert-block alert-error fade in"id="error-block">
									 <?php
									 $messages = $errors->all('<li>:message</li>');
									?>
									<button type="button" class="close"data-dismiss="alert">×</button>

									<h4>Warning!</h4>
									<ul>
									  @foreach($messages as $message)
										{{$message}}
									  @endforeach
									</ul>
								</div>
								@endif

								<form name="createnewalbum" method="POST"action="{{route('create_album')}}" enctype="multipart/form-data">
									{{ csrf_field() }}
									<fieldset>
										<legend>Добавить марку мотоциклов</legend>
										<div class="form-group">
										  <!-- <label for="name">Марка</label> -->
										  <input name="name" type="text" class="form-control"placeholder="Марка" value="{{old('name')}}">
										</div>
										<div class="form-group">
										  <!-- <label for="description">Красткое описание</label> -->
										  <textarea name="description" type="text"class="form-control" placeholder="Красткое описание" style="resize: none;">{{old('descrption')}}</textarea>
										</div>
										<div class="form-group">
										  <label for="cover_image">Выберите заставку марки</label>
										  {{Form::file('cover_image')}}
										</div>
										<button type="submit" class="btnbtn-default">Создать</button>
									</fieldset>
								</form>
							</div>
						</div> <!-- /container -->
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
					<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
@else
	<?php
		header("Location: /"); 
		exit;
	?>
@endif
