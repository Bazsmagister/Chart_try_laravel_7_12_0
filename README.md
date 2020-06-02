localhost:8000/chart
https://carbon.nesbot.com/docs/

Mockery fail just because my php was 7.2. I made an upgrade to 7.4 , so it is not anymore....:

        <!-- cd into DIR

        `run composer update`

        `cp .env.example .env`

        `php artisan key:generate`

        If there are still problems try this:

        `php artisan cache:clear`

        `php artisan config:clear`

        `composer dump-autoload` -->

## Workflow

php artisan make:seeder UserSeeder
"Seeder created succdesfully"

`factory(\App\User::class, 10)->create();`

in databaseSeeder:
\$this->call(UserSeeder::class);

in UserFactory:
'updated_at'=> now(),
'created_at'=> $faker->dateTimeBetween($startDate = '-5 years', $endDate = '-3 years', $timezone = null),

# routes\web.php

Route::get('/chart', 'UserController@chart')->name('chart');

# artisan:

`php artisan make:controller UserController --resource`

# \resources\view

touch chart.blade.php

# web.php

Route::resource('user', 'UserController');

`composer require laravel/ui`

`php artisan ui:auth`

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

INSERT INTO users (name, email, email_verified_at, password, remember_token, created_at, updated_at )
VALUES ('TECHNICAL', 'januar@chart.com', now(), 'a', '46', '2019-01-01 08:00:00', NOW());

INSERT INTO users (name, email, email_verified_at, password, remember_token, created_at, updated_at )
VALUES ('TECHNICAL', 'feb@chart.com', now(), 'a', '46', '2019-02-01 08:00:00', NOW());

INSERT INTO users (name, email, email_verified_at, password, remember_token, created_at, updated_at )
VALUES ('TECHNICAL', 'mar@chart.com', now(), 'a', '46', '2019-03-01 08:00:00', NOW());

INSERT INTO users (name, email, email_verified_at, password, remember_token, created_at, updated_at )
VALUES ('TECHNICAL', 'apr@chart.com', now(), 'a', '46', '2019-04-01 08:00:00', NOW());

INSERT INTO users (name, email, email_verified_at, password, remember_token, created_at, updated_at )
VALUES ('TECHNICAL', 'maj@chart.com', now(), 'a', '46', '2019-05-01 08:00:00', NOW());

INSERT INTO users (name, email, email_verified_at, password, remember_token, created_at, updated_at )
VALUES ('TECHNICAL', 'jun@chart.com', now(), 'a', '46', '2019-06-01 08:00:00', NOW());

INSERT INTO users (name, email, email_verified_at, password, remember_token, created_at, updated_at )
VALUES ('TECHNICAL', 'jul@chart.com', now(), 'a', '46', '2019-07-01 08:00:00', NOW());

INSERT INTO users (name, email, email_verified_at, password, remember_token, created_at, updated_at )
VALUES ('TECHNICAL', 'aug@chart.com', now(), 'a', '46', '2019-08-01 08:00:00', NOW());

INSERT INTO users (name, email, email_verified_at, password, remember_token, created_at, updated_at )
VALUES ('TECHNICAL', 'sep@chart.com', now(), 'a', '46', '2019-09-01 08:00:00', NOW());

INSERT INTO users (name, email, email_verified_at, password, remember_token, created_at, updated_at )
VALUES ('TECHNICAL', 'oct@chart.com', now(), 'a', '46', '2019-10-01 08:00:00', NOW());

INSERT INTO users (name, email, email_verified_at, password, remember_token, created_at, updated_at )
VALUES ('TECHNICAL', 'nov@chart.com', now(), 'a', '46', '2019-11-01 08:00:00', NOW());

INSERT INTO users (name, email, email_verified_at, password, remember_token, created_at, updated_at )
VALUES ('TECHNICAL', 'dec@chart.com', now(), 'a', '46', '2019-12-01 08:00:00', NOW());

# I want to implement that every month that has not a created_at date, has a value of null in an array.

wip:

public function index()
{
$start = Carbon::today()->subDays(7);
    $end = Carbon::yesterday();

    $activities = Activity::where('member_id', Auth::user()->id)
        ->where('created_at', '>=', Carbon::today()->subDays(7))
        ->get(['bonus', DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as date")])
        ->pluck('bonus', 'date');

    $dates = $this->generateDates($start, $end); // you fill zero valued dates

    return $dates->merge($activities); // overwrite your bonuses with the zero values

}

public function generateDates(Carbon $startDate, Carbon $endDate, $format = 'Y-m-d')
{
    $dates = collect();
$startDate = $startDate->copy();

    for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
        $dates->put($date->format($format), 0);
    }

    return $dates;

}
