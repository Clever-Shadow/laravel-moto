<h1> Laravel</h1> 
<h4>Laravel — бесплатный веб-фреймворк с открытым кодом.</h4>
 
 Сейчас [heroku](https://www.heroku.com/) работает с этим репо. Для правильной работы на [heroku](https://www.heroku.com/), там необходимо присоедениться к репозиторию где лежит данный проект(вкладка Deploy), так же указать Config Vars во вкладке Settings. Для работы же на локальном сервере, необходимо выполнить команду:

`composer install`

и заполнить .env файл. Необходимо так же сделать миграции в БД, которые лежат в ["database/migrations/"](https://github.com/Clever-Shadow/laravel-moto/tree/master/database/migrations).
 
Все отображения хранятся в ["resources/views/"](https://github.com/Clever-Shadow/laravel-moto/tree/master/resources/views), контроллеры хранятся в ["app/Http/Controllers/"](https://github.com/Clever-Shadow/laravel-moto/tree/master/app/Http/Controllers) .

Так выглядят связи в БД:

![](https://drive.google.com/uc?export=view&id=16BaQOdnnREZcR0LT5MeyWwkxLDQPK9qR)

В данном проекте у пользователей есть возможности и функции, такие как:

	1. Войти
	2. Зарегистрироваться
	3. Искать марку мото
	4. Посмотреть все альбомы
	5. Посмотреть содержание альбомов
	6. Задать вопрос(обратная связь)
	7. Так же есть общий чат для пользователей

В то время как администратор может:

	1. Войти( ".../admin/login" )
	2. Искать марку мото
	3. Добавить/Удалить марку мотоциклов
	4. Добавить/Удалить информацию о конкретной модели

Администратора можно зарегистрировать из консоли, выполнив данные команды:

    php artisan tinker
    $admin=new Add\Admin
    $admin->name="..."
    $admin->email="..."
    $admin->password=Hash::make('...')
    $admin->job_title="..."

И держите команды, которые могут быть вам полезны:

`php artisan serve` - запустить сервер

`php artisan migrate` - мигрировать в БД

`php artisan make:controller <TEST>` - создать контроллер <TEST>
