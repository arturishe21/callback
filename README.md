
В composer.json добавляем в блок require
```json
 "vis/callback": "1.0.*"
```

Выполняем
```json
composer update
```

Добавляем в app.php
```php
  'Vis\Callback\CallbackServiceProvider',
```

Публикуем js файлы
```json
   php artisan asset:publish vis/callback
```

Публикуем config
```json
   php artisan config:publish vis/callback
```

Публикуем views
```json
   php artisan view:publish vis/callback
```