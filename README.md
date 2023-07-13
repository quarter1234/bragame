# EMAM系统
## laravel
## tymon/jwt-auth JWT插件
## prettus/l5-repository
## 跨域中间件

## jwt 文章参考：
```
https://juejin.cn/post/6844903945567993864

https://learnku.com/articles/10889/detailed-implementation-of-jwt-extensions
https://learnku.com/articles/10885/full-use-of-jwt
https://laravelacademy.org/post/4317
https://laravelacademy.org/post/1321
```


```
#生成 LoginEvent
php artisan make:event LoginEvent
#生成 App\Listeners\XXX.php
php artisan event:generate
```

## 执行队列
```
/www/server/php/74/bin/php /usr/bin/composer require simplito/elliptic-php
/www/server/php/74/bin/php artisan queue:work redis --queue=default
 php artisan queue:work redis --queue=default
 ```