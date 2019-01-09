

Установка
------------

Вызываем команду для установки приложения в папку basic
```
composer create-project --prefer-dist --stability=dev floor12/yii2-app-basic basic
```

Далее копируем дефолтный конфиг базы `basic/config/db.example.php` в  `basic/config/db.php` и вводим в него актуальные значения для доступа к базе:
```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```

После чего запускаем миграцию, которая создаст необходимые таблицы и внесет первые данные.
```
./yii migrate
```

После этого приложение можно открывать, предоставив доступ веб серверу к папке `basic/web`.


Работа с пользователями
-------------------
Для работы с пользователями используется floor12/yii2-module-user[https://github.com/floor12/yii2-module-user] 

- Управление пользователями происходит по дефолту по адресу `/user/admin`
- Авторизация по адресу  `/user/frontend/login`
- Данные для доступа первого пользователя после инициализации:
    - Email: `admin@example.local`
    - Password: `123456`