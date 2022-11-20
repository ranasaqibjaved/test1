<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\Queue\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

// use Illuminate\Queue\Jobs\Job;

class JobController extends Controller
{
    public function showJobs(Request $request)
    {

        if ($request->ajax()) {

            $data = DB::table('jobs')->select('id', 'queue', 'attempts', 'reserved_at', 'available_at', 'created_at')->get();
            return DataTables::of($data)->addIndexColumn()->make(true);
        }

        return view('showjob');
    }
}
