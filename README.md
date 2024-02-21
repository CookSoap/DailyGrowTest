## ОПИСАНИЕ ПРОЕКТА

## ИНСТАЛЯЦИЯ
Склонируйте проект в директорию с сервером:

https://github.com/Null-ch/MAMP_laravel_test_task.git !!!!!!!!!!!!!!!!!!

Затем, открыв из папки проекта консоль, введите команду для установки пакетов Laravel:

composer update

В открытой консоли директории проекта введите команду для генерации таблиц базы данных:

php artisan migrate

В той же консоли для запуска веб-приложения:

php artisan serve

<!-- В новой консоли для запуска NodeJS и корректной работы введите команду:

npm install npm run dev -->

## Run schedule

php /path/to/artisan schedule:run >>/dev/null 2>&1