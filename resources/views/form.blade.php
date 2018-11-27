<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
		<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Fredoka+One'>
		<link rel="stylesheet">
        <!-- Styles -->
<style>
/* Базовые стили формы */
form{
	margin:70px auto;
	max-width:30%;
	box-sizing:border-box;
	padding:40px;
	border-radius:5px; 
	background:RGBA(255,255,255,1);
	-webkit-box-shadow:  0px 0px 15px 0px rgba(255, 145, 0, 1);        
	box-shadow:  0px 0px 15px 0px rgba(255, 145, 0, 1); 
	text-align:center;
}
/* Стили полей ввода */
.textbox{
	width: 70%;
    padding: 12px 20px;
    box-sizing: border-box;
	border-radius:5px;
    background-color: #f8f8f8;
	box-shadow:  0px 0px 15px 0px #80b438; 
    resize: none;
}
.button{
  height:50px;
  width:100%;
  border-radius:3px;
  border:rgba(0,0,0,.3) 0px solid;
  box-sizing:border-box;
  padding:10px;
  background:#90c843;
  color:#FFF;
  font-family: 'Open Sans', sans-serif;  
  font-weight:400;
  font-size: 16pt;
  transition:background .4s;
  cursor:pointer;
}
/* Изменение фона кнопки при наведении */
.button:hover{
  background:#80b438;
}
/*----------------------------------------------------------------------------------------*/
html, body {
  background-color: #efefef;
  width: 100%;
  height: 100%;
  padding: 0;
  margin: 0;
}

#text {
  font-family: "Fredoka One", sans-serif;
  font-size: 4em;
  line-height: 1em;
  text-align: center;
  position: relative;
  top: 7%;
  transform: translateY(-50%);
}
#text:hover {
  cursor: default;
}
#text .wrapper {
  display: inline-block;
  top: -900px;
  position: relative;
  height: 150px;
  /* default */
  width: 90px;
  /* default */
  transition: ease 0.3s all;
}
#text .wrapper span {
  position: absolute;
  top: 0;
  right: 0;
  transition: ease 0.3s all;
}
#text .wrapper span.letter-2 {
  color: rgba(255, 145, 0, 1);
}
#text .wrapper span.letter-1 {
  color: #80b438;
  z-index: 1;
}
#text .wrapper span.letter-1:hover {
  top: -3px;
  right: -3px;
}
#text .wrapper span.letter-1:hover ~ .letter-2 {
  top: 3px;
  right: 3px;
}
#text .wrapper span.space {
  padding: 0;
  min-width: 30px;
  display: inline-block;
}
/*------------------------------------------------------------------------------*/
</style>
    </head>
    <body>
	<div id="text">
		<!-- content generated with JS -->  
	</div>
	{!! Form::open(['url' => 'send-mail']) !!}
		{{ Form::text('name', 'Your Name', ['class'=>'textbox']) }}
		<p>{{ Form::text('email', 'Your email', ['class'=>'textbox']) }}</p>
		<p>{{ Form::textarea('msg', 'Your message', ['class'=>'textbox']) }}</p>
		{{ Form::submit('Send', ['class'=>'button']) }}
	{!! Form::close() !!}
	<script>
	var text = 'Send us an email';

		// this function turns a string into an array
		var createLetterArray = function createLetterArray(string) {
		  return string.split('');
		};

		// this function creates letter layers wrapped in span tags
		var createLetterLayers = function createLetterLayers(array) {
		  return array.map(function (letter) {
			var layer = '';
			//specify # of layers per letter
			for (var i = 1; i <= 2; i++) {
			  // if letter is a space
			  if (letter == ' ') {
				layer += '<span class="space"></span>';
			  } else {
				layer += '<span class="letter-' + i + '">' + letter + '</span>';
			  }
			}
			return layer;
		  });
		};

		// this function wraps each letter in a parent container
		var createLetterContainers = function createLetterContainers(array) {
		  return array.map(function (item) {
			var container = '';
			container += '<div class="wrapper">' + item + '</div>';
			return container;
		  });
		};

		// use a promise to output text layers into DOM first
		var outputLayers = new Promise(function (resolve, reject) {
		  document.getElementById('text').innerHTML = createLetterContainers(createLetterLayers(createLetterArray(text))).join('');
		  resolve();
		});

		// then adjust width and height of each letter
		var spans = Array.prototype.slice.call(document.getElementsByTagName('span'));
		outputLayers.then(function () {
		  return spans.map(function (span) {
			setTimeout(function () {
			  span.parentElement.style.width = span.offsetWidth + 'px';
			  span.parentElement.style.height = span.offsetHeight + 'px';
			}, 250);
		  });
		}).then(function () {
		  // then slide letters into view one at a time
		  var time = 250;
		  return spans.map(function (span) {
			time += 75;
			setTimeout(function () {
			  span.parentElement.style.top = '0px';
			}, time);
		  });
		});
	</script>
    </body>
</html>