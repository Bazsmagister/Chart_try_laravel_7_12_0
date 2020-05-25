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

    public function chart()
    {
        //     // All Joins
        //     $user_joined = User::select(DB::raw("COUNT(created_at) as count"))

        //     ->whereYear('created_at', '2019')

        //     // ->whereYear('created_at', date('Y')-1)
        //     // ->where('created_at', raw(YEAR('2019'))

        //     // ->whereYear('created_at', \Carbon\Carbon::now()->subYear()->format('Y'))
        //     // ->whereYear('created_at', \Carbon\Carbon::now()->subYear())

        //     ->groupBy(DB::raw("MONTH(created_at)"))
        //     // ->orderBy(DB::raw("MONTH(created_at)"), 'ASC')
        //     ->get()->toArray();
        //     $user_joined = array_column($user_joined, 'count');

        //     return view('chart')
        //         ->with('user_joined', json_encode($user_joined, JSON_NUMERIC_CHECK));


        $user_joined2019 = DB::table('users')
                     ->whereYear('created_at', '2019')
                    //  ->where('name', '<>', 'TECHNICAL')
                     ->select(DB::raw('COUNT(*) as count', 'created_at'))

                     ->groupBy(DB::raw("MONTH(created_at)"))
                     ->orderBy(DB::raw("MONTH(created_at)"), 'ASC')
                    //  ->orderBy('created_at')

                     ->get()->toArray();
        // ->get();


        // dd($user_joined2019);

        $user_joined2019 = array_column($user_joined2019, 'count');

        // dd($user_joined2019);

        return view('chart')
            ->with('user_joined2019', json_encode($user_joined2019, JSON_NUMERIC_CHECK));




        // $users_joined_2019 = DB::select('select * from users where created_at = ?', YEAR(2019))
        //                                ->get()->toArray();

        // $user_joined2019 = DB::table('users')
        //             ->whereYear('created_at', '2019')
        //             ->select(DB::raw("count(*) as count, MONTH(created_at) as date"))
        //             // ->select(DB::raw('DATE(created_at)as subscription_date')
        //             // ->groupBy(DB::raw("MONTH(created_at)"))
        //             // ->orderBy(DB::raw("MONTH(created_at)"), 'ASC')

        //             ->groupBy('date')
        //             // ->orderBy('date', 'ASC')

        //             ->get()->toArray();
        // // dd($user_joined2019);
        // $user_joined2019 = array_column($user_joined2019, 'count');
        // // dd($user_joined2019);

        // return view('chart')
        //     ->with('user_joined2019', json_encode($user_joined2019, JSON_NUMERIC_CHECK));


        // $user_joined2019 = DB::table('users')
        //             ->whereYear('created_at', '2019')
        //             // ->select(DB::raw("MONTHNAME(created_at) as date, count(*) as count"))
        //             ->select(DB::raw("DATE(created_at) as date, count(*) as count"))

        //             // ->select(DB::raw('DATE(created_at)as subscription_date')
        //             // ->groupBy(DB::raw("MONTH(created_at)"))
        //             ->orderBy(DB::raw("MONTH(created_at)"), 'ASC')

        //             ->groupBy('count')

        //             ->orderBy('date', 'ASC')

        //             ->get()->toArray();
        // dd($user_joined2019);

        // foreach ($user_joined2019 as $res) {
        //     $month = $res->created_at->month();
        //     // $data[$res->id]['id'] = $res->id;
        // }
        // dd($month);

        // $user_joined2019 = array_column($user_joined2019, 'count');
        // // dd($user_joined2019);


        // $data=json_encode($data);//this will encode the data array into json format.


        // return view('chart')
        //     ->with('user_joined2019', json_encode($user_joined2019, JSON_NUMERIC_CHECK));

        // $graph = DB::table('users')
        //         ->whereYear('created_at', '2019')
        //         ->select(
        //             DB::raw('MONTHNAME(created_at) as month'),
        //             DB::raw("DATE_FORMAT(created_at,'%M') as monthNum"),
        //             DB::raw('ifnull(count(id),0) as m')
        //         )
        //     ->groupBy('monthNum')
        //     ->orderBy('created_at')
        //     ->get();
        // dd($graph);

        // $results = User::whereYear('created_at', '2019')
        //         ->groupBy('date')
        //         ->orderBy('date')
        //         ->get([
        //             DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date'),
        //             DB::raw('count(*) as total')
        //         ])
        //         ->keyBy('date')
        //         ->map(function ($item) {
        //             $item->date = Carbon::parse($item->date);
        //             return $item;
        //         });
        // // dd($results);

        // $period = new DatePeriod(Carbon::now()->subYear(1), CarbonInterval::month(), Carbon::now()->month());

        // dd($period);

        // $graph = array_map(function ($datePeriod) use ($results) {
        //     $date = $datePeriod->format('Y-m-d');
        //     return $results->has($date) ? $results->get($date)->total : 0;
        // }, iterator_to_array($period));
        // dd($graph);
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
