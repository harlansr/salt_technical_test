<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;

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


Route::get('/', [PagesController::class, 'home']);

Route::get('/register', [AuthController::class, 'getRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'postRegister'])->middleware('guest');
Route::get('/login', [AuthController::class, 'getLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'postLogin'])->middleware('guest');

Route::get('/home', function(){
    return view('prepaid-balance');
})->name('home')->middleware('auth');

Route::get('/prepaid-balance', [PagesController::class, 'prepaid'])->name('prepaid-balance')->middleware('auth');
Route::post('/prepaid-balance', [PagesController::class, 'postPrepaid'])->middleware('auth');
Route::get('/product', [PagesController::class, 'product'])->name('product')->middleware('auth');
Route::post('/product', [PagesController::class, 'postProduct'])->middleware('auth');
Route::get('/success', [PagesController::class, 'success'])->name('success')->middleware('auth');
Route::get('/payment', [PagesController::class, 'payment'])->name('payment')->middleware('auth');
Route::post('/payment', [PagesController::class, 'payment'])->middleware('auth');

Route::get('/order', [OrderController::class, 'index'])->name('order')->middleware('auth');

Route::post('/doPayment', [PagesController::class, 'doPayment'])->name('doPayment')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');