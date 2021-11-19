Setup laravel

Installeer laravel en haar bijbehorende components: https://laravel.com/docs/4.2

Verander de .env.example file naar .env
Pas aan indien nodig

Start een MySql server, maak een database aan die heet rentacar

voer de volgende commandos uit in een CLI

$composer install
$php migrate:fresh --seed
$php artisan serve
