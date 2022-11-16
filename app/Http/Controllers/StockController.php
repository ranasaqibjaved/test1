<?php

namespace App\Http\Controllers;

use App\Services\StockService;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Exports\StockExport;
use DataTables;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Session;

class StockController extends Controller
{

    public function __construct(StockService $StockService)
    {
        $this->StockService = $StockService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Stock::select('*')->get();


            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = ' <form   onsubmit="return confirm(' . "'Are you sure you want to Delete this?'" . ');" method="POST"  action="' . route("stock.destroy", $row->id) . '"> ';
                    // $btn = $btn . '<a href=" ' . route("stock.show", $row->id) . '"  class="ml-2"><i class="fas fa-eye"></i></a>';
                    $btn = $btn . ' <a href="' . route("stock.edit", $row->id) . '" class="ml-2">  <i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<button  type="submit" class="ml-2"    ><i class="fas fa-trash"></i></button>';
                    $btn = $btn . method_field('DELETE') . '' . csrf_field();
                    $btn = $btn . ' </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('stock.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock =  $this->StockService->store($request);

        Session::flash('flash_message_sucess', 'Stock Sucessfully Add!!!.');
        Session::flash('alert-class', 'alert-success');
        return view('stock.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock =  $this->StockService->edit($id);
        return view('stock.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stock =  $this->StockService->update($id, $request);
        Session::flash('flash_message_sucess', 'Stock Updated Successfully!!!.');
        Session::flash('alert-class', 'bg-froly');
        return view('stock.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock =  $this->StockService->destroy($id);
        Session::flash('flash_message_sucess', 'Stock Delete Successfully!!!.');
        Session::flash('alert-class', 'bg-froly');
        return view('stock.index');
    }

    public function export_scv()
    {
        return Excel::download(new StockExport, 'stock.csv');
    }
}
