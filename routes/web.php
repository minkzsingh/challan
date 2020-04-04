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

Route::get('/', function () {
    return view('paper.dashboard');
});

Route::get('/dashboard', function () {
    return view('paper.dashboard');
})->name('dashboard');

Route::get('/item', function () {
    return view('paper.item.item');
})->name('item');

Route::get('/company', function () {
    return view('paper.company.company');
})->name('company');

Route::get('/challan', function () {
    return view('paper.challan.challan');
})->name('challan');

Route::get('/jquery', function () {
    return view('jquery');
})->name('jquery');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


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
});