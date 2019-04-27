# Laravel-news-feed
Реализуйте на laravel простую новостную ленту с простым управлением содержимого.<br>
Стек:<br> 
MySQL 5.7<br> 
Laravel 5.7 <br>
php 7.1<br>
<br>
Требования:<br> 
На главной странице, расположенной на http://localhost:8000/ отображается список новостей отсортированный по дате и времени создания от новых к старым. С возможностью фильтрации по категории.<br> 
Заголовок новости ведёт на подробное описание новости (модальное окно или отдельная страница детальной новости)<br> 
Управление(создание, изменение, просмотр списка, удаление) списком новостей происходит со страницы http://localhost:8000/manager, обязательные поля к заполнению: Название(короткий текст), Текст(полный текст), Категория(короткий текст или выпадающий список).<br> 
Для клиентской части можно использовать Bootstrap<br>

<h1> Installation </h1>
1. Clone repository<br>
2. <code>composer install</code><br>
3. Start MySql server and create a database<br>
4. Add your MySql credentials and DB name into .env<br>
5. <code>php artisan migrate --seed</code><br>
6. <code>php artisan serve</code> <br> 
7. For PHPUnit tests <code>./vendor/bin/phpunit</code> <br>
<br>

<b>You feel free to use factories to create Categories, please run <code>php artisan cache:clear</code> after you do any category changes. </b>



