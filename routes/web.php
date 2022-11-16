<?php

use App\Http\Controllers\ImportCsvController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/export_scv', [StockController::class, 'export_scv'])->name('export_scv');

Route::post('/ImportCsv', [ImportCsvController::class, 'ImportCsv'])->name('ImportCsv');


Route::resource('stock', StockController::class);



// teask 3
Route::view('test', 'tests.index')->name('test');
Route::get('test1', [TestController::class, 'test1'])->name('test1');
Route::get('test2', [TestController::class, 'test2'])->name('test2');
Route::get('test3', [TestController::class, 'test3'])->name('test3');

Route::get('test4', [TestController::class, 'test4'])->name('test4');
