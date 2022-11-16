<?php

namespace App\Http\Controllers;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\Imports\StockImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportCsvController extends Controller 
{
    // use Queueable;
    public function ImportCsv(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv',
        ]);

        Excel::import(new StockImport, request()->file('file'));
        return view('stock.index');
    }
}
