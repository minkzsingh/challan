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
    Route::any('print', 'ChallanController@getPrint');
});

Route::get('print', function () {
    return view('paper.challan.challan_pdf');
});

Route::get('livewire', function () {
    return view('lara_livewire.index');
});