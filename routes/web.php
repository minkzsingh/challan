<?php

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

Route::prefix('api')->group(function () {
    Route::resource('item', 'ItemController');
    Route::post('item/custom/datatable', 'ItemController@datatable');

    Route::resource('company', 'CompanyController');
    Route::post('company/custom/datatable', 'CompanyController@datatable');

    Route::resource('challan', 'ChallanController');
    Route::get('challan/custom/get/last/id', 'ChallanController@getLastChallanId');
    Route::post('challan/custom/datatable', 'ChallanController@datatable');

    //Dashboard Data
    Route::post('dashboard', 'DashBoardController@getData');
    Route::any('print/{print_id}', 'ChallanController@getPrint');
});

Route::get('print/{print_id}', function ($print_id) {
    $sql = "SELECT a.id, a.total_amount, b.quantity, b.price, a.model_id, c.item_name, DATE(a.created_at) as date,  SUM(b.quantity * b.price) as amt  FROM challans as a
                LEFT JOIN challan_items as b ON a.id = b.challan_id 
                LEFT JOIN items as c ON b.item_id = c.id
                WHERE a.id = $print_id
                GROUP BY c.id, b.price, b.quantity
                ORDER BY MAX(b.id) ASC";

    $record = \DB::select(\DB::raw($sql));
    return view('paper.challan.challan_pdf', compact('record'));
});

Route::get('livewire', function () {
    return view('lara_livewire.index');
});