
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
