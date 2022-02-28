<h4>RU</h4>
<p>
Написал универсальное ядро для Телеграм ботов.
Документацию оформлю попозже
Принцип следующий:

1. Вызывается в контроллере, например, App::run();
   https://github.com/glowfisch8lan/telegram-bot-mvc-php/blob/main/app/Http/Controllers/TelegramController.php

2. Есть Middleware, StateListerner.
   => Сначала парсится текст от пользователя и разбивается на главный роут и параметры (через  explode с разделителем ?)
   => Затем ищется в карте роутов нужный Action (аналог View)
   => После применяются Посредники (они могут сделать редирект, изменить Состояние (для вызова в последующим события) либо могут подменить Action)
   => После срабатывают Прослушиватели состояний
   => Медиатор реализовывает полученное указание на действие - отправить сообщение, фото и т.д.
   
Отличия:
Миддлварь может применяться к отдельному маршруту
Слушатель состояний применяется к состоянию (в зависимости от состояния)
Редирект - рекурсивный запуск Роутинга заново с применением нужных посредников и слушателей событий
Если нужно вернуть просто Action, например, сообщение об ошибке - то из любой точки (первоначальный Action, Middleware, StateListener) можно вернуть Action

Данная схема позволяет гибко управлять логикой телеграм бота, создавая сложную логику
</p>
<h4>ENG</h4>
<p>
A universal source for Telegram bots has been written.
I'll post the documentation later.
next:
1. Called in the controller, for example, App::run();
https://github.com/glowfisch8lan/telegram-bot-mvc-php/blob/main/app/Http/Controllers/TelegramController.php

2. There are Middleware, StateListerner.
   => Try parsing the text from the user and splitting it into the main route and parameters (explode with delimiter ?)
   => When the required Action is searched in the route map (similar to View)
   => After the middlemen are applied (they can make a redirect, change the state (to be called in a future event) or they can replace the action)
   => After Processing Channel Listeners
   => The mediator implements the received instruction for action - send a message, photo, etc.

Differences:
Middleware can lead to a separate route
State Complement Listener (depending on the state)
Redirect - recursively start Routing again using the necessary intermediaries and event listeners
If you need to return just an Action, for example, a message about money from anywhere (original Action, Middleware, StateListener) you can return an Action

This scheme allows you to easily control the logic of the botany telegram, which has complex logic.</p>

````
docker-compose up -d
chown -R www-data:www-data *
php artisan migrate
````
