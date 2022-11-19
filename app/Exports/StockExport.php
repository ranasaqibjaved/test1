<?php

namespace App\Exports;

use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StockExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        return  Stock::select('variant', 'id')->get()->groupBy('variant');

        // return Stock::select("variant", "id")->get();

        // return  Stock::select("variant", DB::raw('  count(*) as counts   '))
        //     ->groupBy('variant')
        //     ->get();


        // apply condition here that return with combined ids as in sample 2
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["sku", "stock_ids"];
    }
}
