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


    public function generateDates(Carbon $startDate, Carbon $endDate, $format = 'Y-m-d')
    {
        $dates = collect();
        $startDate = $startDate->copy();

        for ($date = $startDate; $date->lte($endDate); $date->addMonth()) {     //addDay
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


        //->get();

        //->groupBy(DB::raw("MONTH(created_at)"))
        //->orderBy(DB::raw("MONTH(created_at)"), 'ASC')
        //  ->orderBy('created_at')
        //           ->get()->toArray();
        //->get();
        // dd($user_joined2019);
        //$user_joined2019 = array_column($user_joined2019, 'count');

        $start = Carbon::create(2019, 1, 1, 0, 0, 0, 'Europe/Budapest');
        $end = Carbon::create(2019, 12, 31, 23, 59, 59, 'Europe/Budapest');


        $dates = $this->generateDates($start, $end);

        // dd($user_joined2019);

        $merged = $dates->merge($user_joined2019); // overwrite your bonuses with the zero values

        dd($merged);

        // dd($user_joined2019);
        return view('chart')
            //->with('user_joined2019', json_encode($user_joined2019, JSON_NUMERIC_CHECK))
            //->with('dates', json_encode($dates, JSON_NUMERIC_CHECK));
            ->with('merged', json_encode($merged, JSON_NUMERIC_CHECK));

        ///////////////////////////////////////////////////////////////////////////////////

        //$start = Carbon::today()->subDays(7);

        //$start = Carbon::today()->subDays(7);
        $start = new Date("2019-01-01T00:00:01.001Z");
        $start = new Date("2019-01-01T00:00:01.001Z");


        $dtBudapest = Carbon::create(2012, 1, 1, 0, 0, 0, 'Europe/Budapest');
        $dtLondon = Carbon::create(2012, 1, 1, 0, 0, 0, 'Europe/London');
        echo $dtBudapest->diffInHours($dtLondon);


        $mutable = Carbon::now();
        $immutable = CarbonImmutable::now();
        $modifiedMutable = $mutable->add(1, 'day');
        $modifiedImmutable = CarbonImmutable::now()->add(1, 'day');


        $end = Carbon::yesterday();


        // $user_joined2019 = DB::table('users')
        //              ->whereYear('created_at', '2019')
        //             //  ->where('name', '<>', 'TECHNICAL')
        //              ->select(DB::raw('COUNT(*) as count', 'created_at'))

        //              ->groupBy(DB::raw("MONTH(created_at)"))
        //              ->orderBy(DB::raw("MONTH(created_at)"), 'ASC')
        //             //  ->orderBy('created_at')
        //             //  ->get()->toArray();
        // ->get();
        // // dd($user_joined2019);
        // // $user_joined2019 = array_column($user_joined2019, 'count');
        // // dd($user_joined2019);
        // return view('chart', compact('user_joined2019'));
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
