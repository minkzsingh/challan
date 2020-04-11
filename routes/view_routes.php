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

Route::get('/challan_create', function () {
    $rec = \App\Challan::max('model_id');
    $max_id = $rec ? $rec + 1 : 50;
    return view('paper.challan.challan_create', compact('max_id'));
})->name('challan_create');

Route::get('/jquery', function () {
    return view('jquery');
})->name('jquery');