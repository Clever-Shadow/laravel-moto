<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Moto</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
		<link href="../css/menu.css" rel="stylesheet" type="text/css">
		<link href="../css/galery.css" rel="stylesheet" type="text/css">
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
		<style>
		  .starter-template {
			padding: 70px 15px;
			text-align: center;
		  }
		</style>
	</head>
	<body>
@if (Auth::guard('admin')->check())
	<div class="flex-center position-ref">
		@if (Route::has('login'))
			<div class="top-right links">
				@auth
					<a href="{{ url('/home') }}">Home</a>
				@else
					<a href="{{ url('/admin') }}">Home</a>
					<a href="{{ url('/') }}">Home Page</a>
					<a href="{{ route('login') }}">Login</a>
					<a href="{{ route('register') }}">Register</a>
				@endauth
			</div>
		@endif
	</div>
	<div class="container">
		<div class="starter-template">
			<div class="media">
				<img class="media-object pull-left"alt="{{$album->name}}" src="../albums/{{$album->cover_image}}" width="350px">
				<div class="media-body">
					<h2 class="media-heading" style="font-size: 26px;">Марка мотоциклов : {{$album->name}}</h2>
					<p>{{$album->name}} - {{$album->description}}</p>
					<div class="media">
						<a href="{{route('add_image',array('id'=>$album->id))}}"><button type="button"class="btn btn-primary btn-large">Добавить мотоцикл</button></a>
						<a href="{{route('delete_album',array('id'=>$album->id))}}" onclick="return confirm('Are yousure?')"><button type="button"class="btn btn-danger btn-large">Удалить всю марку</button></a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach($album->Photos as $photo)
				<div class="col-lg-3">
					<div class="thumbnail" style="height: 500px;margin-top: 50px;margin-bottom:50px;">
						<img alt="{{$album->name}}" src="/albums/{{$photo->image}}">
						<div class="caption">
							<p>{{$photo->description}}</p>
							<a href="{{URL::route('delete_image',array('id'=>$photo->id))}}" onclick="returnconfirm('Are you sure?')"><button type="button"class="btn btn-danger btn-small">Удалить мотоцикл</button></a>
							  <input type="hidden" name="photo"value="{{$photo->id}}" />
							</form>
						</div>
					</div>
				</div>
		  @endforeach
		</div>
	</div>
@else
	<div class="flex-center position-ref">
		@if (Route::has('login'))
			<div class="top-right links">
				@auth
					<a href="{{ url('/home') }}">Home</a>
				@else
					<a href="{{ url('/') }}">Home Page</a>
					<a href="{{ route('login') }}">Login</a>
					<a href="{{ route('register') }}">Register</a>
				@endauth
			</div>
		@endif
	</div>
	<div class="container">
		<div class="starter-template">
			<div class="media">
				<img class="media-object pull-left"alt="{{$album->name}}" src="../albums/{{$album->cover_image}}" width="350px">
				<div class="media-body">
					<h2 class="media-heading" style="font-size: 26px;">Марка мотоциклов : {{$album->name}}</h2>
					<p>{{$album->name}} - {{$album->description}}</p>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach($album->Photos as $photo)
				<div class="col-lg-3">
					<div class="thumbnail" style="height: 500px;margin-top: 50px;margin-bottom:50px;">
						<img alt="{{$album->name}}" src="/albums/{{$photo->image}}">
						<div class="caption">
							<p>{{$photo->description}}</p>
							  <input type="hidden" name="photo"value="{{$photo->id}}" />
							</form>
						</div>
					</div>
				</div>
		  @endforeach
		</div>
	</div>
@endif
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	</body>
</html>
