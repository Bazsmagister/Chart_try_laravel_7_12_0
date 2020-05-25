# Mockery fail:

cd into DIR

run composer update

cp .env.example .env
(Create a .env file. You can just make a copy of .env.example and rename the copy to .env. In
case you try to start the dev server using php artisan serve and the app launches with a 500
error, run these commands:)

php artisan key:generate

php artisan cache:clear

php artisan config:clear

composer dump-autoload

# Workflow

php artisan make:seeder UserSeeder
"Seeder created succdesfully"

factory(\App\User::class, 10)->create();

in databaseSeeder:
\$this->call(UserSeeder::class);

in UserFactory:
'updated_at'=> now(),
'created_at'=> $faker->dateTimeBetween($startDate = '-5 years', $endDate = '-3 years', $timezone = null),

# routes\web.php

Route::get('/chart', 'UserController@chart')->name('chart');

# artisan:

php artisan make:controller UserController --resource

# \resources\view

touch chart.blade.php

# web.php

Route::resource('user', 'UserController');

composer require laravel/ui

php artisan ui:auth

# Chart

We can create

line chart,

bar chart
pie chart using charts in Laravel.

radar
doughnut
bubble //didn't worked for me for some reason
scatter //didn't worked for me for some reason
polaArea

# Problems

ChartJs get data in array format.

I faked datas from 2019 maj.
So I don't had data from 2019. jan feb mar apr.

I created a TECHNICAL user in every Month.

If I have many users that 1 user doesn't matter. But helps to easier create data data need for an array that is used by the chart.
