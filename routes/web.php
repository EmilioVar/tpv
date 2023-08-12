<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $groups = App\Models\Group::all();
    $products = App\Models\Product::all();
    $productsTpv = App\Models\Table::find(1)->products;

    return view('welcome', compact('groups', 'products','productsTpv'));
});
