@if (Auth::guard('web')->check()&&!Auth::guard('admin')->check())
	<a href="{{ url('') }}">Главная страница</a></br>
	<a href="{{ url('/form') }}">Обратная связь</a></br>
	<a href="{{ url('/chat') }}">Общий чат</a>
@elseif (Auth::guard('admin')->check()&&!Auth::guard('web')->check())
	<a href="{{ url('') }}">Главная страница</a></br>
	<a href="{{ url('/moto') }}">Добавить марку мотоциклов</a>
@elseif (Auth::guard('admin')->check()&&Auth::guard('web')->check())
	<a href="{{ url('') }}">Главная страница</a></br>
	<a href="{{ url('/form') }}">Обратная связь</a></br>
	<a href="{{ url('/chat') }}">Общий чат</a></br>
	<a href="{{ url('/moto') }}">Добавить марку мотоциклов</a>
@endif