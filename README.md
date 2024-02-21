## ОПИСАНИЕ ПРОЕКТА
Задача: Рассылка ко дню рождения через https://smsc.ru/

Задача
1. Создать личный кабинет на Laravel для рассылки смс-рассылок
2. Создать тестовый аккаунт на https://smsc.ru/
3. Изучить API https://smsc.ru/api/

Результат
1. SMS рассылка уходит каждый день по расписанию за 7 дней, до дня рождения клиента, через https://smsc.ru/
2. Дизайн может быть любой на ваше усмотрение, главное чтобы смс уходили по расписанию. 
3. При регистрации в https://smsc.ru/ дается тестовый баланс в 50 рублей для тестирования.
   
## ИНСТАЛЯЦИЯ
Склонируйте проект в директорию с сервером:

https://github.com/CookSoap/DailyGrowTest

Установить зависимости проекта:

composer install

Провести миграции:

php artisan migrate

Установить зависимости:

npm install 

npm run build

Запустить проект:

php artisan serve

## Run schedule

php /path/to/artisan schedule:run >>/dev/null 2>&1
