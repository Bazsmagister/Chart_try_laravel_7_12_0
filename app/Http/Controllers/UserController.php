<?php

namespace App\Http\Controllers;

use App\User;
use DateTime;
use DatePeriod;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();
        return view('index', compact('users'));
    }

    //https://www.php.net/manual/en/function.date.php

    public function generateDates(Carbon $startDate, Carbon $endDate, $format = 'Y-m-d h:i:s')
    {
        $dates = collect();
        $startDate = $startDate->copy();

        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {     //addDay
            $dates->put($date->format($format), 0);
        }

        return $dates;
    }

    public function chart()
    {
        $user_joined2019 = DB::table('users')
                     ->whereYear('created_at', '2019')
                     ->selectRaw('COUNT(*) as count, created_at as time')

                      ->groupBy('time')
                      ->orderBy(DB::raw("MONTH(created_at)"), 'ASC')
                     //  ->orderBy('created_at')
                    //->get()->toArray();
                        //->pluck('time', 'count')->toArray();
                        ->get('time')
                       ->pluck('time');

        $user_joined2020time = DB::table('users')
                     ->whereYear('created_at', '2020')
                     ->selectRaw('COUNT(*) as count, created_at as time')

                      ->groupBy('time')
                      ->orderBy('time')
                     //  ->orderBy('created_at')
                    //->get()->toArray();
                        //->pluck('time', 'count')->toArray();
                        ->get()  //collection
                       ->pluck('time')
        ->toArray();
        print_r($user_joined2020time);
        dump($user_joined2020time);



        $user_joined2020 = DB::table('users')
                     ->whereYear('created_at', '2020')
                     ->selectRaw('COUNT(*) as count, created_at as time')

                      ->groupBy('time')
                      ->orderBy('time')
                     //  ->orderBy('created_at')
                    //->get()->toArray();
                        //->pluck('time', 'count')->toArray();
                        ->get()  //collection
                       //->pluck('time')
        ->toArray();

        print_r($user_joined2020);
        dump($user_joined2020);

        $user_joined2020 = array_column($user_joined2020, 'count');

        print_r($user_joined2020);
        dump($user_joined2020);

        //join
        //https://stackoverflow.com/questions/1200885/php-merge-two-arrays-same-length-into-one-associative


        $combinedorig = array_combine($user_joined2020time, $user_joined2020);
        print_r($combinedorig);
        \dump($combinedorig);



        $start = Carbon::create(2020, 1, 1, 0, 0, 0, 'Europe/Budapest');
        $end = Carbon::create(2020, 06, 30, 23, 59, 59, 'Europe/Budapest');

        $dates = $this->generateDates($start, $end);

        dump($dates);

        $datesToArray = $dates->toArray();

        dump($datesToArray);

        $mergecombinedorigplusdates = array_merge($datesToArray, $combinedorig); // overwrite your bonuses with the zero values

        dump($mergecombinedorigplusdates);

        // sort by date .
        ksort($mergecombinedorigplusdates);
        dump($mergecombinedorigplusdates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
