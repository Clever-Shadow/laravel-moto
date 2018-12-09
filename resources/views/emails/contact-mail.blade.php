<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <style>
        </style>
    </head>
    <body>
		<h1>Привет!</h1>
		<p>Имя: {{ Auth::user()->name }}</p>
		<p>Почта: {{ Auth::user()->email }}</p>
		<p>Сообщение: {{ $msg }}</p>
    </body>
</html>