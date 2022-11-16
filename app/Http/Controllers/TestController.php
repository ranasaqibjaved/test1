<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersAddress;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function test4(Request $request)
    {

        // $data = UsersAddress::where('user_id', 0)->count('user_id');
        // dd($data->toArray());

        $data1 = DB::table('users_addresses')
            ->select("user_id", DB::raw('count(*) as counts'))
            ->having('counts', '>', 1)
            // ->join('users', 'users.id', '=', 'users_addresses.user_id')
            ->groupBy('user_id')
            ->get();





        // $data = User::select('id', 'name', 'email')->withCount('UsersAddress')->having('users_address_count', 0)->get();



        // $data = User::select('id', 'name', 'email')->withCount('UsersAddress')->get();
        // dd($data->toArray());
        // $data = User::with('UsersAddress')
        //     ->select("user_id", count(User::with('UsersAddress')->UsersAddress))
        //     ->groupBy('id')
        //     ->get();
        // dd($data->toArray());


        // $data1 = User::with('UsersAddress')->get()[0];
        // dd($data1->toArray());

        // dd(count($data1->UsersAddress));
        // dd(count(User::with('UsersAddress')->get()[0]->UsersAddress));

        // $data1 = DB::table('users')
        //     ->select("user_id", DB::raw('count(*) as count'))
        //     ->groupBy('user_id')->get();
        // dd($data1);


        // $data1 = DB::table('users')
        //     ->select("user_id", DB::raw('count(*) as count'))
        //     ->groupBy('user_id')->get();

        // dd($data1);
    }




    public function test1(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('id', 'name', 'email')->withCount('UsersAddress')->get();
            return DataTables::of($data)->addIndexColumn()->make(true);
        }
        return view('tests.test1');
    }

    public function test2(Request $request)
    {
        if ($request->ajax()) {

            $data = User::select('id', 'name', 'email')->withCount('UsersAddress')->having('users_address_count', 0)->get();
            return DataTables::of($data)->addIndexColumn()->make(true);
        }

        return view('tests.test2');
    }
    public function test3(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('users_addresses')
                ->select("user_id", DB::raw('count(*) as count'))
                ->having('count', '>', 1)
                // ->join('users', 'users.id', '=', 'users_addresses.user_id')
                ->groupBy('user_id')
                ->get();
            // dd($data->toArray());
            return DataTables::of($data)->addIndexColumn()->make(true);
        }
        return view('tests.test3');
    }
}
