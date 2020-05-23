<?php

namespace App\Http\Controllers;

use App\User;
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
        // $userId = Auth::user()->user_id;

        //or

        //$userId = Auth::user()->id;

        // $userEmployee = Auth::user()->employee_id;
        // $userJoined = Auth::user()->created_at;
        // $userJoined = Auth::user()->created_at;



        // All Joins
        $user_joined = User::select(DB::raw("COUNT(created_at) as count"))
        // ->where('id', $userId)
        ->whereYear('created_at', date('Y'))
        ->orderBy(DB::raw("MONTH(created_at)"), 'ASC')
        ->groupBy(DB::raw("MONTH(created_at)"))
        ->get()->toArray();
        $user_joined = array_column($user_joined, 'count');

        return view('chart')
            ->with('user_joined', json_encode($user_joined, JSON_NUMERIC_CHECK));
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
