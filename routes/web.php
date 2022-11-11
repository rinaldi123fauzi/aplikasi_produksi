<?php

use App\Models\ProductTransaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AchivementController;
use App\Http\Controllers\ProductTransactionController;

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
    return view('dashboard.index', [
        'transaksi' => ProductTransaction::selectRaw("to_date(cast(transaction_date as TEXT),'YYYY-MM-DD') as tanggal_transaksi")->distinct()->get()
    ]);
})->middleware('auth');


//login
Route::get('/login', [LoginController::class, "index"])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, "authenticate"]);
Route::post('/logout', [LoginController::class, "logout"]);

//register
Route::get('/register', [RegisterController::class, "index"])->middleware('guest');

Route::post('/register', [RegisterController::class, "store"]);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/employee', EmployeeController::class)->middleware('auth');
Route::resource('/item', ItemController::class)->middleware('auth');
Route::resource('/location', LocationController::class)->middleware('auth');
Route::resource('/achivement', AchivementController::class)->middleware('auth');
Route::resource('/planning', PlanningController::class)->middleware('auth');
Route::resource('/tx_product', ProductTransactionController::class)->middleware('auth');
Route::resource('/user', UserController::class)->middleware('auth');