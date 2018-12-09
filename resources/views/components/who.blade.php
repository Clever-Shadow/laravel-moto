@if (Auth::guard('web')->check()&&!Auth::guard('admin')->check())
	<a href="{{ url('') }}">Главная страница</a></br>
	<a href="{{ url('/form') }}">Обратная связь</a></br>
	<a href="{{ url('/chat') }}">Общий чат</a>
@elseif (Auth::guard('admin')->check()&&!Auth::guard('web')->check())
	<a href="{{ url('') }}">Главная страница</a></br>
	<a href="{{ url('/chat') }}">Общий чат</a></br>
	<a href="{{ url('/home') }}">Еще что-то для админа</a>
@elseif (Auth::guard('admin')->check()&&Auth::guard('web')->check())
	<a href="{{ url('') }}">Главная страница</a></br>
	<a href="{{ url('/form') }}">Обратная связь</a></br>
	<a href="{{ url('/chat') }}">Общий чат</a></br>
	<a href="{{ url('/home') }}">Еще что-то для админа</a>
@endif



<!--
@if (Auth::guard('web')->check())
<p class="text-success">
	You are logged in as a USER
</p>
@else
<p class="text-danger">
	You are logged out as a USER
</p>
@endif

@if (Auth::guard('admin')->check())
<p class="text-success">
	You are logged in as a ADMIN
</p>
@else
<p class="text-danger">
	You are logged out as a ADMIN
</p>
@endif
-->