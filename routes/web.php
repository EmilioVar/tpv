<?php

use App\Models\Table;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

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
    $productsTpv = App\Models\Table::find(session('tableSelected'))->products ?? [];
    $tables = Table::all();

    return view('welcome', compact('groups', 'products','productsTpv', 'tables'));
})->name('index');

Route::resource('tickets', TicketController::class);

Route::get('tickets/{ticket}/show', [TicketController::class, 'show'])->name('tickets.show');
