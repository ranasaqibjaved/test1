<?php

namespace App\Http\Controllers;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\Imports\StockImport;
use App\Jobs\ImportCsvFile;
use Maatwebsite\Excel\Facades\Excel;



class ImportCsvController extends Controller
{

    //just checking
    public function ImportCsv(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv',
        ]);

        // Excel::import(new StockImport, request()->file('file'));


        if ($request->has('file')) {

            $csv    = file($request->file);
            $chunks = array_chunk($csv, 1000);
            $header = [];

            foreach ($chunks as $key => $chunk) {
                $data = array_map('str_getcsv', $chunk);
                if ($key == 0) {
                    $header = $data[0];
                    unset($data[0]);
                }

                ImportCsvFile::dispatch($data, $header);
            }
        }


        return view('stock.index');
    }
}
