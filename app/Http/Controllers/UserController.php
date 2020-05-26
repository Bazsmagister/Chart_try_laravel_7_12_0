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
